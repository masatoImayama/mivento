App.controller('flot_listCtrl',
    ['$scope', '$rootScope', '$window', 'loginCheck', 'ApiUrl', 'ApiService', '$localStorage', '$cacheFactory', '$interval', 'commonDefines', 'paging', 'pagingService', '$uibModal', 'app_conf',
        function ($scope, $rootScope, $window, $loginCheck, ApiUrl, ApiService, $localStorage, $cacheFactory, $interval, commonDefines, paging, pagingService, $uibModal, app_conf) {

            const FIRSTLOT_STATUS_SHIPPED = '3';
            const FIRSTLOT_STATUS_SHIPMENT_ALL= '1,2,4,5';

            $scope.now_page = 1;

            // 定数セット
            commonDefines.setCommonDefines($localStorage);
            $scope.commonChargeList = $localStorage.commonChargeList;
            $scope.firstlot_status = $localStorage.firstlot_status;
            $scope.firstlot_status_search = {};
            $scope.firstlot_status_search['0'] = '';
            $scope.firstlot_status_search[FIRSTLOT_STATUS_SHIPPED] = '出荷済み';
            $scope.firstlot_status_search[FIRSTLOT_STATUS_SHIPMENT_ALL] = '初回予定';

            // 配送時刻　表示用に整形
            $scope.delivery_time_category = {};
            let dtc = $localStorage.delivery_time_category
            for (var c of dtc) {
                $scope.delivery_time_category[c.val] = c.label;
            }

            // 初期表示処理
            this.$onInit = function () {

                // 初期検索条件
                // ステータス：初回予定（3:出荷済み以外）
                // 出荷日：システム日付の1週間前～システム日付の2週間後
                $scope.now_page = 1;
                $scope.order_column = "delivery_date";
                $scope.sort = "asc";
                $scope.id_status_list = FIRSTLOT_STATUS_SHIPMENT_ALL;
                $scope.delivery_date_from = getDateFormat(getAddDate(new Date(), -7), "YYYY-MM-DD");
                $scope.delivery_date_to = getDateFormat(getAddDate(new Date(), 14), "YYYY-MM-DD");
                $scope.searchProc();
            }

            // 検索ボタン　クリック時
            $scope.search = function () {
                // 検索処理
                $scope.now_page = 1;
                $scope.order_column = "";
                $scope.sort = "";
                $scope.searchProc();
            }

            // ページ指定リンク　クリック時
            $scope.paging = function (target_page) {
                $scope.now_page = target_page;
                $scope.searchProc();
            }

            // 詳細ボタン　クリック時
            $scope.showDetail = function (id_shipment_notice) {
                $scope.id_shipment_notice = id_shipment_notice;
                $scope.getDetail(id_shipment_notice);
            }

            // ダウンロードボタン　クリック時
            $scope.download = function (group_id_firstlot) {
                $rootScope.loading = true;
                if (group_id_firstlot > 0) {

                    // 個別ダウンロード 【R005】_【初回＠明細DL】

                    var params = {
                        "group_id_firstlot": group_id_firstlot,
                    }
                    ApiService.filedownload($scope, ApiUrl.LOGISTICS_FIRSTLOT_EDIT_R005, params, "POST").then(function (res) {
                        // 完了処理なし
                        $rootScope.loading = false;
                    });

                } else {

                    // 全データダウンロード 【R004】_【初回＠明細ダウンロード】

                    var params = {
                        "page": $scope.now_page,
                        "row_num": paging.PAGE_DEFAULT_LIMIT,
                        "order_column": $scope.order_column,
                        "sort": $scope.sort,
                        "status_flg_list": $scope.id_status_list != '0' ? $scope.id_status_list.split(',') : '',
                        "delivery_date_from": $scope.delivery_date_from,
                        "delivery_date_to": $scope.delivery_date_to,
                        "customercd": $scope.customercd,
                        "id_charge": $scope.id_charge,
                        "brandcd": $scope.brandcd,
                    }
                    ApiService.filedownload($scope, ApiUrl.LOGISTICS_FIRSTLOT_EDIT_R004, params, "POST").then(function (res) {
                        // 完了処理なし
                        $rootScope.loading = false;
                    });
                }
            }

            // ダウンロードボタン　クリック時
            $scope.downloadTmp = function (group_id_firstlot) {

                // 個別ダウンロード 【R005】_【初回＠明細DL】
                var params = {
                    "group_id_firstlot": group_id_firstlot,
                }
                ApiService.filedownload($scope, ApiUrl.LOGISTICS_FIRSTLOT_EDIT_R003, params).then(function (res) {
                    // 完了処理なし
                });
            }

            // ソート　クリック時
            $scope.changeSort = function (order_column) {
                if ($scope.order_column == order_column) {
                    $scope.sort = ($scope.sort == "asc") ? "desc" : "asc";
                } else {
                    $scope.sort = "asc";
                }
                $scope.order_column = order_column;
                $scope.searchProc($scope.now_page, $scope.order_column, $scope.sort, $scope.customercd, $scope.id_shipment_status, $scope.term_from, $scope.term_to, $scope.term_type, $scope.id_charge);
            }

            /**
             * 共通関数群
             */
            // 検索処理
            $scope.searchProc = function () {
                // AUTOCOMPLATE項目 検索時に未指定の場合、名称をクリアする
                if (isEmptyStr($scope.id_charge)) {
                    $scope.chargename = "";
                }
                if (isEmptyStr($scope.customercd)) {
                    $scope.customername = "";
                }
                if (isEmptyStr($scope.brandcd)) {
                    $scope.brandname = "";
                }

                var modalInstance = $uibModal.open({templateUrl:"loader.html", scope: $scope});

                // API呼び出し
                var params = {
                    "page": $scope.now_page,
                    "row_num": paging.PAGE_DEFAULT_LIMIT,
                    "order_column": $scope.order_column,
                    "sort": $scope.sort,
                    "status_flg_list": $scope.id_status_list != '0' ? $scope.id_status_list.split(',') : [],
                    "delivery_date_from": $scope.delivery_date_from,
                    "delivery_date_to": $scope.delivery_date_to,
                    "customercd": $scope.customercd,
                    "id_charge": $scope.id_charge,
                    "brandcd": $scope.brandcd,
                }
                $scope.result = [];
                ApiService.call($scope, ApiUrl.LOGISTICS_FIRSTLOT_EDIT_R001, params).then(function (res) {
                    if (res.data.code == app_conf.RETURN_CD_EMPTY) {
                        $scope.allcount = 0;
                        $scope.result = [];
                    } else {
                        // 受け取ったデータをもとに画面描画
                        // 全体描画
                        $scope.result = dataShaping(res.data);
                        $scope.searchAfterDraw($scope.result);
                    }

                    modalInstance.dismiss();
                    modalInstance.result.catch(angular.noop);

                    $scope.$parent.scrollTop();
                });

                function dataShaping(resData) {
                    for(flot of resData.firstlot_list) {
                        flot.delivery_date = getStrDateFormat(flot.delivery_date, "YYYY-MM-DD");
                    }
                    return resData;
                }
            }

            // 検索後描画処理
            $scope.searchAfterDraw = function (result) {

                // 明細描画
                $scope.allcount = result.count;
                $scope.firstlot_list = result.firstlot_list;

                // ページングパーツの描画処理
                $scope.pagingObj = pagingService.getPagingObject($scope.now_page, result.count);
            }

            // 詳細取得処理
            $scope.getDetail = function (firstlot) {
                $rootScope.loading = true;

                // API呼び出し
                var params = {
                    "group_id_firstlot": firstlot.group_id_firstlot,
                }
                $scope.result = [];
                ApiService.call($scope, ApiUrl.LOGISTICS_FIRSTLOT_EDIT_R002, params).then(function (res) {

                    // 受け取ったデータをもとに詳細モーダル描画
                    $scope.result =  dataShaping(res.data);
                    $scope.getDetailAfterDraw($scope.result);
                    $scope.showDialog(true);

                    $rootScope.loading = false;
                });

                function dataShaping(resData) {
                    resData.firstlot.delivery_date = getStrDateFormat(resData.firstlot.delivery_date, "YYYY-MM-DD");
                    for(product of resData.firstlot_product_list) {
                        product.published = getStrDateFormat(product.published, "YYYY-MM-DD");
                    }
                    return resData;
                }
            }

            // 詳細描画処理
            $scope.getDetailAfterDraw = function (result) {

                $scope.firstlot = result.firstlot;
                // TODO:API仕様書と構造が異なる
                $scope.brand = result.brand[0];
                $scope.customer = result.customer[0];
                $scope.product_list = result.firstlot_product_list;

                // 担当者名とブランドリストからタイトルを生成する
                $scope.modal_title = "";

                // 合計金額/原価計算
                $scope.sum = 0;
                for (var p of $scope.product_list) {

                    // 提案原価 原価率計算
                    p.delivery_unit_price_rate = p.delivery_unit_price * 100 / p.price;
                    $scope.sum = $scope.sum + Number(p.salestotal);
                }
            }

            $scope.showDialog = function (flag) {
                $("#detail-dialog .modal").modal(flag ? 'show' : 'hide');
            };
        }
    ]
);
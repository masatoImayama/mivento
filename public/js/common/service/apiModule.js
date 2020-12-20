angular.module('apiModule', ['ngStorage', 'ui.bootstrap', 'commonDefinesService', 'logincheckModule', 'notification'])
.value('ApiUrl', {
// ログインAPI
LOGIN : 'login.php',

// 依頼（営業）> 出荷@/直接入力
SALES_SHIP_INPUT_R001 : env_SALES_SHIP_INPUT_R001,
SALES_SHIP_INPUT_R002 : env_SALES_SHIP_INPUT_R002, // TODO:現在どこからも呼ばれていない
SALES_SHIP_INPUT_R005 : env_SALES_SHIP_INPUT_R005,
SALES_SHIP_INPUT_R007 : env_SALES_SHIP_INPUT_R007,
SALES_SHIP_INPUT_C001 : env_SALES_SHIP_INPUT_C001,

// 依頼（営業）> 出荷@依頼一覧
SALES_SHIP_LIST_R001 : env_SALES_SHIP_LIST_R001,

// 依頼（営業）> 出荷@依頼一覧' + 詳細
SALES_SHIP_DETAIL_R001 : env_SALES_SHIP_DETAIL_R001,

// 依頼（営業）> 出荷@依頼一覧' + UPLOADファイル
SALES_SHIP_DETAIL_UPLOAD_R001 : env_SALES_SHIP_DETAIL_UPLOAD_R001,

// 依頼（営業）> 出荷@依頼一覧' + 添付ファイル（海外Invoice専用）
SALES_SHIP_DETAIL_ATTACH_R001 : env_SALES_SHIP_DETAIL_ATTACH_R001,

// 依頼（営業）> 出荷@依頼一覧' + 指示メール送信
SALES_SHIP_SEND_MAIL_R001 : env_SALES_SHIP_SEND_MAIL_R001,
SALES_SHIP_SEND_MAIL_R002 : env_SALES_SHIP_SEND_MAIL_R002,
SALES_SHIP_SEND_MAIL_U001 : env_SALES_SHIP_SEND_MAIL_U001,
SALES_SHIP_SEND_MAIL_U002 : env_SALES_SHIP_SEND_MAIL_U002,

// 依頼（営業）> 出荷@/ファイルUPLOAD
SALES_SHIP_FILE_UPLOAD_C001 : env_SALES_SHIP_FILE_UPLOAD_C001,

// 依頼（営業）> 配荷表入力
SALES_DELIVERY_INPUT_R001 : env_SALES_DELIVERY_INPUT_R001,
SALES_DELIVERY_INPUT_R002 : env_SALES_DELIVERY_INPUT_R002,
SALES_DELIVERY_INPUT_R003 : env_SALES_DELIVERY_INPUT_R003,
SALES_DELIVERY_INPUT_U001 : env_SALES_DELIVERY_INPUT_U001,


// 集計（物流）> 初回＠の振分け
LOGISTICS_FIRSTLOT_EDIT_R001 : env_LOGISTICS_FIRSTLOT_EDIT_R001,
LOGISTICS_FIRSTLOT_EDIT_R002 : env_LOGISTICS_FIRSTLOT_EDIT_R002,
LOGISTICS_FIRSTLOT_EDIT_R003 : env_LOGISTICS_FIRSTLOT_EDIT_R003,
LOGISTICS_FIRSTLOT_EDIT_R004 : env_LOGISTICS_FIRSTLOT_EDIT_R004,
LOGISTICS_FIRSTLOT_EDIT_R005 : env_LOGISTICS_FIRSTLOT_EDIT_R005, // LOGISTICS_FIRSTLOT_EDIT_R004と同一のAPIURL
LOGISTICS_FIRSTLOT_EDIT_C001 : env_LOGISTICS_FIRSTLOT_EDIT_C001,
LOGISTICS_FIRSTLOT_EDIT_U001 : env_LOGISTICS_FIRSTLOT_EDIT_U001,
LOGISTICS_FIRSTLOT_EDIT_U002 : env_LOGISTICS_FIRSTLOT_EDIT_U002,
LOGISTICS_FIRSTLOT_EDIT_D001 : env_LOGISTICS_FIRSTLOT_EDIT_D001,

// 集計（物流）> 初回＠送信
LOGISTICS_FIRSTLOT_SEND_C001 : env_LOGISTICS_FIRSTLOT_SEND_C001,

// 集計（物流）> 出荷@依頼一覧
LOGISTICS_SHIP_LIST_R001 : env_LOGISTICS_SHIP_LIST_R001,
LOGISTICS_SHIP_LIST_U001 : env_LOGISTICS_SHIP_LIST_U001,
LOGISTICS_SHIP_LIST_D001 : env_LOGISTICS_SHIP_LIST_D001,

// 集計（物流）> 出荷@依頼一覧' + 詳細
LOGISTICS_SHIP_DETAIL_R002 : env_LOGISTICS_SHIP_DETAIL_R002,
LOGISTICS_SHIP_DETAIL_U002 : env_LOGISTICS_SHIP_DETAIL_U002,
LOGISTICS_SHIP_DETAIL_U003 : env_LOGISTICS_SHIP_DETAIL_U003,           

// 集計（物流）> 物流TOP
LOGISTICS_LOGI_TOP_R002 : env_LOGISTICS_LOGI_TOP_R002,
LOGISTICS_LOGI_TOP_R003 : env_LOGISTICS_LOGI_TOP_R003,

// ダウンロード > 消化表
DOWNLOAD_DIGESTION_SHEET_R001 : env_DOWNLOAD_DIGESTION_SHEET_R001,
DOWNLOAD_DIGESTION_SHEET_R002 : env_DOWNLOAD_DIGESTION_SHEET_R002,
DOWNLOAD_DIGESTION_SHEET_U001 : env_DOWNLOAD_DIGESTION_SHEET_U001,
DOWNLOAD_DIGESTION_SHEET_U002 : env_DOWNLOAD_DIGESTION_SHEET_U002,

// ダウンロード > 初回＠予定残×ブランド毎(出荷済以外)
DOWNLOAD_FIRSTLOT_REMAINING_BRAND_R001 : env_DOWNLOAD_FIRSTLOT_REMAINING_BRAND_R001,
DOWNLOAD_FIRSTLOT_REMAINING_BRAND_R002 : env_DOWNLOAD_FIRSTLOT_REMAINING_BRAND_R002,

// ダウンロード > 初回＠予定残すべて
DOWNLOAD_FIRSTLOT_REMAINING_R001 : env_DOWNLOAD_FIRSTLOT_REMAINING_R001,

// ダウンロード > 配下表（商品部）
DOWNLOAD_DELIVERY_LIST_R001 : env_DOWNLOAD_DELIVERY_LIST_R001,
DOWNLOAD_DELIVERY_LIST_R002 : env_DOWNLOAD_DELIVERY_LIST_R002,
DOWNLOAD_DELIVERY_LIST_R003 : env_DOWNLOAD_DELIVERY_LIST_R003,

// マスタ > 配荷表一覧
MASTER_DELIVERY_LIST_R001 : env_MASTER_DELIVERY_LIST_R001,      // 【R001】_【配荷表一覧検索】
MASTER_DELIVERY_LIST_R002 : env_MASTER_DELIVERY_LIST_R002,      // 【R002】_【配荷表ダウンロード】
MASTER_DELIVERY_LIST_R003 : env_MASTER_DELIVERY_LIST_R003,      // 【R003】_【配荷表目標アップロードチェック】
MASTER_DELIVERY_LIST_R004 : env_MASTER_DELIVERY_LIST_R004,      // 【R004】_【配荷表情報取得】
MASTER_DELIVERY_LIST_R006 : env_MASTER_DELIVERY_LIST_R006,      // 【R006】_【商品情報取得】
MASTER_DELIVERY_LIST_R007 : env_MASTER_DELIVERY_LIST_R007,      // 【R007】_【商品一覧検索】
MASTER_DELIVERY_LIST_C001 : env_MASTER_DELIVERY_LIST_C001,      // 【C001】_【配荷表入力登録】
MASTER_DELIVERY_LIST_U001 : env_MASTER_DELIVERY_LIST_U001,      // 【U001】_【配荷表公開状態変更】
MASTER_DELIVERY_LIST_U002 : env_MASTER_DELIVERY_LIST_U002,      // 【U002】_【配荷表目標アップロード更新】
MASTER_DELIVERY_LIST_U003 : env_MASTER_DELIVERY_LIST_U003,      // 【U003】_【配荷表入力更新】
MASTER_DELIVERY_LIST_D001 : env_MASTER_DELIVERY_LIST_D001,      // 【D001】_【配荷表削除】

SHIPMENT_RECORD_SUMMARY_R001 : env_SHIPMENT_RECORD_SUMMARY_R001,      // 【R001】_【出荷実績抽出】
SHIPMENT_RECORD_SUMMARY_R002 : env_SHIPMENT_RECORD_SUMMARY_R002,      // 【R002】_【出荷実績抽出ダウンロード】
SHIPMENT_RECORD_SUMMARY_R003 : env_SHIPMENT_RECORD_SUMMARY_R003,      // 【R001】_【出荷実績抽出(ブランド集計)】
SHIPMENT_RECORD_SUMMARY_R004 : env_SHIPMENT_RECORD_SUMMARY_R004,      // 【R002】_【出荷実績抽出ダウンロード(ブランド集計)】

GET_CLIENT_UNIT_PRICE_LIST_SEARCH : env_CLIENT_UNIT_PRICE_LIST_SEARCH,  // 得意先単価マスタ一覧検索
GET_CLIENT_UNIT_PRICE_DOWWNLOAD : env_CLIENT_UNIT_PRICE_DOWWNLOAD,      // 得意先単価マスタダウンロード

// オートコンプリート用
AUTOCOMPLETE_CHARGE : 'charge',                         // [ZEUS]担当者一覧
AUTOCOMPLETE_SALESMAN : 'charge/get_salesman_list',     // [ZEUS]担当者一覧(営業、FS)

AUTOCOMPLETE_BRAND : env_AUTOCOMPLETE_BRAND,                            // ブランド一覧
AUTOCOMPLETE_CUSTOMER : env_AUTOCOMPLETE_CUSTOMER,                      // 得意先一覧
AUTOCOMPLETE_CUSTOMER_IN_CHARGE : env_AUTOCOMPLETE_CUSTOMER,            // 担当者別得意先一覧(得意先一覧を共用)
AUTOCOMPLETE_STORE : env_AUTOCOMPLETE_STORE,                            // 店舗一覧 (スペース区切り複数キーワード対応、得意先CD対応)

// NLC内製API用
ENABLE_ALL_CHARGE : 'charge/all',                               // [ZEUS]有効全担当者一覧
GET_CHARGE_BY_LOGIN_ID : 'charge/get_charge_by_login_id',       // [ZEUS]担当者情報取得（ログインID検索）
GET_CUSTOMER_CHARGE_LIST : 'charge/get_customer_charge_list',   // [ZEUS]得意先担当者ID取得
GET_RESPONSIBLE_CUSTOMER : 'charge/get_reponsible_customers',   // [ZEUS]得意先サブ担当取得

GET_NEWS : 'news/detail',   // [ZEUS]お知らせ取得

GET_STORE : 'get_store',   // 店舗情報取得　EILAPIで取得できていない項目の補完用（EIL側改修後廃止予定）

API_LOG : 'api_log',   // APIログ記録用

// 転送試算関連API(NLC内製)
GET_STORAGES : 'transfer/get_storages',                                         // 倉庫一覧
GET_HUB_STORAGES : 'transfer/get_transfer_hub_storages',                        // Hub拠点一覧
GET_TRANSFER_GROUPS : 'transfer/get_transfer_groups',                           // 転送グループ一覧
GET_TRANSFER_GROUP_AND_STORAGES : 'transfer/get_transfer_group_and_storages',   // 転送グループ詳細
GET_CAN_SELECT_CHILD_STORAGES : 'transfer/get_can_select_child_storages',       // 選択可能倉庫一覧
REGIST_TRANSFER_GROUP : 'transfer/regist_transfer_group',                       // 転送グループ登録（編集含む）
TRANSFER_GROUP_DELETE : 'transfer/transfer_group_delete',                       // 転送グループ削除


}).service('ApiService', ['$localStorage' ,'$http', '$window', 'app_conf', 'loginCheck', 'notification','$rootScope', function($localStorage, $http, $window, app_conf, loginCheck, notification, $rootScope){
    this.call = function($scope, $url, $params, $requestMethod = 'POST') {
        return　this._apiCall($scope, app_conf.API_BASE_URL + $url, $params, $requestMethod );
    }

    this.callNLC = function($scope, $url, $params, $requestMethod = 'POST') {
        return　this._apiCall($scope, app_conf.API_BASE_URL_NLC + $url, $params, $requestMethod, "application/json");
    }

    this._apiCall = function($scope, $url, $params, $requestMethod, $contentType = "text/plain") {
        // APIのリクエストログを送信
        sendRequestLog($url, this.getAPIHeader(), $params);

        return $http({
                method: $requestMethod,
                url: $url,
                headers: {"Content-Type": $contentType},
                data: {
                    header : this.getAPIHeader(),
                    params : $params }
        })
        .then(
            function (response){
                $rootScope.sys_error = "";
                console.log(response);
                var code = response.data['code'];
                var message = response.data['message'];

                if (code != app_conf.RETURN_CD_SUCCESS) {

                    if (code == app_conf.RETURN_CD_INVALID_AUTH) {
                        // 認証エラーの場合、ログイン画面へ遷移
                        loginCheck.authInvalidAction();
                    } else if (code == app_conf.RETURN_CD_EMPTY) {
                        // 該当データなしの場合、各画面の実装に委ねる
                    } else if (code == app_conf.RETURN_CD_IRREGULAR || code == app_conf.RETURN_CD_ABORT) {
                        // その他エラー
                        $rootScope.sys_error = "処理に失敗しました。\n";
                        $rootScope.sys_error += "エラーコード：" + code + "\n";
                        $rootScope.sys_error += "エラーメッセージ：" + message + "\n";
                        notification.showNotification('danger', $rootScope.sys_error);

                        throw $rootScope.sys_error;
                    }
                }

                // レスポンスが空だった場合（API不具合）
                if (response.data === "") {
                    // その他エラー
                    $rootScope.sys_error = "APIに不具合が発生しています。\nシステム管理者にお問い合わせください";
                    notification.showNotification('danger', $rootScope.sys_error);
                }

                return response;
            },
            function (error){
                $rootScope.loading = false;

                console.log(error);
                var message = error.data['message'];
                $rootScope.sys_error = "通信に失敗しました。管理者にお問い合わせください。";
                $rootScope.sys_error += "エラーコード：" + error.status + "\n";
                $rootScope.sys_error += "エラーメッセージ：" + message + "\n";
                notification.showNotification('danger', $rootScope.sys_error);

                throw $rootScope.sys_error;
            }            
        );
    }

    this.getHeader = function() {
        var header = {
            "Authorization" : $localStorage.user.token, // $localStorage.token,
            "AccountID" : $localStorage.user.id_charge,
            "AppID" : app_conf.APP_ID,
        }

        return header;
    }

    this.getAPIHeader = function() {
        var header = this.getHeader();
        return header;
    }

    this.getDownloadHeader = function() {
        var header = this.getHeader();
        return header;
    }

    this.filedownload = function($scope, $url, $params, $requestMethod = 'GET', $filename = "") {
        return this._filedownload($scope, app_conf.API_BASE_URL + $url, $params, $requestMethod, $filename);
    }

    this.filedownloadNLC = function($scope, $url, $params, $requestMethod = 'GET', $filename = "") {
        return　this._filedownload($scope, app_conf.API_BASE_URL_NLC + $url, $params, $requestMethod, $filename);
    }

    this._filedownload = function($scope, $url, $params, $requestMethod, $filename) {
        // APIのリクエストログを送信
        sendRequestLog($url, this.getAPIHeader(), $params);

        var getParams = [];
        for (key in $params) {
            getParams.push(key + "=" + $params[key]);
        }
        var formatedUrl = ($requestMethod === "POST") ? $url : $url + "?" + getParams.join("&");
        var request = {
            headers: this.getDownloadHeader(),
            responseType : 'blob',
            method: $requestMethod,
            url: formatedUrl,
        }
        if ($requestMethod === "POST") {
            request['data'] = {
                header : this.getDownloadHeader(),
                params : $params
            }
        }
        return $http(request)
        .then(
            async function (response){
                // TODO:認証エラーが返却された場合の挙動を追加
                console.log(response);
                var code = response.status
                if (code == 200) {
                    var blob = response.data;

                    // aタグの生成
                    var a = document.createElement("a");

                    // レスポンスからBlobオブジェクト＆URLの生成
                    var blobUrl = window.URL.createObjectURL(new Blob([blob], {
                        type: blob.type
                    }));
                    
                    // 上で生成したaタグをアペンド
                    document.body.appendChild(a);
                    a.style = "display: none";
                    
                    // BlobオブジェクトURLをセット
                    a.href = blobUrl;
                    
                    // ダウンロードさせるファイル名の生成
                    if (!isEmptyStr($filename)) {
                        a.download = $filename; 
                    } else {
                        var fname = "download_file";
                        var disposition = response.headers('Content-Disposition');
                        if (disposition && disposition.indexOf('attachment') !== -1) {
                            var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                            var matches = filenameRegex.exec(disposition);
                            if (matches != null && matches[1]) { 
                                fname = matches[1].replace(/['"]/g, '');
                            }
                        }
                        a.download = decodeURIComponent(fname.replace(/\+/g," "));
                    }
                    
                    //クリックイベント発火
                    a.click();

                } else {
                    $rootScope.sys_error = "処理に失敗しました。\n";
                    $rootScope.sys_error += "エラーコード：" + code + "\n";
                    $rootScope.sys_error += "エラーメッセージ：" + message + "\n";
                }
                $rootScope.loading = false;
            },
            function (error){
                $rootScope.loading = false;
                console.log(error);
                // var message = error.data['message'];
                $rootScope.sys_error = "通信に失敗しました。管理者にお問い合わせください。";
                $rootScope.sys_error += "エラーコード：" + error.status + "\n";
                // $rootScope.sys_error += "エラーメッセージ：" + message + "\n";
                notification.showNotification('danger', $rootScope.sys_error);

                throw $rootScope.sys_error;
            }
            
        );
        
    }

    function sendRequestLog($target_url, $header, $params) {
        // ログ記録APIに送信
        $http({
            method: "POST",
            url: app_conf.API_BASE_URL_NLC + "api_log",
            headers: {"Content-Type": "text/plain"},
            data: {
                status      : "INFO",
                target_url  : $target_url,
                header      : $header,
                params      : $params,
            }
        }).then (
            function (response){
                return;
            },
            function (error){
                return;
            }
        ).catch (e => {
            throw e;
        });
    }
}]);
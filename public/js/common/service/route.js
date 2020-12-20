angular.module('route', [])
.value('route', {
    // --------------------------
    // ルーティング関連
    // --------------------------
    ROUTE_MASTER_SHEET_LIST : "/master/sheet_list",	                    // 配荷表登録

    ROUTE_SHEET_LIST : "/sheet/sheet_list",                              // 配荷表入力
    ROUTE_FLOT_INPUT : "/flot/flot_send",	                            // 初回＠送信
    ROUTE_FLOT_PRODUCT : "/flot/flot_product",	                        // 初回＠送信_商品選択
    ROUTE_FLOT_LIST : "/flot/flot_list",	                            // 初回＠送信一覧
    ROUTE_SHIPMENT_INPUT : "/shipment/shipment_input",	                // 出荷@/直接入力
    ROUTE_SHIPMENT_UPLOAD : "/shipment/shipment_upload",	            // 出荷@/ファイルUPLOAD
    ROUTE_SHIPMENT_LIST : "/shipment/shipment_list",	                // 出荷@依頼一覧
    ROUTE_MASTER_CUSTOMER_UNIT_PRICE : "/client_unit_price/client_unit_price",	// 得意先単価マスタ

    ROUTE_SHIPMENT_LOGISTICS_TOP : "/shipment/logistics_top",	        // 物流TOP
    ROUTE_FLOT_ALLOC : "/flot/flot_alloc",	                            // 初回＠の振分け
    ROUTE_FLOT_ALLOC_EDIT : "/flot/flot_alloc_edit",	                // 初回＠の振分け編集
    ROUTE_SHIPMENT_LIST_INPUT : "/shipment/shipment_list_input",	    // 出荷@依頼一覧

    ROUTE_SHEET_DOWNLOAD_FOR_PRODUCT : "/sheet/sheet_download_for_product",	            // 配下表（商品部）
    ROUTE_SHEET_DOWNLOAD_BY_ALL : "/sheet/flot_download_by_all",	                    // 初回＠予定残すべて
    ROUTE_SHEET_DOWNLOAD_BY_BRAND : "/sheet/flot_download_by_brand",	                // 初回＠予定残×ブランド毎(出荷済以外)
    ROUTE_SHEET_DIGEST : "/sheet/sheet_digest",	                                        // 消化表
    ROUTE_SHIPMENT_RECORD_SUMMARY : "/shipment/shipment_record_summary",                // 出荷実績抽出
    ROUTE_SHIPMENT_RECORD_SUMMARY_BRAND : "/shipment/shipment_record_summary_brand",    // 出荷実績抽出(ブランド)

    ROUTE_STOCK_LIST : "/stock",	                                     // 在庫一覧
    ROUTE_STOCK_REGIST : "/stock/regist",	                             // 在庫登録
    ROUTE_STOCK_ANALYSIS : "/stock/analysis",	                         // 在庫集計・ダウンロード

    ROUTE_STOCK_BALANCE : "/transfer/stock_balance",	                 // 転送試算＞在庫バランス
    ROUTE_TRANSFER_SIMULATION : "/transfer/transfer_simulation",	     // 転送試算＞転送試算
    ROUTE_TRANSFER_HUB_STORAGE_MASTER : "/transfer/hub_storage_master",	 // 転送試算＞Hub拠点マスタ
    ROUTE_TRANSFER_GROUP_MASTER : "/transfer/transfer_group_master",	 // 転送試算＞転送グループマスタ
    ROUTE_TRANSFER_PARAM_MASTER : "/transfer/transfer_param_master",	 // 転送試算＞転送試算パラメータマスタ

    ROUTE_SHIPMENT_EMAIL_FORM : "/shipment/shipment_email_form",
    ROUTE_SHIPMENT_EMAIL_CONFIRM : "/shipment/shipment_email_confirm",
    ROUTE_SHIPMENT_EMAIL_COMPLATE : "/shipment/shipment_email_complate",

    PRIV_SALES_CHIEF        : 2,    // 営業 主任
    PRIV_SALES_GENERAL      : 3,    // 営業 一般
    PRIV_SALES_FS           : 4,    // 営業 FS
    PRIV_BO_GENERAL         : 6,    // BO 一般
    PRIV_BO_ADMIN           : 9,    // BO Admin
    PRIV_STORAGE_NLC        : 10,	// NLC物流倉庫
    PRIV_ADMIN              : 15,   // 管理者 Admin
    PRIV_INTERN_SS          : 17,   // インターンSS
    PRIV_SALES_FS_WISEMAN   : 21,   // 営業FS 賢者
    PRIV_SALES_FS_WARRIOR   : 22,   // 営業FS 戦士
    PRIV_DEVELOPER          : 38,   // 開発
	PRIV_CC_GOI             : 49,	// CC@五井[管理者]
})
.service('privilege', ['$localStorage' , 'route', function($localStorage, route){
    this.canDisplay = function(menu_name) {
        return (typeof $localStorage.user !== "undefined" && 
                getPrivilege(menu_name).indexOf($localStorage.user.privilege) != -1);
    }

    // 暫定でハードコーディングしているが、将来的に権限管理画面で変更可能にしたい
    function getPrivilege(menu_name) {
        var privileges = {
            [route.ROUTE_MASTER_SHEET_LIST] : 
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF, 
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHEET_LIST] : 
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_SALES_FS,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_INTERN_SS,
                route.PRIV_SALES_FS_WISEMAN,
                route.PRIV_SALES_FS_WARRIOR,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_FLOT_INPUT] :
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_SALES_FS,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_SALES_FS_WISEMAN,
                route.PRIV_SALES_FS_WARRIOR,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_FLOT_LIST] :
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_BO_GENERAL,
                route.PRIV_INTERN_SS,
                route.PRIV_SALES_FS_WISEMAN,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHIPMENT_INPUT] :
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_SALES_FS,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_INTERN_SS,
                route.PRIV_SALES_FS_WISEMAN,
                route.PRIV_SALES_FS_WARRIOR,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHIPMENT_UPLOAD] :
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_SALES_FS,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_INTERN_SS,
                route.PRIV_SALES_FS_WISEMAN,
                route.PRIV_SALES_FS_WARRIOR,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHIPMENT_LIST] :
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_SALES_FS,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_INTERN_SS,
                route.PRIV_SALES_FS_WISEMAN,
                route.PRIV_SALES_FS_WARRIOR,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_MASTER_CUSTOMER_UNIT_PRICE] :
            [
                route.PRIV_ADMIN,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
            ],

            [route.ROUTE_SHIPMENT_LOGISTICS_TOP] :
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_SALES_FS,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_SALES_FS_WARRIOR,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_FLOT_ALLOC] :
            [
                route.PRIV_ADMIN,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_INTERN_SS,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHIPMENT_LIST_INPUT] :
            [
                route.PRIV_ADMIN,
                route.PRIV_STORAGE_NLC,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHEET_DOWNLOAD_FOR_PRODUCT] :
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_SALES_FS,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_INTERN_SS,
                route.PRIV_SALES_FS_WARRIOR,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHEET_DOWNLOAD_BY_ALL] :
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_SALES_FS,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_SALES_FS_WARRIOR,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHEET_DOWNLOAD_BY_BRAND] :
            [
                route.PRIV_ADMIN,
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_SALES_FS,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_SALES_FS_WARRIOR,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHEET_DIGEST] :
            [
                route.PRIV_ADMIN,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_SHIPMENT_RECORD_SUMMARY] :
            [
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_ADMIN,
                route.PRIV_DEVELOPER,
                route.PRIV_SALES_FS,
                route.PRIV_SALES_FS_WISEMAN,
                route.PRIV_SALES_FS_WARRIOR,
            ],

            [route.ROUTE_SHIPMENT_RECORD_SUMMARY_BRAND] :
            [
                route.PRIV_SALES_CHIEF,
                route.PRIV_SALES_GENERAL,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_ADMIN,
                route.PRIV_DEVELOPER,
            ],

            [route.ROUTE_STOCK_LIST] :
            [
                route.PRIV_ADMIN,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
            ],

            [route.ROUTE_STOCK_REGIST] :
            [
                route.PRIV_ADMIN,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
            ],

            [route.ROUTE_STOCK_ANALYSIS] :
            [
                route.PRIV_ADMIN,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
                route.PRIV_CC_GOI,
            ],

            [route.ROUTE_STOCK_BALANCE] :
            [
                route.PRIV_ADMIN,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
            ],

            [route.ROUTE_TRANSFER_SIMULATION] :
            [
                route.PRIV_ADMIN,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
            ],

            [route.ROUTE_TRANSFER_HUB_STORAGE_MASTER] : [
                route.PRIV_ADMIN,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
            ],

            [route.ROUTE_TRANSFER_GROUP_MASTER] : [
                route.PRIV_ADMIN,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
            ],

            [route.ROUTE_TRANSFER_PARAM_MASTER] : [
                route.PRIV_ADMIN,
                route.PRIV_BO_GENERAL,
                route.PRIV_BO_ADMIN,
                route.PRIV_DEVELOPER,
            ],

        }

        return privileges[menu_name];
    }

    this.canSheetPlanQtyInput = function() {
        return ($localStorage.user.privilege == route.PRIV_BO_ADMIN ||
            $localStorage.user.privilege == route.PRIV_ADMIN ||
            $localStorage.user.privilege == route.PRIV_DEVELOPER)
    }
    
    this.displayShipmentMenu = function() {
        return (this.canDisplay(route.ROUTE_SHIPMENT_LOGISTICS_TOP) || 
            this.canDisplay(route.ROUTE_FLOT_ALLOC) || 
            this.canDisplay(route.ROUTE_SHIPMENT_LIST_INPUT));
    }

    this.displaySalesMenu = function() {
        return (
            this.canDisplay(route.ROUTE_SHEET_LIST) ||
            this.canDisplay(route.ROUTE_FLOT_INPUT) ||
            this.canDisplay(route.ROUTE_FLOT_LIST) ||
            this.canDisplay(route.ROUTE_SHIPMENT_INPUT) ||
            this.canDisplay(route.ROUTE_SHIPMENT_UPLOAD) ||
            this.canDisplay(route.ROUTE_SHIPMENT_LIST) ||
            this.canDisplay(route.ROUTE_MASTER_CUSTOMER_UNIT_PRICE)
        );
    }

    this.displayDownloadMenu = function() {
        return (this.canDisplay(route.ROUTE_SHEET_DOWNLOAD_FOR_PRODUCT) || 
            this.canDisplay(route.ROUTE_SHEET_DOWNLOAD_BY_ALL) || 
            this.canDisplay(route.ROUTE_SHEET_DOWNLOAD_BY_BRAND) ||
            this.canDisplay(route.ROUTE_SHEET_DIGEST) || 
            this.canDisplay(route.ROUTE_SHIPMENT_RECORD_SUMMARY));
    }

    this.displayStockMenu = function() {
        return (this.canDisplay(route.ROUTE_STOCK_LIST) || 
            this.canDisplay(route.ROUTE_STOCK_ANALYSIS) ||
            this.canDisplay(route.ROUTE_STOCK_BALANCE) ||
            this.canDisplay(route.ROUTE_TRANSFER_SIMULATION));
    }

    this.displayTransferMenu = function() {
        return (this.canDisplay(route.ROUTE_STOCK_BALANCE) ||
            this.canDisplay(route.ROUTE_TRANSFER_SIMULATION));
    }

    this.displayShipmentRecordSummaryBrand = function() {
        return (this.canDisplay(route.ROUTE_SHIPMENT_RECORD_SUMMARY_BRAND));
    }

    this.canEmoriMenu = function() {
        return (
            (typeof $localStorage.user !== "undefined") && (
            $localStorage.user.privilege == route.PRIV_SALES_CHIEF ||
            $localStorage.user.privilege == route.PRIV_SALES_GENERAL ||
            $localStorage.user.privilege == route.PRIV_SALES_FS ||
            $localStorage.user.privilege == route.PRIV_BO_GENERAL ||
            $localStorage.user.privilege == route.PRIV_BO_ADMIN ||
            $localStorage.user.privilege == route.PRIV_ADMIN ||
            $localStorage.user.privilege == route.PRIV_SALES_FS_WISEMAN ||
            $localStorage.user.privilege == route.PRIV_SALES_FS_WARRIOR ||
            $localStorage.user.privilege == route.PRIV_DEVELOPER || 
            $localStorage.user.privilege == route.PRIV_CC_GOI)
        );
    }
}]);
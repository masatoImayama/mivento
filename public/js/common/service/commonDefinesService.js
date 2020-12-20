angular.module('commonDefinesService', ['apiModule'])
.constant('app_conf', {
// --------------------------
// API関連
// --------------------------
API_BASE_URL : env_EIL_API_BASE_URL,
API_BASE_URL_NLC : env_NLC_API_BASE_URL,
APP_ID : 20,

RETURN_CD_SUCCESS : "0",
RETURN_CD_INVALID_AUTH : "1",
RETURN_CD_EMPTY : "2",
RETURN_CD_ABORT : "4",
RETURN_CD_IRREGULAR : "99",

// --------------------------
// 共通メッセージ関連
// --------------------------
HTTP_REQUEST_ERROR_MSG : "通信に失敗しました。システム管理者に問い合わせてください。",

// --------------------------
// ファイル操作関連
// --------------------------
UPLOAD_MAX_FILE_SIZE : 8192, // 8MByte

// --------------------------
// ステータス定義関連
// --------------------------
// 初回＠ステータス
FIRSTLOT_STATUS_ALLOC               : "1", // 要振り分け
FIRSTLOT_STATUS_PLANNED             : "2", // 出荷予定
FIRSTLOT_STATUS_SHIPPED             : "3", // 出荷済み
FIRSTLOT_STATUS_SHIPMENT_GAP        : "4", // 出荷ズレ
FIRSTLOT_STATUS_NOT_SHIPPED         : "5", // 未出荷

// 商品種別
PRODUCT_FLG_NORMAL         : "0",  // 通常品
PRODUCT_FLG_REPEAL         : "1",  // 廃番品
PRODUCT_FLG_PLANNED_REPEAL : "2",  // 廃番予定品
PRODUCT_FLG_LIMITED        : "3",  // 数量限定
PRODUCT_FLG_S_GRADE        : "4",  // S級品
PRODUCT_FLG_OVERSEAS       : "10", // 海外

DELIVERY_TIME_CATEGORY_AM : "812", // 午前中

SHIPMENT_STATUS_UNAPPROVE   : "1", // 未承認
SHIPMENT_STATUS_APPROVE     : "2", // 承認済
SHIPMENT_STATUS_WORKING     : "3", // 作業中
SHIPMENT_STATUS_FINISHED    : "4", // 完了

// 出荷区分
SHIPMENT_DIVISION_PRODUCT   : "1", // 商品
SHIPMENT_DIVISION_SAMPLE    : "3", // サンプル
SHIPMENT_DIVISION_TRANSFER  : "4", // 転送

// --------------------------
// 送信先メール関連
// --------------------------
ROGI_MAIL_TO : env_ROGI_MAIL_TO,

// --------------------------
// 商品画像ベースURL
// --------------------------
// IMG_BASE_URL : "https://static-exp-zeus.naturelab.co.jp/product/",
IMG_BASE_URL : env_IMG_BASE_URL,

})
.service('commonDefines', ['$log', 'ApiUrl', function($log, ApiUrl) {
    this.setCommonDefines = function($localStorage) {
        // TODO:6月リリース時点では、当ファイル内にリテラル値指定だが、
        // リリース後、江守側の共通定数取得API呼び出しに変更する必要がある。

        var result = {
            "shipment_status":{
                "1":"未承認",
//                "2":"承認済",
                "3":"作業中",
                "4":"完了",
            },
            "firstlot_status":{
                "1":"要振り分け",
                "2":"出荷予定",
                "3":"出荷済み",
                "4":"出荷ズレ",
                "5":"未出荷",
            },
            "shipment_workshop":{
                "1":"カンダ",
                "2":"NLC",
            },
            "product_category":[
                {val:"0", label:"通常品",},
                {val:"1", label:"廃番品",},
                {val:"2", label:"廃番予定品",},
                {val:"3", label:"数量限定",},
                {val:"4", label:"S級品",},
                {val:"10", label:"海外",},
            ],
            "division_category":[
                {val:"1", label:"商品",},
                {val:"3", label:"サンプル",},
                {val:"4", label:"転送",},
            ],
            "delivery_time_category":[
                {val:"", label:"",},
                {val:"812", label:"午前中",},
                {val:"1416", label:"14～16時",},
                {val:"1618", label:"16～18時",},
                {val:"1820", label:"18～20時",},
                {val:"1921", label:"19～21時",},
            ],
            "shipment_mail_workshop":{
                'sendto_kanda' : '北関東',
                'sendto_kansai' : '豊興関西',
                'sendto_kyushu' : '豊興九州',
                'sendto_sanshin' : '札幌',
                'sendto_toyokawa' : '大府',
                'sendto_komaki' : '小牧',
                'sendto_sakai' : '堺',
                'sendto_minamikanto' : '南関東センター',
                'sendto_okinawa' : '沖縄',
            },
            "shipment_mail_workshop_cd":{
                '10' : 'sendto_kanda',
                '20' : 'sendto_kansai',
                '21' : 'sendto_kyushu',
                '70' : 'sendto_sanshin',
                '31' : 'sendto_toyokawa',
                '32' : 'sendto_komaki',
                '33' : 'sendto_sakai',
                '16' : 'sendto_minamikanto',
                '22' : 'sendto_okinawa',
            },
        }

        $localStorage.shipment_status = result.shipment_status;
        $localStorage.firstlot_status = result.firstlot_status;
        $localStorage.shipment_workshop = result.shipment_workshop;
        $localStorage.product_category = result.product_category;
        $localStorage.division_category = result.division_category;
        $localStorage.delivery_time_category = result.delivery_time_category;
        $localStorage.shipment_mail_workshop = result.shipment_mail_workshop;
        $localStorage.shipment_mail_workshop_cd = result.shipment_mail_workshop_cd;
    }

}]);

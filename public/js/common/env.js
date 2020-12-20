// 本番用 環境設定ファイル
const env_ROGI_MAIL_TO = "logi@naturelab.co.jp";

const env_EIL_API_BASE_URL = 'https://pandora.naturelab.co.jp/nlsls/api/';
const env_NLC_API_BASE_URL = 'https://panda.naturelab.co.jp/api/';

const env_IMG_BASE_URL = 'https://panda.naturelab.co.jp/p_img/';

// 依頼（営業）> 出荷@/直接入力
const env_SALES_SHIP_INPUT_R001 = 'as000x/R001.php';
const env_SALES_SHIP_INPUT_R002 = 'as000x/R002.php'; // TODO:現在どこからも呼ばれていない
const env_SALES_SHIP_INPUT_R005 = 'as140x/R005.php';
const env_SALES_SHIP_INPUT_R007 = 'as140x/R007.php';
const env_SALES_SHIP_INPUT_C001 = 'as140x/C001.php';

// 依頼（営業）> 出荷@依頼一覧
const env_SALES_SHIP_LIST_R001 = 'as000x/R004.php';

// 依頼（営業）> 出荷@依頼一覧' + 詳細
const env_SALES_SHIP_DETAIL_R001 = 'as160x/R001.php';

// 依頼（営業）> 出荷@依頼一覧' + UPLOADファイル
const env_SALES_SHIP_DETAIL_UPLOAD_R001 = 'as150x/R003.php';

// 依頼（営業）> 出荷@依頼一覧' + 添付ファイル（海外Invoice専用）
const env_SALES_SHIP_DETAIL_ATTACH_R001 = 'as150x/R004.php';

// 依頼（営業）> 出荷@依頼一覧' + 指示メール送信
const env_SALES_SHIP_SEND_MAIL_R001 = 'as210x/R001.php';
const env_SALES_SHIP_SEND_MAIL_R002 = 'as210x/R002.php';
const env_SALES_SHIP_SEND_MAIL_U001 = 'as210x/U001.php';
const env_SALES_SHIP_SEND_MAIL_U002 = 'as210x/U002.php';

// 依頼（営業）> 出荷@/ファイルUPLOAD
const env_SALES_SHIP_FILE_UPLOAD_C001 = 'as170x/C001.php';

// 依頼（営業）> 配荷表入力
const env_SALES_DELIVERY_INPUT_R001 = 'as110x/R001.php';
const env_SALES_DELIVERY_INPUT_R002 = 'as110x/R002.php';
const env_SALES_DELIVERY_INPUT_R003 = 'as110x/R003.php';
const env_SALES_DELIVERY_INPUT_U001 = 'as110x/U001.php';


// 集計（物流）> 初回＠の振分け
const env_LOGISTICS_FIRSTLOT_EDIT_R001 = 'as180x/R001.php';
const env_LOGISTICS_FIRSTLOT_EDIT_R002 = 'as180x/R002.php';
const env_LOGISTICS_FIRSTLOT_EDIT_R003 = 'as180x/R003.php';
const env_LOGISTICS_FIRSTLOT_EDIT_R004 = 'as180x/R004.php';
const env_LOGISTICS_FIRSTLOT_EDIT_R005 = 'as180x/R004.php'; // LOGISTICS_FIRSTLOT_EDIT_R004と同一のAPIURL
const env_LOGISTICS_FIRSTLOT_EDIT_C001 = 'as180x/C001.php';
const env_LOGISTICS_FIRSTLOT_EDIT_U001 = 'as180x/U001.php';
const env_LOGISTICS_FIRSTLOT_EDIT_U002 = 'as180x/U002.php';
const env_LOGISTICS_FIRSTLOT_EDIT_D001 = 'as180x/D001.php';

// 集計（物流）> 初回＠送信
const env_LOGISTICS_FIRSTLOT_SEND_C001 = 'as190x/C001.php';

// 集計（物流）> 出荷@依頼一覧
const env_LOGISTICS_SHIP_LIST_R001 = 'as000x/R004.php';
const env_LOGISTICS_SHIP_LIST_U001 = 'as160x/U001.php';
const env_LOGISTICS_SHIP_LIST_D001 = 'as160x/D001.php';

// 集計（物流）> 出荷@依頼一覧' + 詳細
const env_LOGISTICS_SHIP_DETAIL_R002 = 'as160x/R002.php';
const env_LOGISTICS_SHIP_DETAIL_U002 = 'as160x/U002.php';
const env_LOGISTICS_SHIP_DETAIL_U003 = 'as160x/U003.php';           

// 集計（物流）> 物流TOP
const env_LOGISTICS_LOGI_TOP_R002 = 'as230x/R002.php';
const env_LOGISTICS_LOGI_TOP_R003 = 'as230x/R003.php';

// ダウンロード > 消化表
const env_DOWNLOAD_DIGESTION_SHEET_R001 = 'as130x/R001.php';
const env_DOWNLOAD_DIGESTION_SHEET_R002 = 'as130x/R002.php';
const env_DOWNLOAD_DIGESTION_SHEET_U001 = 'as130x/U001.php';
const env_DOWNLOAD_DIGESTION_SHEET_U002 = 'as130x/U002.php';

// ダウンロード > 初回＠予定残×ブランド毎(出荷済以外)
const env_DOWNLOAD_FIRSTLOT_REMAINING_BRAND_R001 = 'as200x/R001.php';
const env_DOWNLOAD_FIRSTLOT_REMAINING_BRAND_R002 = 'as200x/R002.php';

// ダウンロード > 初回＠予定残すべて
const env_DOWNLOAD_FIRSTLOT_REMAINING_R001 = 'as220x/R001.php';

// ダウンロード > 配下表（商品部）
const env_DOWNLOAD_DELIVERY_LIST_R001 = 'as120x/R001.php';
const env_DOWNLOAD_DELIVERY_LIST_R002 = 'as120x/R002.php';
const env_DOWNLOAD_DELIVERY_LIST_R003 = 'as120x/R003.php';

// マスタ > 配荷表一覧
const env_MASTER_DELIVERY_LIST_R001 = 'as100x/R001.php';      // 【R001】_【配荷表一覧検索】
const env_MASTER_DELIVERY_LIST_R002 = 'as100x/R002.php';      // 【R002】_【配荷表ダウンロード】
const env_MASTER_DELIVERY_LIST_R003 = 'as100x/R003.php';      // 【R003】_【配荷表目標アップロードチェック】
const env_MASTER_DELIVERY_LIST_R004 = 'as100x/R004.php';      // 【R004】_【配荷表情報取得】
const env_MASTER_DELIVERY_LIST_R006 = 'as100x/R006.php';      // 【R006】_【商品情報取得】
const env_MASTER_DELIVERY_LIST_R007 = 'as000x/R003.php';      // 【R007】_【商品一覧検索】
const env_MASTER_DELIVERY_LIST_C001 = 'as100x/C001.php';      // 【C001】_【配荷表入力登録】
const env_MASTER_DELIVERY_LIST_U001 = 'as100x/U001.php';      // 【U001】_【配荷表公開状態変更】
const env_MASTER_DELIVERY_LIST_U002 = 'as100x/U002.php';      // 【U002】_【配荷表目標アップロード更新】
const env_MASTER_DELIVERY_LIST_U003 = 'as100x/U003.php';      // 【U003】_【配荷表入力更新】
const env_MASTER_DELIVERY_LIST_D001 = 'as100x/D001.php';      // 【D001】_【配荷表削除】

const env_SHIPMENT_RECORD_SUMMARY_R001 = "as290x/R001.php";     // 【R001】_【出荷実績抽出】
const env_SHIPMENT_RECORD_SUMMARY_R002 = "as290x/R002.php";     // 【R002】_【出荷実績抽出ダウンロード】
const env_SHIPMENT_RECORD_SUMMARY_R003 = "as290x/R003.php";    // 【R003】_【出荷実績抽出(ブランド集計)】
const env_SHIPMENT_RECORD_SUMMARY_R004 = "as290x/R004.php";   // 【R004】_【出荷実績抽出ダウンロード(ブランド集計)】

const env_AUTOCOMPLETE_BRAND = "brand/list.php";
const env_AUTOCOMPLETE_CUSTOMER = "tokuisaki/list.php";
const env_AUTOCOMPLETE_STORE = "tenpo/list.php";
const env_CLIENT_UNIT_PRICE_LIST_SEARCH = "tanka/list.php";
const env_CLIENT_UNIT_PRICE_DOWWNLOAD = "tanka/output.php";

const env_MENU_BAR_BGCOLOR = '';
const env_DEV_ENV_MESSAGE = '';
// ログインチェック
var appUtil = angular.module('logincheckModule', [
	'ngStorage',
	'commonDefinesService',
	'apiModule',
])
.service('loginCheck', ['$window', '$localStorage', '$injector',
	function($window, $localStorage, $injector){
    this.isLogin = async function($scope) {
		var ApiUrl = $injector.get('ApiUrl');
		var ApiService = $injector.get('ApiService');
		var app_conf = $injector.get('app_conf');

		$scope.$storage = $localStorage.$default({});

		// cookie不許可の場合、強制ログアウト
		if (navigator.cookieEnabled === false) {
			this.authInvalidAction();	
		}

		// localstorageに「user」変数が存在しない場合も強制ログアウト
		if (typeof $localStorage['user'] === "undefined") {
			this.authInvalidAction("auth");	
		}
		
		// // TODO:ログインチェックAPIが実装されるまでの代用
		// var res = await ApiService.call($scope, ApiUrl.SALES_SHIP_SEND_MAIL_R002, null);
		// if (res.data.code == app_conf.RETURN_CD_INVALID_AUTH) {
		// 	this.authInvalidAction("auth");			
		// }
	};
	
	this.authInvalidAction = function (reason) {
		// 認証失敗の場合、ログイン画面へ遷移する
		$localStorage.$reset();
		$localStorage['err'] = reason;
		$window.location.href = '/login';
	}
}]);
	
var App = angular.module('App', [
	'logincheckModule',
	'ngStorage',
	'ui.bootstrap',
	'commonDefinesService', 
	'partsDirective',
	'apiModule',
	'validation',
	'customFilter',
	'notification',
	'route',
	'emori',
	'paging',
	'recordSummary',
	'as.sortable',
]);

App.controller('parentCtrl', [ '$scope', '$rootScope', '$window', 'loginCheck', 'ApiUrl', 'ApiService', '$localStorage', '$cacheFactory',　'commonDefines', 'app_conf', 'route', 'privilege', 'emori', '$timeout',
	function($scope, $rootScope, $window, $loginCheck, ApiUrl, ApiService, $localStorage, $cacheFactory, commonDefines, app_conf, route, privilege, emori, $timeout) {
	
	// キャッシュクリア
	$cacheFactory('cacheId').destroy();

	// app_conf(アプリ内定数)読み込み
	$rootScope.app_conf = app_conf;

	$scope.route = route;
	$scope.privilege = privilege;
	$scope.emori = emori;
	$scope.today = new Date();
	$scope.menu_bar_bgcolor = env_MENU_BAR_BGCOLOR;
	$scope.dev_env_message = env_DEV_ENV_MESSAGE;

	// ページが読み込まれた時の処理
	this.$onInit = async function () {
        await $loginCheck.isLogin($scope);
		
		// 共通定数取得
		commonDefines.setCommonDefines($localStorage);

		// ローカルストレージの同期
		$scope.$storage = $localStorage;

		if (typeof $localStorage.prev_base_uri === "undefined") {
			$localStorage['prev_base_uri'] = document.documentURI;
		}
	}

	$scope.transitionEmori = function(screenId) {
		// TODO:必要に応じて認証処理などを実装
		window.open(emori.EMORI_PANDA_URL + screenId + "?token=" + $localStorage.user.token, '_blank');
	}

	// 初回＠予定残すべて_Excelダウンロード
	$scope.firstlotDownloadAll = function() {
		ApiService.filedownload($scope, ApiUrl.DOWNLOAD_FIRSTLOT_REMAINING_R001, []).then(function (res) {
			// 完了処理なし
		});
	}

	$scope.scrollTop = function(position = 0) {
		$("#main-panel").scrollTop(position);
	}

	$scope.keydownProc = function($event) {
		if ($event.key == "ArrowDown") {
			document.getElementById("main-panel").scrollBy(0,10);
		}

		if ($event.key == "ArrowUp") {
			document.getElementById("main-panel").scrollBy(0,-10);
		}

		if ($event.key == "ArrowRight") {
			document.getElementById("main-panel").scrollBy(10,0);
		}

		if ($event.key == "ArrowLeft") {
			document.getElementById("main-panel").scrollBy(-10,0);
		}
	}

	// 終了処理
	$scope.$watch('$viewContentLoaded', 
		function() { 
			$timeout(function() {
				$localStorage['prev_base_uri'] = document.documentURI;
			},0);    
		});

}]);
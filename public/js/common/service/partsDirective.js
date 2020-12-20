angular.module('partsDirective', ['apiModule'])

.directive('brandAutoComplete',['$http', 'ApiUrl', 'ApiService', 'app_conf', function($http, ApiUrl, ApiService, app_conf) {

	var api_url = ApiUrl.AUTOCOMPLETE_BRAND;
    return {
		restrict : 'A',
		require : 'ngModel',
		link : function(scope, element, attrs, ngModelCtrl) {
			element.autocomplete({
				minLength: 0,
				source: function(request, response) {
					scope.brandcd = "";
					request_url = api_url;
					
					ApiService.call(scope, request_url, {"keyword" : request.term}, 'POST')
					.then(
						function (response2){
							if (response2.data.code == app_conf.RETURN_CD_SUCCESS) {
								response($.map(response2.data.data, function (obj) {              
									return {
											label: obj.brannm,
											value: obj.brannm,
											brandcd: obj.brancd,
									};
								}));
							} else {
								response(['']);								
							}

						},function (error){
							response(['']);
						}
					);
				},
				select:function (event,ui) {
					  ngModelCtrl.$setViewValue(ui.item.label);
					  // 隠れフィールドにブランドCDを代入
					  scope.brandcd=ui.item.brandcd;
					  scope.$apply();
				},
			}),
			element.focusin(function(){
				$(this).autocomplete("search","");
			});
		},
	};
}])

.directive('customerAutoComplete',['$http', 'ApiUrl', 'ApiService', 'app_conf', function($http, ApiUrl, ApiService, app_conf) {

	var api_url = ApiUrl.AUTOCOMPLETE_CUSTOMER;

    return {
		restrict : 'A',
		require : 'ngModel',
		link : function(scope, element, attrs, ngModelCtrl) {
			element.autocomplete({
				minLength: 0,
				source: function(request, response) {
					var p_customer_group_flg = 0;
					if (typeof attrs['customerGroupFlg'] !== "undefined" && attrs['customerGroupFlg'] == 1) {
						p_customer_group_flg = 1;
					}

					scope.customercd = "";
					request_url = api_url;
					ApiService.call(scope, request_url, {"keyword" : request.term, "customer_group_flg": p_customer_group_flg}, 'POST')
					.then(
						function (response2){
							if (response2.data.code == app_conf.RETURN_CD_SUCCESS) {
								response($.map(response2.data.data, function (obj) {              
									return {
											label: obj.cunm_short,
											value: obj.cunm_short,
											customercd: obj.cucd,
									};
								}));
							} else {
								response(['']);
							}
						},function (error){
							response(['']);
						}
					);
				},
				
				select:function (event,ui) {
					  ngModelCtrl.$setViewValue(ui.item.label);
					  scope.$apply();
					 
					 // 隠れフィールドに得意先CDを代入
					 scope.customercd=ui.item.customercd;
				}
			}),
			element.focusin(function(){
				$(this).autocomplete("search","");
			});
		}
	};
}])

.directive('chargeCustomerAutoComplete',['$http', 'ApiUrl', 'ApiService', '$localStorage', 'route', 'app_conf',  function($http, ApiUrl, ApiService, $localStorage, route, app_conf) {

	var api_url = ApiUrl.AUTOCOMPLETE_CUSTOMER_IN_CHARGE;
	
	return {
		restrict : 'A',
		require : 'ngModel',
		link : function(scope, element, attrs, ngModelCtrl) {
			element.autocomplete({
				minLength: 0,
				source: function(request, response) {
					scope.customercd = "";
					request_url = api_url;

					var params = {};
					params['keyword'] = request.term;
					// 権限によって検索パラメータに「担当者ID(id_charge)」を含めるか制御する
					if ($localStorage.user.privilege == route.PRIV_SALES_GENERAL || 
						$localStorage.user.privilege == route.PRIV_SALES_FS || 
						$localStorage.user.privilege == route.PRIV_SALES_FS_WISEMAN || 
						$localStorage.user.privilege == route.PRIV_SALES_FS_WARRIOR
						) {
						params['id_charge'] = scope.$storage.user.id_charge;
					}

					ApiService.call(scope, request_url, params, 'POST')
					.then(
						function (response2){
							if (response2.data.code != app_conf.RETURN_CD_EMPTY) {
								response($.map(response2.data.data, function (obj) {              
									return {
											label: obj.cunm_short,
											value: obj.cunm_short,
											customercd: obj.cucd,
									};
								}));								
							}
						},function (error){
							response(['']);
						}
					);
				},
				
				select:function (event,ui) {
					  ngModelCtrl.$setViewValue(ui.item.label);
					  scope.$apply();
					 
					 // 隠れフィールドに得意先CDを代入
					 scope.customercd=ui.item.customercd;
				}
			}),
			element.focusin(function(){
				$(this).autocomplete("search","");
			});
		}
	};
}])


.directive('storeAutoComplete',['$http', 'ApiUrl', 'ApiService', 'app_conf', function($http, ApiUrl, ApiService, app_conf) {

    return {
		restrict : 'A',
		require : 'ngModel',
		link : function(scope, element, attrs, ngModelCtrl) {
			element.autocomplete({
				minLength: 0,
				source: function(request, response) {
					var keyword_ary = request.term.split(/,|\s/);
					var params = {"keyword" : keyword_ary};
					getStoreSource(app_conf, ApiUrl, ApiService, scope, response, params);
				},
				
				select:function (event,ui) {
					  ngModelCtrl.$setViewValue(ui.item.label);
					  scope.$apply();
					 
					 // 隠れフィールドに店舗CDを代入
					 scope.storecd=ui.item.storecd;
				}
			}),
			element.focusin(function(){
				$(this).autocomplete("search","");
			});
		}
	};
}])

.directive('filterStoreAutoComplete',['$http', 'ApiUrl', 'ApiService', 'app_conf', function($http, ApiUrl, ApiService, app_conf) {

    return {
		restrict : 'A',
		require : 'ngModel',
		link : function(scope, element, attrs, ngModelCtrl) {
			element.autocomplete({
				minLength: 0,
				source: function(request, response) {
					var keyword_ary = request.term.split(/,|\s/);
					var params = {"keyword" : keyword_ary, "customercd" : scope.customercd};
					getStoreSource(app_conf, ApiUrl,ApiService, scope, response, params);
				},
				
				select:function (event,ui) {
					  ngModelCtrl.$setViewValue(ui.item.label);
					  scope.$apply();
					 
					 // 隠れフィールドに店舗CDを代入
					 scope.storecd=ui.item.storecd;

					 // 得意先が未選択の場合は得意先名称と得意先CDをセット
					 if (isEmptyStr(scope.customercd)) {
						scope.customername = ui.item.customername;
						scope.customercd = ui.item.customercd;
						scope.$apply();
					 }
				}
			}),
			element.focusin(function(){
				$(this).autocomplete("search","");
			});
		}
	};
}])

.directive('chargeAutoComplete',['$http', 'ApiUrl', 'ApiService', function($http, ApiUrl, ApiService) {

    var api_url = ApiUrl.AUTOCOMPLETE_CHARGE;

    return {
		restrict : 'A',
		require : 'ngModel',
		link : function(scope, element, attrs, ngModelCtrl) {
			element.autocomplete({
				minLength: 0,
				source: function(request, response) {
					scope.id_charge = "";
					request_url = api_url + "?keyword=" + request.term;
					ApiService.callNLC(scope, request_url, [], 'GET')
					.then(
						function (response2){
							response($.map(response2.data.charge_array, function (obj) {              
								return {
								        label: obj.chargename,
								        value: obj.chargename,
								        id_charge: obj.id_charge,
								};
							}));
						},function (error){
							response(['']);
						}
					);
				},
				select:function (event,ui) {
					  ngModelCtrl.$setViewValue(ui.item.label);
					  scope.$apply();
					 
					 // 隠れフィールドに担当者IDを代入
					 scope.id_charge=ui.item.id_charge;
				}
			}),
			element.focusin(function(){
				$(this).autocomplete("search","");
			});
		}
	};
}])

.directive('salesmanAutoComplete',['$http', 'ApiUrl', 'ApiService', function($http, ApiUrl, ApiService) {

    var api_url = ApiUrl.AUTOCOMPLETE_SALESMAN;

    return {
		restrict : 'A',
		require : 'ngModel',
		link : function(scope, element, attrs, ngModelCtrl) {
			element.autocomplete({
				minLength: 0,
				source: function(request, response) {
					scope.id_charge = "";
					request_url = api_url;
					if (request.term.length > 0) {
						request_url += "/" + request.term;
					}
					ApiService.callNLC(scope, request_url, [], 'GET')
					.then(
						function (response2){
							response($.map(response2.data.charge_array, function (obj) {              
								return {
								        label: obj.chargename,
								        value: obj.chargename,
								        id_charge: obj.id_charge,
								};
							}));
						},function (error){
							response(['']);
						}
					);
				},
				select:function (event,ui) {
					  ngModelCtrl.$setViewValue(ui.item.label);
					  scope.$apply();
					 
					 // 隠れフィールドに担当者IDを代入
					 scope.id_charge=ui.item.id_charge;
				}
			}),
			element.focusin(function(){
				$(this).autocomplete("search","");
			});
		}
	};
}])

.directive('datepicker', function() {
    return {
        restrict: 'A',
		require: 'ngModel',
        link: function(scope, element, attrs, ngModelCtrl) {
			var min_date = attrs['minDate'];
			var max_date = attrs['maxDate'];
            $(element).datepicker({
				minDate: (min_date) == "" ? "" : stringToDate(min_date, "-"),
				maxDate: (max_date) == "" ? "" : stringToDate(max_date, "-"),
                dateFormat: 'yy-mm-dd',
                onSelect: function(date) {

					// 表示用
					var ngModel = this.attributes['ng-model'];
					ngModel.ownerElement.value = date.replace('/', '-');

					var ngModelName = this.attributes['ng-model'].value;
                    if (ngModelName.indexOf(".") != -1) {
                        var objAttributes = ngModelName.split(".");
                        var lastAttribute = objAttributes.pop();
                        var partialObjString = objAttributes.join(".");
                        var partialObj = eval("scope." + partialObjString);

                        partialObj[lastAttribute] = date.replace('/', '-');
                    }
                    else {
                        scope[ngModelName] = date.replace('/', '-');
					}
					scope.$apply();
                }
			});
        }
    };
})

.directive('ympicker', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attrs, ngModelCtrl) {
        	$(element).ympicker({
				prevText      : '前年',
				nextText      : '翌年',
				monthNames        : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
				monthNamesShort   : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
				dateFormat        : 'yy-mm',
				yearSuffix        : '年',
				yearRange     : '-10:+100',
	        	onSelect: function(date){
					// 表示用
					var ngModel = this.attributes['ng-model'];
					ngModel.ownerElement.value = date.replace('/', '-');

					var ngModelName = this.attributes['ng-model'].value;
                    if (ngModelName.indexOf(".") != -1) {
                        var objAttributes = ngModelName.split(".");
                        var lastAttribute = objAttributes.pop();
                        var partialObjString = objAttributes.join(".");
                        var partialObj = eval("scope." + partialObjString);

                        partialObj[lastAttribute] = date.replace('/', '-');
                    }
                    else {
                        scope[ngModelName] = date.replace('/', '-');
					}
        			scope.$apply();
	        	}
        	});
        }
    };
})

.directive('fileInput', [function () {
    return {
        scope:{data: "="},//dataという属性に指定した値を、controllerで双方向バインディングさせる
        link: function(scope, element, attrs) {
            element.bind('change', function(){
                scope.$apply(function(){
					if (element[0].files.length > 0) {
						// ファイル選択時の処理
						scope.data.src = element[0].files[0];
					
						var reader = new FileReader();
						reader.readAsDataURL(scope.data.src);
					
						reader.onload = function(e) {
							scope.data.ofile = reader.result;
						}
					} else {
						// キャンセル時の処理
						scope.data.src = "";
					}
                });
            });
        }
    };
}])

.directive('tooltip', function () {
	return function (scope, element, attr) {
		element.tooltip({
			title : attr["tooltip"],
			animation: true,
			placement: 'top'
		});

	};
});

function getStoreSource(app_conf, ApiUrl, ApiService, scope, response, params) {
	scope.storecd = "";

	ApiService.call(scope, ApiUrl.AUTOCOMPLETE_STORE, params, 'POST')
	.then(
		function (response2){
			if (response2.data.code == app_conf.RETURN_CD_SUCCESS) {
				response($.map(response2.data.data, function (obj) {              
					return {
							label: obj.storename,
							value: obj.storename,
							storecd: obj.storecd,
							customername: obj.customername,
							customercd: obj.customercd,
					};
				}));
			} else {
				response(['']);
			}

		},function (error){
			response(['']);
		}
	);
}
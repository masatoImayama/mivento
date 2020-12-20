<html lang="ja" ng-app="App" ng-controller="parentCtrl">
<head>
    <meta charset="utf-8" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="/assets/js/jquery.autocomplete.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/jquery.autocomplete.css">

    <!-- 環境変数 読み込み-->
    <script type="text/javascript" src="/js/common/env.js{{ $cache_suffix }}"></script>
    
    <script type="text/javascript" src="/js/common/functions.js{{ $cache_suffix }}"></script>

    <!-- library読み込み-->
    <script type="text/javascript" src="/js/common/library/ympicker/jquery.ui.ympicker.js"></script>
    <script type="text/javascript" src="/js/common/library/colorbox/jquery.colorbox.js"></script>
    <link rel="stylesheet" type="text/css" href="/js/common/library/colorbox/colorbox.css">
    <script src="https://rawgit.com/jquery/jquery-ui/master/ui/i18n/datepicker-ja.js"></script>
    
    <script type="text/javascript" src="/js/angular/angular.min.js"></script>
    <script type="text/javascript" src="/js/angular/ngStorage.min.js"></script>
    <script type="text/javascript" src="/js/angular/ui-bootstrap-2.5.0.min.js"></script>
    <script type="text/javascript" src="/js/angular/ui-bootstrap-tpls-2.5.0.js"></script>
    <script type="text/javascript" src="/js/angular/ng-sortable.min.js"></script>

    <!-- Module読み込み -->
    <script type="text/javascript" src="/js/common/service/apiModule.js{{ $cache_suffix }}"></script>
    <script type="text/javascript" src="/js/common/service/commonDefinesService.js{{ $cache_suffix }}"></script>
    <script type="text/javascript" src="/js/common/service/logincheckModule.js{{ $cache_suffix }}"></script>
    <script type="text/javascript" src="/js/common/service/partsDirective.js{{ $cache_suffix }}"></script>
    <script type="text/javascript" src="/js/common/service/validation.js{{ $cache_suffix }}"></script>
    <script type="text/javascript" src="/js/common/service/customFilter.js{{ $cache_suffix }}"></script>
    <script type="text/javascript" src="/js/common/service/notification.js{{ $cache_suffix }}"></script>
    <script type="text/javascript" src="/js/common/service/route.js{{ $cache_suffix }}"></script>
    <script type="text/javascript" src="/js/common/service/paging.js{{ $cache_suffix }}"></script>

    <!-- Controller読み込み -->
    <script type="text/javascript" src="/controllers/parent_controller.js{{ $cache_suffix }}"></script>
    <script type="text/javascript" src="/controllers/{{ $directory }}{{ $page_tag }}_controller.js{{ $cache_suffix }}"></script>

    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ $page_title }} | mivento</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/assets/css/themify-icons.css" rel="stylesheet">
    
    <!--  Customize -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <link href="/css/ui-bootstrap-2.5.0-csp.css" rel="stylesheet"/>

    <style>
    @yield('css')
    </style>

    <style>
    </style>
    

</head>
<body ng-controller="{{ $page_tag }}Ctrl" ng-keydown="keydownProc($event)">
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-wrapper">
                <ul class="nav">
                </ul>   
            </div>
        </div>
    
        <div class="main-panel" id="main-panel">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid" style="background-color:@{{menu_bar_bgcolor}}">
                    <div class="navbar-header mr10">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navgation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        <a href="/" class="navbar-brand">PANDA</a>
                    </div><!-- /.navbar-header -->
                    <div class="collapse navbar-collapse">
                       <ul class="nav navbar-nav navbar-left">
                            <li class="ml-4">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-truck"></i>
                                    <p class="ml-1">出荷・配荷</p>
                                </a>
                                <ul class="dropdown-menu dropdown-list-menu">
                                    <li>                              
                                        <div class="dropdown-element">
                                            <h5 class="m-0 cursor-normal" ng-show="privilege.displaySalesMenu()">依頼（営業）</h5>                                            
                                            <a href="@{{route.ROUTE_SHEET_LIST}}" ng-show="privilege.canDisplay(route.ROUTE_SHEET_LIST)" class="dropdown-item">配荷表入力</a>
                                            <a href="@{{route.ROUTE_FLOT_INPUT}}" ng-show="privilege.canDisplay(route.ROUTE_FLOT_INPUT)" class="dropdown-item">初回＠送信</a>
                                            <a href="@{{route.ROUTE_FLOT_LIST}}" ng-show="privilege.canDisplay(route.ROUTE_FLOT_LIST)" class="dropdown-item">初回＠送信一覧</a>
                                            <a href="@{{route.ROUTE_SHIPMENT_INPUT}}" ng-show="privilege.canDisplay(route.ROUTE_SHIPMENT_INPUT)" class="dropdown-item">出荷@/直接入力</a>
                                            <a href="@{{route.ROUTE_SHIPMENT_UPLOAD}}" ng-show="privilege.canDisplay(route.ROUTE_SHIPMENT_UPLOAD)" class="dropdown-item">出荷@/ファイルUPLOAD</a>
                                            <a href="@{{route.ROUTE_SHIPMENT_LIST}}" ng-show="privilege.canDisplay(route.ROUTE_SHIPMENT_LIST)" class="dropdown-item">出荷@依頼一覧</a>
                                            <a href="@{{route.ROUTE_MASTER_CUSTOMER_UNIT_PRICE}}" ng-show="privilege.canDisplay(route.ROUTE_MASTER_CUSTOMER_UNIT_PRICE)" class="dropdown-item">得意先単価照会</a>
                                        </div><!--/.dropdown-element -->
                                        <div class="dropdown-element">
                                            <h5 class="m-0 cursor-normal" ng-show="privilege.displayShipmentMenu()">集計（物流）</h5>                                            
                                            <a href="@{{route.ROUTE_SHIPMENT_LOGISTICS_TOP}}" ng-show="privilege.canDisplay(route.ROUTE_SHIPMENT_LOGISTICS_TOP)" class="dropdown-item">物流TOP</a>
                                            <a href="@{{route.ROUTE_FLOT_ALLOC}}" ng-show="privilege.canDisplay(route.ROUTE_FLOT_ALLOC)" class="dropdown-item">初回＠の振分け</a>
                                            <a href="@{{route.ROUTE_SHIPMENT_LIST_INPUT}}" ng-show="privilege.canDisplay(route.ROUTE_SHIPMENT_LIST_INPUT)" class="dropdown-item">出荷@依頼一覧</a>
                                        </div><!--/.dropdown-element -->
                                        <div class="dropdown-element">
                                             <h5 ng-show="privilege.canDisplay(route.ROUTE_MASTER_SHEET_LIST)" class="m-0 cursor-normal">配荷表登録</h5> 
                                             <a href="@{{route.ROUTE_MASTER_SHEET_LIST}}" ng-show="privilege.canDisplay(route.ROUTE_MASTER_SHEET_LIST)" class="dropdown-item">配荷表登録</a>
                                        </div><!--/.dropdown-element -->          
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-user"></i>
                                    <p>@{{$storage.user.chargename}}</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="button-container p-3 text-nobreak">
                                        PANDA - experience - ver.0.0.1.01<br>
                                        <span id="watch">@{{today | date : 'yyyy年MM月dd日（EEE）'}}</span><br>
                                        @{{$storage.user.chargename}}
                                    </li>
                                    <hr class="m-0">
                                    <li class="button-container">
                                        <a class="p-3" href="/logout">ログアウト</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.navbar-fluid -->

                <div class="col-xs-12" ng-show="dev_env_message != ''" style="background-color:red;font-weight:bold;color:white;">
                    <p>@{{dev_env_message}}</p>
                </div>
            </nav>

            <div id="overlay" ng-show="loading"></div>
            <div style="float:left; position:fixed; top:50%; left:45%;z-index:100;" ng-show="loading">
                <img src="/assets/img/loading_l.gif" alt="loading...">
            </div>

@yield('content')

            <footer class="footer pl-0 pr-0">
                <div ng-show="$root.sys_error">
                    <p class="error_txt">@{{$root.sys_error}}</p>
                </div>
                <div class="container-fluid">
                    <div class="copyright pull-right">
                        Copyright NatureLab. Co., Ltd. All right Reserved.
                    </div>
                </div>
            </footer>
        </div><!-- /.main-panel -->
    </div><!-- ./wrapper -->

    <!-- ローディングモーダルの中身 -->
    <script type="text/ng-template" id="loader.html">
		<div class="modal-header">
			<h3>処理中...</h3>
		</div>
		<div class="modal-body" id="modal-body" style="text-align:center">
			<p><img src="/assets/img/loading_l.gif" alt="loading..."></p>
            <p>@{{loading_text}}</p>
		</div>
    </script>

    @yield('modal')
</body>
<!--   Core JS Files   -->
<script src="/assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
		
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Forms Validations Plugin -->
<script src="/assets/js/jquery.validate.min.js"></script>

<!-- Sliders Plugin -->
<script src="/assets/js/nouislider.min.js"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="/assets/js/es6-promise-auto.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="/assets/js/moment.min.js"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="/assets/js/bootstrap-datetimepicker.js"></script>

<!--  Select Picker Plugin -->
<script src="/assets/js/bootstrap-selectpicker.js"></script>

<!--  Switch and Tags Input Plugins -->
<script src="/assets/js/bootstrap-switch-tags.js"></script>

<!-- Circle Percentage-chart -->
<script src="/assets/js/jquery.easypiechart.min.js"></script>

<!--  Charts Plugin -->
<script src="/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="/assets/js/bootstrap-notify.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="/assets/js/sweetalert2.js"></script>

<!-- Vector Map plugin -->
<script src="/assets/js/jquery-jvectormap.js"></script>

<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Wizard Plugin    -->
<script src="/assets/js/jquery.bootstrap.wizard.min.js"></script>

<!--  Bootstrap Table Plugin    -->
<script src="/assets/js/bootstrap-table.js"></script>

<!--  Plugin for DataTables.net  -->
<script src="/assets/js/jquery.datatables.js"></script>

{{-- <!--  Full Calendar Plugin    -->
<script src="/assets/js/fullcalendar.min.js"></script> --}}

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="/assets/js/paper-dashboard.js"></script>
    
<script>
    var message = '';
    var message_color = '';

    // ヘッダーメニューの位置を補正
    var defaultOffset = new Array();
    var defaultWidth = new Array();

    /* // ブランド検索のデータ保持
    var id_brand_val = null;
    var brandname_val = null; */

    $(function() {
        
        ResetPosition();
        $('body').animate({opacity: 1});
        
        $(window).resize(function() {
            ResetPosition();
        });   
    });
    
    // 位置設定関数
    function ResetPosition() {
        $('style:last').text('');

        var windowW = $(window).width();
        var styleText = '';
        $('ul.dropdown-list-menu').each(function(i, ele) {
            var position_diff = (defaultOffset[i] + defaultWidth[i] + 30) - windowW; 
            if (position_diff > 0) {
                $(this).css('margin-left', '-' + position_diff + 'px');
                styleText = styleText + '@media (min-width: 992px) { .navbar-nav.navbar-left > li:nth-child(' + (i+1) + ') > .dropdown-list-menu:before {left:' + (position_diff + 12) + 'px !important;} .navbar-nav.navbar-left > li:nth-child(' + (i+1) + ') > .dropdown-list-menu:after {left:' + (position_diff + 12) + 'px !important;}}';
            }
        });
        
        $('style:last').text(styleText);
    }

</script>
</html>

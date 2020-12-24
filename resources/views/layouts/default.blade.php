<html lang="ja" ng-app="App" ng-controller="parentCtrl">
<head>
    <meta charset="utf-8" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="/assets/js/jquery.autocomplete.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/jquery.autocomplete.css">

    <!-- 環境変数 読み込み-->
    <script type="text/javascript" src="/js/common/env.js"></script>
    
    <script type="text/javascript" src="/js/common/functions.js"></script>

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
    <script type="text/javascript" src="/js/common/service/apiModule.js"></script>
    <script type="text/javascript" src="/js/common/service/commonDefinesService.js"></script>
    <script type="text/javascript" src="/js/common/service/logincheckModule.js"></script>
    <script type="text/javascript" src="/js/common/service/partsDirective.js"></script>
    <script type="text/javascript" src="/js/common/service/validation.js"></script>
    <script type="text/javascript" src="/js/common/service/customFilter.js"></script>
    <script type="text/javascript" src="/js/common/service/notification.js"></script>
    <script type="text/javascript" src="/js/common/service/route.js"></script>
    <script type="text/javascript" src="/js/common/service/paging.js"></script>

    <!-- Controller読み込み -->
    <script type="text/javascript" src="/controllers/parent_controller.js"></script>
    <script type="text/javascript" src="/controllers/{{ $directory }}{{ $page_tag }}_controller.js"></script>

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
            

@yield('content')

            <footer class="footer pl-0 pr-0">
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

<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

</html>

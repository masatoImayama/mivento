<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/front/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="/front/assets/img/favicon.png">	
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>mivento</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	
    <link href="/front/bootstrap3/css/bootstrap.css" rel="stylesheet" />
	<link href="/front/assets/css/gsdk.css" rel="stylesheet" />  
    <link href="/front/assets/css/demo.css" rel="stylesheet" /> 
    
    <!--     Font Awesome     -->
    <link href="/front/bootstrap3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="navbar-full">
    <div class="container">
        <nav class="navbar navbar-ct-blue navbar-fixed-top navbar-transparent" role="navigation">
          
          <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo-container">
                    <div class="logo">
                        <img src="/front/assets/img/apple-icon.png">
                    </div>
                    <div class="brand">
                        Mivento
                    </div>
                </div>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Donate</a></li>
               </ul>
              
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

    </div><!--  end container-->
    
    <div class='blurred-container'>
        <div class="motto">
            <div>イベント名イベント名イベント名</div>
        </div>
        <div class="img-src" style="background-image: url('/front/assets/img/cover_4.jpg')"></div>
        <div class='img-src blur' style="background-image: url('/front/assets/img/cover_4_blur.jpg')"></div>
    </div>
    
</div>     
    


<div class="main">
    <div class="container tim-container">
        
        <div class="row">
            <div class="tim-typo">
                <h4><span class="tim-note">開始日時</span>2021年10月01日 11:11</h4>
            </div>
            <div class="tim-typo">
                <h4><span class="tim-note">終了日時</span>2021年10月02日 11:11</h4>
            </div>
            <div class="tim-typo">
                <p><span class="tim-note">詳細</span>何か楽しめのイベントです。みんな集まります。飲んだり食べたり踊ったり。とにかく楽しいイベントです。何か楽しめのイベントです。みんな集まります。飲んだり食べたり踊ったり。とにかく楽しいイベントです。</p>
            </div>
        </div>
        <!--   end typography -->

        <div id="entries-table" class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>順位</th>
                        <th>名前</th>
                        <th>惑星</th>
                        <th>勝点</th>
                        <th>試合数</th>
                        <th>勝数</th>
                        <th>引分数</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>ブルーＳＣ</td>
                        <td>地球</td>
                        <td>101</td>
                        <td>42</td>
                        <td>31</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>ＦＣウェヌス</td>
                        <td>金星</td>
                        <td>83</td>
                        <td>42</td>
                        <td>24</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>ジュピターＦＣ</td>
                        <td>木星</td>
                        <td>68</td>
                        <td>42</td>
                        <td>18</td>
                        <td>14</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>ＳＣマーキュリー</td>
                        <td>水星</td>
                        <td>67</td>
                        <td>42</td>
                        <td>18</td>
                        <td>13</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>ＦＣマルス</td>
                        <td>火星</td>
                        <td>65</td>
                        <td>42</td>
                        <td>18</td>
                        <td>11</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="button">
                <div class="row tim-row" id="display-buttons" data-class="btn-info">
                    <div class="col-md-1">
                    </div>

                    <div class="col-md-10">
                        <button href="#fakelink" class="btn btn-block btn-lg btn-info btn-fill">参加入力する</button>
                    </div>

                    <div class="col-md-1">
                    </div>
                </div> <!-- end row -->
        </div>

        <div class="space"></div>

        {{-- <div id="acordeon">

            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-target="#collapseOne" href="#collapseOne" data-toggle="gsdk-collapse">
                      GSDK Collapsible Item 1
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-target="#collapseTwo" href="#collapseTwo" data-toggle="gsdk-collapse">
                      GSDK Collapsible Item 2
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-target="#collapseThree" href="#collapseTwo" data-toggle="gsdk-collapse">
                      GSDK Collapsible Item 3
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapseFour">
                      Default Collapsible Item 1
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapseFive">
                      Default Collapsible Item 2
                    </a>
                  </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
            </div>

        </div><!--  end acordeon --> --}}
    </div>
</div>

<div id="carousel">
    <!--
            IMPORTANT - This carousel can have a special class for a smooth transition "gsdk-transition". Since javascript cannot be overwritten, if you want to use it, you can use the bootstrap.js or bootstrap.min.js from the GSDKit or you can open your bootstrap.js file, search for "emulateTransitionEnd(600)" and change it with "emulateTransitionEnd(1200)"

    -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="/front/assets/img/carousel_blue.png" alt="Awesome Image">
        </div>
        <div class="item">
          <img src="/front/assets/img/carousel_green.png" alt="Awesome Image">
        </div>
        <div class="item">
          <img src="/front/assets/img/carousel_red.png" alt="Awesome Image">
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="fa fa-angle-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="fa fa-angle-right"></span>
      </a>
    </div>
</div> <!-- end carousel -->



</body>

    <script src="/front/jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="/front/assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

	<script src="/front/bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="/front/assets/js/gsdk-checkbox.js"></script>
	<script src="/front/assets/js/gsdk-radio.js"></script>
	<script src="/front/assets/js/gsdk-bootstrapswitch.js"></script>
	<script src="/front/assets/js/get-shit-done.js"></script>
    <script src="/front/assets/js/custom.js"></script>

<script type="text/javascript">
         
    $('.btn-tooltip').tooltip();
    $('.label-tooltip').tooltip();
    $('.pick-class-label').click(function(){
        var new_class = $(this).attr('new-class');  
        var old_class = $('#display-buttons').attr('data-class');
        var display_div = $('#display-buttons');
        if(display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
        }
    });
    $( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
	});
	$( "#slider-default" ).slider({
			value: 70,
			orientation: "horizontal",
			range: "min",
			animate: true
	});
	$('.carousel').carousel({
      interval: 4000
    });
      
    
</script>
</html>
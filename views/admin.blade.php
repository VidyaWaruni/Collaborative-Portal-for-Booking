<!DOCTYPE html>
<html lang="en">
<head>
    <title>DASHBOARD</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css"/>
    <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
    <script src="jquery/jquery-3.2.1.min.js"></script>
    <script src="{{ URL::asset('js/preloader.js') }}"></script>

    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
                [{b:0,d:600,y:-290,e:{y:27}}],
                [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:125.00,t:-125.00}},{b:11000,d:500,c:{x:-125.00,t:125.00}}],
                [{b:0,d:600,x:535,e:{x:27}}],
                [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
                [{b:-1,d:1,c:{x:250.0,t:-250.0}},{b:0,d:800,c:{x:-250.0,t:250.0},e:{c:{x:7,t:7}}}],
                [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
                [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
                [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
                [{b:2000,d:600,rY:30}],
                [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
                [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];

            var jssor_1_options = {
                $AutoPlay: 1,
                $Idle: 2000,
                $CaptionSliderOptions: {
                    $Class: $JssorCaptionSlideo$,
                    $Transitions: jssor_1_SlideoTransitions,
                    $Breaks: [
                        [{d:2000,b:1000}]
                    ]
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 2500;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 20);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>

    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 052 css*/
        .jssorb052 .i {position:absolute;cursor:pointer;}
        .jssorb052 .i .b {fill:#000;fill-opacity:0.3;}
        .jssorb052 .i:hover .b {fill-opacity:.7;}
        .jssorb052 .iav .b {fill-opacity: 1;}
        .jssorb052 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 053 css*/
        .jssora053 {display:block;position:absolute;cursor:pointer;}
        .jssora053 .a {fill:none;stroke:#fff;stroke-width:640;stroke-miterlimit:10;}
        .jssora053:hover {opacity:.8;}
        .jssora053.jssora053dn {opacity:.5;}
        .jssora053.jssora053ds {opacity:.3;pointer-events:none;}
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: midnightblue;
        }
        body{
            max-width:1600px;
            margin-right:0px;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        body {
   background-image: url("img/back.3.png");
}

        li a:hover:not(.active) {
            background-color:  #1A4A8D;
            text-decoration: none;
        }

        .correction:hover:not(.active) {
            background-color:  midnightblue;
            text-decoration: none;
        }

        .preloader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(gif/giphy.gif) center no-repeat #fff;
            background-color: white;
        }
    .container{
        margin-left:250px;
        width:100%;
    }
    h2{
        margin-top:80px;
        margin-left:-250px;
        margin-bottom:20px;
        color:#999999;
    }
    </style>
    <body>
<nav class="navbar navbar-s1 navbar-side" role="navigation" style="position:fixed;width:100%">
<div class="navbar-header">
<a class="navbar-brand" href=""><span>VOLAR | BOOKING SITE</span></a>
</div>
  
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul id="side" class="nav navbar-nav side-nav">
<li class="side-user">
<p class="welcome">Logged in as</p>
  <p class="name">{{Auth::user()->name}}</p>
  <h4>( ADMIN )</h4>  </li>
  <li><a href="#dash">&#8962; Dashboard</a></li>
  <li><a href="/admin#reserve">&#9745; Reservation History</a></li>
  <li class="panel">
  <a class="accordion-toggle" data-target="#extension" data-toggle="collapse" data-parent="#side">&#12868; Banquet Inqueries @if( \App\Inquery::where(['status' => 'pending'])->get()->count() )<span class="badge badge-secondary">New</span>@endif </a>
  <ul id="extension" class="collapse nav">
  <li><a class="sublink" href="/admin#inq">&#9734; Inquries</a></li>
  <li><a class="sublink" href="/admin#banq">&#xa7; Banquet Inquery History</a></li>
</ul></li>
<li class="panel">
  <a class="accordion-toggle" data-target="#sale" data-toggle="collapse" data-parent="#side">&#128172; Comments</a>
  <ul id="sale" class="collapse nav">
  <li><a class="sublink" href="/admin#com">&#128172; See Comments</a></li>
  <li><a class="sublink" href="/posts">&#x2709; Go to Blog</a></li>
</ul> </li>
  <li class="panel">
  <a class="accordion-toggle" data-target="#catalog" data-toggle="collapse" data-parent="#side">&#x58D; Catalog</a>
  <ul id="catalog" class="collapse nav">
  <li><a class="sublink" href="#hot">&#127978; Hotels</a></li>
  <li><a class="sublink" href="#res">&#127979; Resturents</a></li>
  <li><a class="sublink" href="#apa">&#127969; Apartments and Houses</a></li>
  <li><a class="sublink" href="#ban">&#127970; Banquets</a></li>
  <li><a class="sublink" href="#mee">&#127961; Meeting Halls</a></li>
  <li class="panel">
  <ul id="affliate" class="collapse nav">
  <li><a class="sublink" href="">Categories</a></li>
  <li><a class="sublink" href="">Products</a></li></ul></li></ul></li>
  
  <li class="panel">
  <a class="accordion-toggle" data-target="#system" data-toggle="collapse" data-parent="#side">&#128100; Users </a>
  <ul id="system" class="collapse nav">
  <li><a class="sublink" href="#cus">&#128102; Customers</a></li>
  <li><a class="sublink"  href="#pro">&#129492; Property Owners</a></li>
  <li class="panel">
</li></ul></li>
  
<li class="panel">
  <a class="accordion-toggle" href="#containe14">&#128447; My Profile</a>
</ul>
  <div class="con" style="color: #e6e6d8;float:right">
  <br>
  @if(Auth::user())
    <a href="{{route('logout')}}" style="color: white;font-size: 15px">LOGOUT</a>
                @endif
</nav>

<div id="dash" class="container">
    @include('inc.admincatalog')
</div>
<div id="inq" class="container">
    @include('inc.banquetInquery')
</div>
<div id="com" class="container">
    @include('inc.commentDetail')
</div>
<div id="conn" class="container">
    @include('inc.reservations')
</div>
<div id="container2" class="container">
    @include('inc.searchprop')
</div>

<div id="containe13" class="container">
    @include('inc.usershow')
</div>
<div id="containe14" class="container">
    @include('inc.adminprofile')
</div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

  </body>
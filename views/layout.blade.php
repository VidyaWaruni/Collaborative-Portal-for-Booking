<!DOCTYPE html>
<html lang="en">
<head>
    <title>Volar | Booking Site</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/master.css">
    <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ URL::asset('js/add_property_ajax.js') }}"></script>


    <script src="jquery/jquery-3.2.1.min.js"></script>
    <script src="{{ URL::asset('js/preloader.js') }}"></script>





    <script>
        $("#myModal").modal();
        $("#myModal2").modal();

        function myFunction() {
            var x = document.getElementById("password");
            var y = document.getElementById("con_password");
            var z = document.getElementById("ow_password");
            var p = document.getElementById("ow_con_password");
            if (x.type === "password" || y.type === "password" || z.type === "password" || p.type === "password") {
                x.type = "text";
                y.type = "text";
                z.type = "text";
                p.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
                z.type = "password";
                p.type = "password";
            }
        }

    </script>



    {{--end script for the show password--}}


    {{--start script for modal's tabs in login and signup--}}

    <script>
        $(function () {
            $('#myTab li:first-child a').tab('show')
        })
    </script>

    {{--end script for modal's tabs in login and signup--}}


    {{--start script for slider--}}

    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
                {$Duration:800,$Opacity:2}
            ];

            var jssor_1_options = {
                $AutoPlay: 1,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
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

            var MAX_WIDTH = 1400;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>

    {{--end script for slider--}}

    {{--start style for slider--}}

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

        /*jssor slider bullet skin 051 css*/
        .jssorb051 .i {position:absolute;cursor:pointer;}
        .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;}
        .jssorb051 .i:hover .b {fill-opacity:.7;}
        .jssorb051 .iav .b {fill-opacity: 1;}
        .jssorb051 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>

    <style>
        .btn:focus, .btn:active, button:focus, button:active {
            outline: none !important;
            box-shadow: none !important;
        }

        #image-gallery .modal-footer{
            display: block;
        }

        .thumb{
            margin-top: 15px;
            margin-bottom: 15px;
        }
    </style>

    {{--end style for slider--}}


    {{--start script for our gallary--}}

    <script>
        let modalId = $('#image-gallery');

        $(document)
            .ready(function () {

                loadGallery(true, 'a.thumbnail');

                //This function disables buttons when needed
                function disableButtons(counter_max, counter_current) {
                    $('#show-previous-image, #show-next-image')
                        .show();
                    if (counter_max === counter_current) {
                        $('#show-next-image')
                            .hide();
                    } else if (counter_current === 1) {
                        $('#show-previous-image')
                            .hide();
                    }
                }

                /**
                 *
                 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
                 * @param setClickAttr  Sets the attribute for the click handler.
                 */

                function loadGallery(setIDs, setClickAttr) {
                    let current_image,
                        selector,
                        counter = 0;

                    $('#show-next-image, #show-previous-image')
                        .click(function () {
                            if ($(this)
                                .attr('id') === 'show-previous-image') {
                                current_image--;
                            } else {
                                current_image++;
                            }

                            selector = $('[data-image-id="' + current_image + '"]');
                            updateGallery(selector);
                        });

                    function updateGallery(selector) {
                        let $sel = selector;
                        current_image = $sel.data('image-id');
                        $('#image-gallery-title')
                            .text($sel.data('title'));
                        $('#image-gallery-image')
                            .attr('src', $sel.data('image'));
                        disableButtons(counter, $sel.data('image-id'));
                    }

                    if (setIDs == true) {
                        $('[data-image-id]')
                            .each(function () {
                                counter++;
                                $(this)
                                    .attr('data-image-id', counter);
                            });
                    }
                    $(setClickAttr)
                        .on('click', function () {
                            updateGallery($(this));
                        });
                }
            });

        // build key actions
        $(document)
            .keydown(function (e) {
                switch (e.which) {
                    case 37: // left
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                            $('#show-previous-image')
                                .click();
                        }
                        break;

                    case 39: // right
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                            $('#show-next-image')
                                .click();
                        }
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.preventDefault(); // prevent the default action (scroll / move caret)
            });

    </script>

    {{--end script for our gallary--}}







    {{--start styles for zoom picture and text on hover--}}

    <style>
        .img-thumbnail:hover {
            -ms-transform: scale(1.1); /* IE 9 */
            -webkit-transform: scale(1.1); /* Safari 3-8 */
            transform: scale(1.1);
        }

        .preventZoom:hover{
            -ms-transform: scale(1.0); /* IE 9 */
            -webkit-transform: scale(1.0); /* Safari 3-8 */
            transform: scale(1.0);
        }

        .text-thumbnail:hover {
            -ms-transform: scale(1.1); /* IE 9 */
            -webkit-transform: scale(1.1); /* Safari 3-8 */
            transform: scale(1.1);
            font-weight: bold;
        }
        .button-thumbnail:hover {
            -ms-transform: scale(1.1); /* IE 9 */
            -webkit-transform: scale(1.1); /* Safari 3-8 */
            transform: scale(1.1);

            color: #191970;
            font-weight: bold;
        }

    </style>




    <style>
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
        .alert {
            padding: 20px;
            background-color:#d6dbf2 ;
            color: black;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }

    </style>

    <style>

        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #F3F9FE;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 200px;
            height: 200px;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 60%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;

        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;

        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }
        .alert-danger{
            height:25px;
            margin-bottom:0px;
            padding-bottom:0px;
        }
        .alert-success{
            height:25px;
            margin-bottom:0px;
            padding-bottom:0px;
        }
        .con{
            margin-top:0px;
        }
    </style>


</head>
<body style="background-color: #F3F9FE">
<div class="preloader"></div>
{{--start of nav bar--}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dar " style="background-color: #191970;">
    <a style="color: white" class="navbar-brand text-thumbnail" href="#"><b>VOLOR | CELLS OF A GENIUS</b></a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<nav class="navbar navbar-expand-lg " style="background-color: #191970;">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                @if(isset($tab)) @if($tab == 'home')<span class="badge  badge-info" style="background-color: darkblue"> @endif @endif <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('home')}}">HOME <span class="sr-only">(current)</span></a>@if(isset($tab)) @if($tab == 'home')</span> @endif @endif
            </li>
            <li class="nav-item">
                @if($tab == 'aboutus')<span class="badge  badge-info" style="background-color: darkblue"> @endif <a style="font-size: 12px;color: white;" class="nav-link text-thumbnail" href="{{route('aboutus')}}">ABOUT US</a>@if($tab == 'aboutus')</span> @endif
            </li>
            <li class="nav-item">
                @if($tab == 'contact')<span class="badge  badge-info" style="background-color: darkblue"> @endif <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('contact')}}">CONTACT</a>@if($tab == 'contact')</span> @endif
            </li>
            @if(Auth::user())
            @if(Auth::user()->role == 'customer')
            <li class="nav-item">
                @if($tab == 'hotels')<span class="badge  badge-info" style="background-color: darkblue"> @endif  <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('hotels')}}">HOTELS</a>@if($tab == 'hotels')</span> @endif
            </li>
            <li class="nav-item">
                @if($tab == 'apartmentsandhouses')<span class="badge  badge-info" style="background-color: darkblue"> @endif <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('apartmentsandhouses')}}">APARTMENTS AND HOUSES</a>@if($tab == 'apartmentsandhouses')</span> @endif
            </li>
            <li class="nav-item">
                @if($tab == 'restuarents')<span class="badge  badge-info" style="background-color: darkblue"> @endif <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('restuarents')}}">RESTURENTS</a>@if($tab == 'restuarents')</span> @endif
            </li>
            <li class="nav-item">
                @if($tab == 'banquets')<span class="badge  badge-info" style="background-color: darkblue"> @endif <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('banquets')}}">BANQUETS</a>@if($tab == 'banquets')</span> @endif
            </li>
            <li class="nav-item">
                @if($tab == 'meetinghalls')<span class="badge  badge-info" style="background-color: darkblue"> @endif <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('meetinghalls')}}">MEETING HALL</a>@if($tab == 'meetinghalls')</span> @endif
            </li>
            @endif
            @endif
            <li class="nav-item">
                @if($tab == 'blog')<span class="badge  badge-info" style="background-color: darkblue"> @endif <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="/posts">BLOG</a>@if($tab == 'blog')</span> @endif
            </li>


            @if(Auth::user())
                @if(Auth::user()->role == 'owner')
                    <li class="nav-item dropdown">
                        <a style="font-size: 12px;color: white" class="nav-link dropdown-toggle text-thumbnail" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            PROPERTY DETAILS
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink" style="width: 650px">

                            <div class="media" style="padding-left: 60px;margin-top: 40px;">
                                <a href="{{route('add_hotel')}}" style="text-decoration: none;color: #191970">
                                <div class="img-thumbnail custom-control-inline" style="cursor: pointer">
                                <img class="mr-3" src="icons/hotel.png">
                                <div class="media-body"  style="margin-top: 17px;padding-right: 70px">
                                    <h5 class="mt-0" style="font-size: 12px"><b>ADD NEW HOTEL</b></h5>
                                </div>
                                </div>
                                </a>

                                <a href="{{route('add_apartment')}}" style="text-decoration: none;color: #191970">
                                <div class="img-thumbnail custom-control-inline" style="cursor: pointer;margin-left: 30px">
                                    <img class="mr-3" src="icons/apartment.png">
                                    <div class="media-body"  style="margin-top: 17px;padding-right: 20px">
                                        <h5 class="mt-0" style="font-size: 12px"><b>ADD NEW APARTMENT</b></h5>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="media" style="padding-left: 60px;margin-top: 20px;">
                                <a href="{{route('add_restaurant')}}" style="text-decoration: none;color: #191970">
                                <div class="img-thumbnail custom-control-inline" style="cursor: pointer">
                                    <img class="mr-3" src="icons/restaurant.png">
                                    <div class="media-body"  style="margin-top: 17px;padding-right: 30px">
                                        <h5 class="mt-0" style="font-size: 12px"><b>ADD NEW RESTAURANT</b></h5>
                                    </div>
                                </div>
                                </a>

                                <a href="{{route('add_banquet')}}" style="text-decoration: none;color: #191970">
                                <div class="img-thumbnail custom-control-inline" style="cursor: pointer;margin-left: 30px">
                                    <img class="mr-3" src="icons/banquet.png">
                                    <div class="media-body"  style="margin-top: 17px;padding-right: 35px">
                                        <h5 class="mt-0" style="font-size: 12px"><b>ADD NEW BANQUET</b></h5>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="media" style="padding-left: 60px;margin-top: 20px;margin-bottom: 40px">

                                <a href="{{route('add_meetinghall')}}" style="text-decoration: none;color: #191970">
                                <div class="img-thumbnail custom-control-inline" style="cursor: pointer">
                                    <img class="mr-3" src="icons/meeting.png">
                                    <div class="media-body"  style="margin-top: 17px;padding-right: 20px">
                                        <h5 class="mt-0" style="font-size: 12px"><b>ADD NEW MEETING HALL</b></h5>
                                    </div>
                                </div>
                                </a>

                                <a href="#" style="text-decoration: none;color: #191970">
                                <div class="img-thumbnail custom-control-inline" style="cursor: pointer;margin-left: 30px">
                                    <img class="mr-3" src="icons/view.png">
                                    <div class="media-body"  style="margin-top: 17px;padding-right: 25px">
                                        <h5 class="mt-0" style="font-size: 12px"><b>VIEW ALL PROPERTIES</b></h5>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </li>
                @endif
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">

            @if(Auth::user())
                <li class="nav-item dropdown ">
                    <a style="font-size: 12px;color: white;text-transform: uppercase;" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img style="border-radius: 50%;width: 30px;height: 30px;margin-right: 10px"  src="uploads/{{Auth::user()->avatar}}" alt=""/>
                        <b>{{Auth::user()->name}}</b>
                    </a>
                    @if((Auth::user()->role == 'owner') OR (Auth::user()->role == 'customer'))
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a style="font-size:11px;color: #191970"  class="dropdown-item" href="{{route('profile')}}"><img class="mr-3" src="icons/view_profile.png" width="25px" height="25px"><b>VIEW PROFILE</b></a>
                        <div class="dropdown-divider"></div>
                        <a style="font-size:11px;color: #191970"  class="dropdown-item" href="{{route('edit_profile')}}"><img class="mr-3" src="icons/edit.png" width="25px" height="25px"><b>EDIT PROFILE</b></a>
                        <div class="dropdown-divider"></div>
                        <a style="font-size:11px;color: #191970"  class="dropdown-item" href="{{route('logout')}}"><img class="mr-3" src="icons/logout.png" width="25px" height="25px"><b>LOGOUT</b></a>
                    </div>
                    @endif
                </li>
            @else
                <li class="nav-item">
                    <a style="font-size: 12px;color: white" data-toggle="modal" data-target="#myModal2" class="nav-link text-thumbnail" href="#">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a style="font-size: 12px;color: white" data-toggle="modal" data-target="#myModal" class="nav-link text-thumbnail" href="#">REGISTER</a>
                </li>
            @endif
        </ul>
    </div>
</nav>

{{--end of nav bar--}}
@if (\Session::has('success'))
    <div>
        <ul class="alert-success">
            {!! \Session::get('success') !!}
        </ul>
    </div>
@endif
@if (\Session::has('error'))
    <div>
        <ul class="alert-danger">
           {!! \Session::get('error') !!}
        </ul>
    </div>
@endif
    @if (count($errors) > 0)
                <div class="alert-danger">
                    <strong>Whoops!Try a again</strong> There were some problems with your input. <br><br>
                </div>
            @endif
<div class="con">
    @yield('content')
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="max-width: 450px">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <ul class="nav nav-tabs" id="myTab" role="tablist" >
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color: black;font-size: 12px" >CUSTOMER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="color: black;font-size: 12px" >PROPERTY OWNER</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h6 style="text-align: left;margin-bottom: 30px;margin-top: 20px;font-size: 12px">Register for Your Customer Account</h6>
                            <form action="{{route('cus_register')}}" method="post">
                                <div class="form-group">
                                    <input name="cname" style="font-size: 10px" type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <input name="cemail" style="font-size: 10px" type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <small> {!! $errors->first('cemail', '<p class="help-block" style="color:red;margin-top:-15px;padding:0px">:message</p>') !!}</small>
                                <div class="form-group">
                                    <input name="caddress" style="font-size: 10px" type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">

                                </div>
                                <div class="form-group">
                                    <input name="ccontact" style="font-size: 10px" type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Telephone Number">
                                </div>
                                <small> {!! $errors->first('ccontact', '<p class="help-block" style="color:red;margin-top:-15px;padding:0px">:message</p>') !!}</small>                                
                                <div class="form-group">
                                    <input name="cpassword" style="font-size: 10px" type="password" class="form-control form-control-sm" id="password" placeholder="Password">
                                </div>
                                <small> {!! $errors->first('cpassword', '<p class="help-block" style="color:red;margin-top:-15px;padding:0px">:message</p>') !!}</small>                                
                                <div class="form-group">
                                    <input name="cpass" style="font-size: 10px" type="password" class="form-control form-control-sm" id="con_password" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" onclick="myFunction()"><label style="font-size: 12px">Show Password</label>
                                </div>
                                <button type="submit" class="btn btn-default button-thumbnail">REGISTRATION</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h6 style="text-align: left;margin-bottom: 30px;margin-top: 20px;font-size: 12px">Register for Your Property Owner Account</h6>
                            <form action="{{route('pro_register')}}" method="post">
                                <div class="form-group">

                                    <input name="pname" style="font-size: 10px" type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">

                                </div>
                                <div class="form-group">
                                    <input  name="pemail" style="font-size: 10px" type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                
                                <small> {!! $errors->first('pemail', '<p class="help-block" style="color:red;margin-top:-15px;padding:0px">:message</p>') !!}</small>
                                <div class="form-group">
                                    <input  name="paddress" style="font-size: 10px" type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">

                                </div>
                                <div class="form-group">
                                    <input name="pcontact" style="font-size: 10px" type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Telephone Number">
                                </div>
                                <small> {!! $errors->first('pcontact', '<p class="help-block" style="color:red;margin-top:-15px;padding:0px">:message</p>') !!}</small>                                
                                <div class="form-group">
                                    <input name="ppassword" style="font-size: 10px" type="password" class="form-control form-control-sm" id="ow_password" placeholder="Password">
                                </div>
                                <small> {!! $errors->first('ppassword', '<p class="help-block" style="color:red;margin-top:-15px;padding:0px">:message</p>') !!}</small>                                
                                <div class="form-group">
                                    <input name="ppass" style="font-size: 10px" type="password" class="form-control form-control-sm" id="ow_con_password" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" onclick="myFunction()"><label style="font-size: 12px">Show Password</label>
                                </div>

                                <button type="submit" class="btn btn-default button-thumbnail">REGISTRATION</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



{{--modal for login--}}

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="max-width: 450px">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p style="font-size: 16px">LOGIN</p>
                <div class="tab-content">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h6 style="text-align: left;margin-bottom: 30px;margin-top: 20px;font-size: 12px">Welcome! Login in to Your Accont</h6>
                            <form action="{{route('login')}}" method="post">
                                <div class="form-group">
                                    <input name="email" style="font-size: 10px" type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>

                                </div>
                                <small> {!! $errors->first('email', '<p class="help-block" style="color:red;margin-top:-15px;padding:0px">:message</p>') !!}</small>                                
                                <div class="form-group">
                                    <input name="password" style="font-size: 10px" type="password" class="form-control form-control-sm" id="password" placeholder="Password" required>
                                </div>
                                <small> {!! $errors->first('password', '<p class="help-block" style="color:red;margin-top:-15px;padding:0px">:message</p>') !!}</small>                                
                                <button type="submit" class="btn btn-default button-thumbnail">LOGIN</button>
                                <footer class="autorize-bottom pull-right">
                        <a href="{{route('Email')}}" class="authorize-forget-pass">Forgot your password?</a>
                        <div class="clear"></div>
                    </footer>
                                <p style="text-align: center;margin-top: 20px"><img src="img/logo.gif" alt="logo"></p>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="page-footer font-small blue-grey lighten-5" style="margin-top: 30px">

    <div style="background-color: #191970;color: white">
        <div class="container">

            <!-- Grid row-->
            <div class="row py-4 d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0">Get connected with us on social networks!</h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-lg-7 text-center text-md-right">

                    <!-- Facebook -->
                    <a class="fb-ic">
                        <i class="fa fa-facebook white-text mr-4"> </i>
                    </a>
                    <!-- Twitter -->
                    <a class="tw-ic">
                        <i class="fa fa-twitter white-text mr-4"> </i>
                    </a>
                    <!-- Google +-->
                    <a class="gplus-ic">
                        <i class="fa fa-google-plus white-text mr-4"> </i>
                    </a>
                    <!--Linkedin -->
                    <a class="li-ic">
                        <i class="fa fa-linkedin white-text mr-4"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                        <i class="fa fa-instagram white-text"> </i>
                    </a>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
    </div>
    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3 dark-grey-text">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

                <!-- Content -->
                <h6 class="text-uppercase font-weight-bold">Company name</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>Volar(PVT)LTD<br><br>
                 
                 <B>Branches:</B><br>
                 Colombo<br>
                 Negombo<br>
                 Kandy<br>
                
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Properties</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a class="dark-grey-text" href="http://127.0.0.1:8000/hotels">Hotels</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="http://127.0.0.1:8000/apartmentsandhouses">Apartments and Houses</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="http://127.0.0.1:8000/restuarents">Restuarents</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="http://127.0.0.1:8000/banquets">Banquets</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="http://127.0.0.1:8000/meetinghalls">MeetingHalls </a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a class="dark-grey-text" href="http://127.0.0.1:8000/profile">My Account</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="http://127.0.0.1:8000/contact">Contact</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="http://127.0.0.1:8000/aboutus">Aboutus</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="http://127.0.0.1:8000/posts">Blog</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fa fa-home mr-3"></i> University of moratuwa, Katubedda</p>
                <p>
                    <i class="fa fa-envelope mr-3"></i> info@volor.com</p>
                <p>
                    <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                <p>
                    <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center text-black-50 py-3">© 2018 Copyright:
        <a class="dark-grey-text" href="https://mdbootstrap.com/education/bootstrap/"> Volor.com</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->


<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>

</body>


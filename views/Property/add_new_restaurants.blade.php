<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
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
    <script src="{{ URL::asset('js/preloader.js') }}"></script>
    <style>
        .img-thumbnail:hover {
            -ms-transform: scale(1.1); /* IE 9 */
            -webkit-transform: scale(1.1); /* Safari 3-8 */
            transform: scale(1.1);
        }

        .wall-thumbnail:hover {
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

    {{--start script for the show password--}}

    <script>
        $("#myModal").modal();
        $("#myModal2").modal();
        $("#myModal3").modal();

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
    </style>




    {{--end script for the show password--}}

    {{--start styles for zoom picture and text on hover--}}




</head>
<body style="background: #F3F9FE">
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
                <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('home')}}">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('aboutus')}}">ABOUT US</a>
            </li>
            <li class="nav-item">
                <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('contact')}}">CONTACT</a>
            </li>
            {{--@if(Auth::user())--}}
                {{--<li class="nav-item">--}}
                    {{--<a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('hotels')}}">HOTELS</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('apartmentsandhouses')}}">APARTMENTS AND HOUSES</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('restuarents')}}">RESTURENTS</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('banquets')}}">BANQUETS</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="{{route('meetinghalls')}}">MEETING HALL</a>--}}
                {{--</li>--}}
            {{--@endif--}}
            <li class="nav-item">
                <a style="font-size: 12px;color: white" class="nav-link text-thumbnail" href="/posts">BLOG</a>
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
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a style="font-size:11px;color: #191970"  class="dropdown-item" href="{{route('profile')}}"><img class="mr-3" src="icons/view_profile.png" width="25px" height="25px"><b>VIEW PROFILE</b></a>
                        <div class="dropdown-divider"></div>
                        <a style="font-size:11px;color: #191970"  class="dropdown-item" href="{{route('edit_profile')}}"><img class="mr-3" src="icons/edit.png" width="25px" height="25px"><b>EDIT PROFILE</b></a>
                        <div class="dropdown-divider"></div>
                        <a style="font-size:11px;color: #191970"  class="dropdown-item" href="{{route('logout')}}"><img class="mr-3" src="icons/logout.png" width="25px" height="25px"><b>LOGOUT</b></a>

                    </div>
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

<div class="row" style="margin-right: 0px;margin-bottom: 200px">
    <div class="col-md-4 col-sm-4 col-xs-4" >
        <form action="{{route('post_add_restaurant')}}" method="post" style="padding-left: 30px;padding-top: 40px" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name" style="font-size: 11px" class="label-control">Restaurant Name</label>
                <input  style="font-size: 10px; @if($errors->has('restaurant_name'))border-color: red @endif " type="text" class="form-control form-control-sm " id="restaurant_name" name="restaurant_name" value="{{Request::old('restaurant_name') ?: ''}}"  placeholder="">
                @if($errors->has('restaurant_name'))
                    <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('restaurant_name')}}</span>
                @endif
            </div>
            <div class="form-group ">
                <label for="restaurant_address" style="font-size: 11px">Restaurant Address</label>
                <input  style="font-size: 10px; @if($errors->has('restaurant_address'))border-color: red @endif " type="text" class="form-control form-control-sm" id="restaurant_address" name="restaurant_address" value="{{Request::old('restaurant_address') ?: ''}}" placeholder="" >
                @if($errors->has('restaurant_address'))
                    <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('restaurant_address')}}</span>
                @endif
            </div>
            <div class="form-group ">
                <label for="contact" style="font-size: 11px">Restaurant Contact Number</label>
                <input  style="font-size: 10px; @if($errors->has('restaurant_contact'))border-color: red @endif " type="text" class="form-control form-control-sm" id="restaurant_contact" name="restaurant_contact"  value="{{Request::old('restaurant_contact') ?: ''}}" placeholder="" >
                @if($errors->has('restaurant_contact'))
                    <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('restaurant_contact')}}</span>
                @endif
            </div>
            <div class="form-group ">
                <label for="contact" style="font-size: 11px">Restaurant Function</label>
                <input  style="font-size: 10px; @if($errors->has('restaurant_function'))border-color: red @endif " type="text" class="form-control form-control-sm" id="restaurant_function" name="restaurant_function"  value="{{Request::old('restaurant_function') ?: ''}}" placeholder="" >
                @if($errors->has('restaurant_function'))
                    <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('restaurant_function')}}</span>
                @endif
            </div>
            <div class="form-group ">
                <label for="contact" style="font-size: 11px">Restaurant Capacity</label>
                <input  style="font-size: 10px; @if($errors->has('restaurant_capacity'))border-color: red @endif " type="text" class="form-control form-control-sm" id="restaurant_capacity" name="restaurant_capacity"  value="{{Request::old('restaurant_capacity') ?: ''}}" placeholder="" >
                @if($errors->has('restaurant_capacity'))
                    <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('restaurant_capacity')}}</span>
                @endif
            </div>
            <div class="form-group ">
                <label for="contact" style="font-size: 11px">Restaurant Image</label>
                <input type="file" style="font-size: 10px; @if($errors->has('restaurant_image'))border-color: red @endif "  id="restaurant_image" name="restaurant_image" class="form-control form-control-sm"  value="{{Request::old('restaurant_image') ?: ''}}">
                @if($errors->has('restaurant_image'))
                    <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('restaurant_image')}}</span>
                @endif
            </div>
            <input type="hidden" name="restaurant_category" value="restaurants">
            <button type="submit" class="btn btn-default button-thumbnail" >ADD RESTAURANT</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>


    <div class="col-md-8 col-sm-8 col-xs-8" style="padding-top: 30px;padding-left: 100px;padding-right: 70px">
        @if($count > 3)
            <form action="{{route('search_results',['name'=>'restaurants'])}}" method="get">
                <div class="input-group mb-3" style="width: 60%;margin-left: 160px;margin-top: 40px;padding-bottom: 40px" type="text">
                    <input style="font-size: 11px" type="text" id="search-data"  name="search-data"   class="form-control form-control-sm" placeholder="Search your restaurants by restaurant name or address" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <button style="width: 80px"  class="btn btn-outline-default btn-sm button-thumbnail" type="submit"><i style="color:#191970" class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        @endif

        @if($count == 0)
            <h6 style="color: red;text-align: center;margin-top: 180px">You have no restaurants</h6>
        @endif
        <div class="text-thumbnail" style="margin-left: 300px;margin-bottom: 50px;">{{ $restaurants->links() }}</div>
        @foreach($restaurants as $restaurant)
            <div class="img-thumbnail wall-thumbnail" style="padding-bottom: 18px;padding-left:5px;padding-right:20px;padding-top:1px;margin-top: 10px;">
                <a href="{{route('delete_restaurant',['id'=>$restaurant->id])}}" style="color: firebrick;" ><i style="font-size:17px;margin-top: 10px;color: firebrick;cursor: pointer" class="fa float-right text-thumbnail">&#xf00d;</i></a>
                <div class="media p-3">

                    <img src="uploads/{{$restaurant->image}}" alt="Upload Your Hotel Image " class="mr-3 mt-3 img-thumbnail img-responsive" style="width:350px;height: 200px">



                    <div class="img-thumbnail" style="padding-bottom: 20px;padding-left:20px;padding-right:56px;margin-top: 19px;background-color:#F3F9FE ">
                        <div class="media-body" style="padding-top: 20px">

                            <h4 style="text-transform: uppercase;"><b>{{str_limit($restaurant->restaurant_name, $limit = 15, $end = '...')}}</b></h4>
                            <small style="text-transform: capitalize;">{{$restaurant->restaurant_address}}</small><br/>
                            <small>{{$restaurant->restaurant_contact}}</small><br/>

                            <a href="{{route('set_available',['id'=>$restaurant->id])}}"><button style="margin-top: 36px;font-size: 11px" type="button" class="btn btn-info btn-sm"><b>AVAILABILITY</b></button></a>
                            <a href="{{route('edit_restaurant',['id'=>$restaurant->id])}}"><button style="margin-top: 36px;font-size: 11px" type="button" class="btn btn-dark btn-sm"><b>UPDATE</b></button></a>
                            <a href="{{route('view_gallery',['id'=>$restaurant->id])}}"><button style="margin-top: 36px;font-size: 11px;background-color: #191970;color: white" type="button" class="btn  btn-sm"><b>GALLERY</b></button></a>

                        </div>
                    </div>
                </div>
                <table style="margin-left: 20px">



                    @foreach($availables as $available)
                        @if($available->pro_id == $restaurant->id)
                            <tr>
                                <td><small >Set date to available : </small></td>
                                <td style="padding-left: 20px"><small >{{$available->available_date}}</small></td>
                                <td style="padding-left: 40px"><small >Time From : </small></td>
                                <td style="padding-left: 20px"><small >{{ \Carbon\Carbon::parse($available->time_from)->format('g:i a')}} </small></td>
                                <td style="padding-left: 40px"><small >Time to : </small></td>
                                <td style="padding-left: 20px"><small >{{ \Carbon\Carbon::parse($available->time_to)->format('g:i a')}}</small></td>
                                <td style="padding-left: 40px;" class="text-thumbnail"><small ><a style="color: black;" href="{{route('edit_available',['id'=>$available->id])}}"><b>Edit</b></a></small></td>
                                <td style="padding-left: 40px;" class="text-thumbnail"><small ><a style="color: firebrick;" href="{{route('delete_available',['id'=>$available->id])}}"><i style="font-size:15px;margin-top: 5px;color: firebrick;cursor: pointer" class="fa float-right text-thumbnail">&#xf00d;</i></a></small></td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>

        @endforeach
        <div class="text-thumbnail" style="margin-left: 300px;margin-top: 50px;">{{ $restaurants->links() }}</div>
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
                <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit.</p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Products</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a class="dark-grey-text" href="#!">MDBootstrap</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="#!">MDWordPress</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="#!">BrandFlow</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="#!">Bootstrap Angular</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a class="dark-grey-text" href="#!">Your Account</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="#!">Become an Affiliate</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="#!">Shipping Rates</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="#!">Help</a>
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






</body>

</html>

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


    {{--start script for the show password--}}

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
    <div class="col-md-2 col-sm-2 col-xs-2" >
    </div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
        @if($category == 'hotels')
        @foreach($set_hotels as $set_hotel)
            <div class="img-thumbnail wall-thumbnail" style="padding-bottom: 20px;padding-left:20px;margin-top: 80px;padding-right: 30px">
                <div class="media p-3">

                    <img src="uploads/{{$set_hotel->image}}" alt="Upload Your Hotel Image " class="mr-3 mt-3 img-thumbnail img-responsive" style="width:350px;height: 200px">



                    <div class="img-thumbnail" style="padding-bottom: 85px;padding-left:20px;margin-top: 19px;background-color:#F3F9FE;padding-right: 300px ">
                        <div class="media-body" style="padding-top: 20px">

                            <h4 style="text-transform: capitalize;"><b>{{$set_hotel->hotel_name}}</b></h4>
                            <small style="text-transform: capitalize;"><b>{{$set_hotel->hotel_address}}</b></small><br/>
                            <small><b>{{$set_hotel->hotel_contact}}</b></small><br/>
                        </div>
                    </div>
                </div>
                @foreach($availables_edit as $available_edit)
                <form action="{{route('post_set_edit_hotel',['id'=>$available_edit->id])}}" method="post" style="padding-left: 15px;padding-top: 40px">
                    <div class="form-group" style="width: 48%">
                        <label for="date" style="font-size: 11px" class="label-control">Available date</label>
                        <input style="font-size: 10px; @if($errors->has('date'))border-color: red @endif " type="date" class="form-control form-control-sm " id="date" name="date" value="{{$available_edit->available_date}}">
                        @if($errors->has('date'))
                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('date')}}</span>
                        @endif
                    </div>
                    <div class="form-group" style="width: 48%">
                        <label for="daysingle" style="font-size: 11px" class="label-control">Available Day Time Single Rooms</label>
                        <input type="number"  style="font-size: 10px; @if($errors->has('daysingle'))border-color: red @endif " type="text" class="form-control form-control-sm " id="daysingle" name="daysingle" value="{{$available_edit->daySingle}}">
                        @if($errors->has('daysingle'))
                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('daysingle')}}</span>
                        @endif
                    </div>
                    <div class="form-group" style="width: 48%">
                        <label for="nightsingle" style="font-size: 11px" class="label-control">Available Night Time Single Rooms</label>
                        <input type="number"  style="font-size: 10px; @if($errors->has('nightsingle'))border-color: red @endif " type="text" class="form-control form-control-sm " id="nightsingle" name="nightsingle" value="{{$available_edit->nightSingle}}">
                        @if($errors->has('nightsingle'))
                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('nightsingle')}}</span>
                        @endif
                    </div>
                    <div class="form-group" style="width: 48%">
                        <label for="daydouble" style="font-size: 11px" class="label-control">Available Day Time Double Rooms</label>
                        <input type="number"  style="font-size: 10px; @if($errors->has('daydouble'))border-color: red @endif " type="text" class="form-control form-control-sm " id="daydouble" name="daydouble" value="{{$available_edit->dayDouble}}">
                        @if($errors->has('daydouble'))
                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('daydouble')}}</span>
                        @endif
                    </div>
                    <div class="form-group" style="width: 48%">
                        <label for="nightdouble" style="font-size: 11px" class="label-control">Available Night Time Double Rooms</label>
                        <input type="number"  style="font-size: 10px; @if($errors->has('nightdouble'))border-color: red @endif " type="text" class="form-control form-control-sm " id="nightdouble" name="nightdouble" value="{{$available_edit->nightDouble}}">
                        @if($errors->has('nightdouble'))
                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('nightdouble')}}</span>
                        @endif
                    </div>
                    <div class="form-group" style="width: 48%">
                        <label for="daysuite" style="font-size: 11px" class="label-control">Available Day Time Suite Rooms</label>
                        <input type="number"  style="font-size: 10px; @if($errors->has('daysuite'))border-color: red @endif " type="text" class="form-control form-control-sm " id="daysuite" name="daysuite" value="{{$available_edit->daySuite}}">
                        @if($errors->has('daysuite'))
                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('daysuite')}}</span>
                        @endif
                    </div>
                    <div class="form-group" style="width: 48%">
                        <label for="nightsuite" style="font-size: 11px" class="label-control">Available Night Time Suite Rooms</label>
                        <input type="number"  style="font-size: 10px; @if($errors->has('nightsuite'))border-color: red @endif " type="text" class="form-control form-control-sm " id="nightsuite" name="nightsuite" value="{{$available_edit->nightSuite}}">
                        @if($errors->has('nightsuite'))
                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('nightsuite')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default button-thumbnail" >EDIT AVAILABLE</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
                @endforeach
            </div>
        @endforeach
        @endif

            @if($category == 'apartments')
                @foreach($set_apartments as $set_apartment)
                    <div class="img-thumbnail wall-thumbnail" style="padding-bottom: 20px;padding-left:20px;margin-top: 80px;padding-right: 30px">
                        <div class="media p-3">

                            <img src="uploads/{{$set_apartment->image}}" alt="Upload Your Apartment Image " class="mr-3 mt-3 img-thumbnail img-responsive" style="width:350px;height: 200px">



                            <div class="img-thumbnail" style="padding-bottom: 85px;padding-left:20px;margin-top: 19px;background-color:#F3F9FE;padding-right: 300px ">
                                <div class="media-body" style="padding-top: 20px">

                                    <h4 style="text-transform: capitalize;"><b>{{$set_apartment->apartment_name}}</b></h4>
                                    <small style="text-transform: capitalize;"><b>{{$set_apartment->apartment_address}}</b></small><br/>
                                    <small><b>{{$set_apartment->apartment_contact}}</b></small><br/>
                                </div>
                            </div>
                        </div>
                        @foreach($availables_edit as $available_edit)
                            <form action="{{route('post_set_edit_apartment',['id'=>$available_edit->id])}}" method="post" style="padding-left: 15px;padding-top: 40px">
                                <div class="form-group" style="width: 48%">
                                    <label for="date_fromdate_from" style="font-size: 11px" class="label-control">Date From</label>
                                    <input  style="font-size: 10px; @if($errors->has('date_from'))border-color: red @endif " type="date" class="form-control form-control-sm " id="date_from" name="date_from" value="{{$available_edit->available_date}}">
                                    @if($errors->has('date_from'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('date_from')}}</span>
                                    @endif
                                </div>
                                <div class="form-group" style="width: 48%">
                                    <label for="date_to" style="font-size: 11px" class="label-control">Date to</label>
                                    <input  style="font-size: 10px; @if($errors->has('date_to'))border-color: red @endif " type="date" class="form-control form-control-sm " id="date_to" name="date_to" value="{{$available_edit->available_date}}">
                                    @if($errors->has('date_to'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('date_to')}}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-default button-thumbnail" >EDIT AVAILABLE</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </form>
                        @endforeach
                    </div>
                @endforeach
            @endif
            @if($category == 'restaurants')
                @foreach($set_restaurants as $set_restaurant)
                    <div class="img-thumbnail wall-thumbnail" style="padding-bottom: 20px;padding-left:20px;margin-top: 80px;padding-right: 30px">
                        <div class="media p-3">

                            <img src="uploads/{{$set_restaurant->image}}" alt="Upload Your Apartment Image " class="mr-3 mt-3 img-thumbnail img-responsive" style="width:350px;height: 200px">



                            <div class="img-thumbnail" style="padding-bottom: 85px;padding-left:20px;margin-top: 19px;background-color:#F3F9FE;padding-right: 300px ">
                                <div class="media-body" style="padding-top: 20px">

                                    <h4 style="text-transform: capitalize;"><b>{{$set_restaurant->restaurant_name}}</b></h4>
                                    <small style="text-transform: capitalize;"><b>{{$set_restaurant->restaurant_address}}</b></small><br/>
                                    <small><b>{{$set_restaurant->restaurant_contact}}</b></small><br/>
                                </div>
                            </div>
                        </div>
                        @foreach($availables_edit as $available_edit)
                            <form action="{{route('post_set_edit_restaurant',['id'=>$available_edit->id])}}" method="post" style="padding-left: 15px;padding-top: 40px">
                                <div class="form-group" style="width: 48%">
                                    <label for="date" style="font-size: 11px" class="label-control">Available Date</label>
                                    <input  style="font-size: 10px; @if($errors->has('date'))border-color: red @endif " type="date" class="form-control form-control-sm " id="date" name="date" value="{{$available_edit->available_date}}">
                                    @if($errors->has('date'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('date')}}</span>
                                    @endif
                                </div>
                                <div class="form-group" style="width: 48%">
                                    <label for="time_from" style="font-size: 11px" class="label-control">Time From</label>
                                    <input  style="font-size: 10px; @if($errors->has('time_from'))border-color: red @endif " type="time" class="form-control form-control-sm " id="time_from" name="time_from" value="{{$available_edit->time_from}}">
                                    @if($errors->has('time_from'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('time_from')}}</span>
                                    @endif
                                </div>
                                <div class="form-group" style="width: 48%">
                                    <label for="time_to" style="font-size: 11px" class="label-control">Time to</label>
                                    <input  style="font-size: 10px; @if($errors->has('time_to'))border-color: red @endif " type="time" class="form-control form-control-sm " id="time_to" name="time_to" value="{{$available_edit->time_to}}">
                                    @if($errors->has('time_to'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('time_to')}}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-default button-thumbnail" >EDIT AVAILABLE</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </form>
                        @endforeach
                    </div>
                @endforeach
            @endif



            @if($category == 'banquets')
                @foreach($set_banquets as $set_banquet)
                    <div class="img-thumbnail wall-thumbnail" style="padding-bottom: 20px;padding-left:20px;margin-top: 80px;padding-right: 30px">
                        <div class="media p-3">

                            <img src="uploads/{{$set_banquet->image}}" alt="Upload Your Apartment Image " class="mr-3 mt-3 img-thumbnail img-responsive" style="width:350px;height: 200px">



                            <div class="img-thumbnail" style="padding-bottom: 85px;padding-left:20px;margin-top: 19px;background-color:#F3F9FE;padding-right: 300px ">
                                <div class="media-body" style="padding-top: 20px">

                                    <h4 style="text-transform: capitalize;"><b>{{$set_banquet->banquet_name}}</b></h4>
                                    <small style="text-transform: capitalize;"><b>{{$set_banquet->banquet_address}}</b></small><br/>
                                    <small><b>{{$set_banquet->banquet_contact}}</b></small><br/>
                                </div>
                            </div>
                        </div>
                        @foreach($availables_edit as $available_edit)
                            <form action="{{route('post_set_edit_banquet',['id'=>$available_edit->id])}}" method="post" style="padding-left: 15px;padding-top: 40px">
                                <div class="form-group" style="width: 48%">
                                    <label for="date" style="font-size: 11px" class="label-control">Available Date</label>
                                    <input  style="font-size: 10px; @if($errors->has('date'))border-color: red @endif " type="date" class="form-control form-control-sm " id="date" name="date" value="{{$available_edit->available_date}}">
                                    @if($errors->has('date'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('date')}}</span>
                                    @endif
                                </div>
                                <div class="form-group" style="width: 48%">
                                    <label for="time_from" style="font-size: 11px" class="label-control">Time From</label>
                                    <input  style="font-size: 10px; @if($errors->has('time_from'))border-color: red @endif " type="time" class="form-control form-control-sm " id="time_from" name="time_from" value="{{$available_edit->time_from}}">
                                    @if($errors->has('time_from'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('time_from')}}</span>
                                    @endif
                                </div>
                                <div class="form-group" style="width: 48%">
                                    <label for="time_to" style="font-size: 11px" class="label-control">Time to</label>
                                    <input  style="font-size: 10px; @if($errors->has('time_to'))border-color: red @endif " type="time" class="form-control form-control-sm " id="time_to" name="time_to" value="{{$available_edit->time_to}}">
                                    @if($errors->has('time_to'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('time_to')}}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-default button-thumbnail" >EDIT AVAILABLE</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </form>
                        @endforeach
                    </div>
                @endforeach
            @endif


            @if($category == 'meetinghalls')
                @foreach($set_meetinghalls as $set_meetinghall)
                    <div class="img-thumbnail wall-thumbnail" style="padding-bottom: 20px;padding-left:20px;margin-top: 80px;padding-right: 30px">
                        <div class="media p-3">

                            <img src="uploads/{{$set_meetinghall->image}}" alt="Upload Your Apartment Image " class="mr-3 mt-3 img-thumbnail img-responsive" style="width:350px;height: 200px">



                            <div class="img-thumbnail" style="padding-bottom: 85px;padding-left:20px;margin-top: 19px;background-color:#F3F9FE;padding-right: 300px ">
                                <div class="media-body" style="padding-top: 20px">

                                    <h4 style="text-transform: capitalize;"><b>{{$set_meetinghall->meetinghall_name}}</b></h4>
                                    <small style="text-transform: capitalize;"><b>{{$set_meetinghall->meetinghall_address}}</b></small><br/>
                                    <small><b>{{$set_meetinghall->meetinghall_contact}}</b></small><br/>
                                </div>
                            </div>
                        </div>
                        @foreach($availables_edit as $available_edit)
                            <form action="{{route('post_set_edit_meetinghall',['id'=>$available_edit->id])}}" method="post" style="padding-left: 15px;padding-top: 40px">
                                <div class="form-group" style="width: 48%">
                                    <label for="date" style="font-size: 11px" class="label-control">Available Date</label>
                                    <input  style="font-size: 10px; @if($errors->has('date'))border-color: red @endif " type="date" class="form-control form-control-sm " id="date" name="date" value="{{$available_edit->available_date}}">
                                    @if($errors->has('date'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('date')}}</span>
                                    @endif
                                </div>
                                <div class="form-group" style="width: 48%">
                                    <label for="time_from" style="font-size: 11px" class="label-control">Time From</label>
                                    <input  style="font-size: 10px; @if($errors->has('time_from'))border-color: red @endif " type="time" class="form-control form-control-sm " id="time_from" name="time_from" value="{{$available_edit->time_from}}">
                                    @if($errors->has('time_from'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('time_from')}}</span>
                                    @endif
                                </div>
                                <div class="form-group" style="width: 48%">
                                    <label for="time_to" style="font-size: 11px" class="label-control">Time to</label>
                                    <input  style="font-size: 10px; @if($errors->has('time_to'))border-color: red @endif " type="time" class="form-control form-control-sm " id="time_to" name="time_to" value="{{$available_edit->time_to}}">
                                    @if($errors->has('time_to'))
                                        <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('time_to')}}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-default button-thumbnail" >EDIT AVAILABLE</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </form>
                        @endforeach
                    </div>
                @endforeach
            @endif




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

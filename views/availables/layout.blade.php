<!DOCTYPE html>
<html lang="en">
<head>
<title>Volar | Booking Site</title>
 <meta charset="utf-8">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css"/>
    <script src="jquery/jquery-3.2.1.min.js"></script>
    <script src="{{ URL::asset('js/preloader.js') }}"></script>
        <style>
            .lool {
             display: none;
    }
        input[type=radio]:checked ~ div.lool {
            display:block;
            }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: midnightblue;
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
        li a:hover:not(.active) {
            background-color:  #1A4A8D;
            text-decoration: none;
        }

        .correction:hover:not(.active) {
            background-color:   midnightblue;
            text-decoration: none;
        }  
        body {
   background-image: url("img/back.jpg");
   background-size: 100% 50%;
}
    </style>
</head>


<body>
<div class="preloader"></div>
<div class="con" style="margin:10px;margin-top:0px;">
    <div class="row">
        <div style="width: 100%">
            <ul>

                <li><a class="correction" href="{{route('home')}}" style="color: white;font-size: 30px;" >Volar | cells of a genius</a></li>
            </ul>

            <ul>
                <li><a href="{{route('home')}}" style="color: white;font-size: 15px" >Home</a></li>
                <li><a href="{{route('aboutus')}}" style="color: white;font-size: 15px" >About Us</a></li>
                <li><a href="{{route('hotels')}}" style="color: white;font-size: 15px">Hotels</a></li>
                <li><a href="{{route('apartmentsandhouses')}}" style="color: white;font-size: 15px">Apartments and Houses</a></li>
                <li><a href="{{route('restuarents')}}" style="color: white;font-size: 15px">Restuarents</a></li>
                <li><a href="{{route('banquets')}}" style="color: white;font-size: 15px">Banquets</a></li>
                <li><a href="{{route('meetinghalls')}}" style="color: white;font-size: 15px">Meeting Halls</a></li>
                <li><a href="{{route('contact')}}" style="color: white;font-size: 15px">Contact</a></li>
                @if(Auth::user())
                    @if((Auth::user()->role)=='owner')
                        <li><a href="#" style="color: white;font-size: 15px">Add Property</a></li>
                    @endif
                @endif
                @if(Auth::user())
                    <li class="pull-right"><a href="{{route('logout')}}" style="color: white;font-size: 15px">Logout</a></li>
                @endif
            </ul>

        </div>
        <br> <br></div>
    
<div class="con"style="margin:10px">
    @yield('content')
</div>

</div>
    <div class="row" style="background-color: midnightblue;margin-top: 50px; ">
            <div style="color: white;font-size: 16px;text-align: center;margin-top: 30px">Volar | cells of a genius</div><br/>
            <div style="color: white;font-size: 12px;text-align: center">Get In Touch</div></br>
            <div style="color: white;font-size: 12px;text-align: center">Address:   No: 506/A, katubadda, moratuwa<br />Sri Lanka</div></br>
            <div style="color: white;font-size: 12px;text-align: center">Telephones: 038 4 579 866</div></br>
            <div style="color: white;font-size: 12px;text-align: center">E-mail: volarbooking@gmail.com</div></br>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<script  src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>



</body>
</html>
@extends('layout')


@section('content')
<div class="alert-box" style="margin-top: 5px">
@if(!Auth::user())
<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
You need to Sign in for further Activities  
</div>
@endif
</div>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-4">
            <h2>Apartments and Houses</h2>
            <form action="/find1" method="POST" role="search">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="hotel_name" style="font-size: 12px">Place / Location</label>
                    <input class="form-control"  type="text" id="apartmentname" name="location" required>
                </div>
                <div >
                    <div class="form-group pull-left" style="width: 45%">
                        <label for="hotel_name" style="font-size: 12px">Check in :</label>
                        <input class="form-control"  type="date" name="checkAin" required>
                    </div>
                    <div class="form-group pull-right" style="width: 45%">
                        <label for="hotel_name" style="font-size: 12px">Check out :</label>
                        <input class="form-control"  type="date" name="checkAout" required>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <div class="form-group">
                    <div class="col-md-5"></div>
                    <button class="form-control btn btn-primary" style="font-size: 13px;" type="submit"><b>Search</b></button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="row">
            @if($apartments) 
                <table class="table table-responsive" style="margin-top: 30px">
                @foreach ($apartments as $apartment)
                    <tr> 
                        <td>
                        <img style="width:500px;height:200px;" src="{{ URL::asset("prop/$apartment->file")}}" alt="banquet image">
                        </td>
                        <td>
                            <div class="divider">
                                <div class="caption"><span style="color: midnightblue">{{$apartment->apartment_name}}</span></div>
                                <div class="price">{{$apartment->apartment_price}}</div>
                                <div class="location">{{$apartment->apartment_details}}</div>
                                @if(!Auth::user())
                                <a href="/apartmentsandhouses"><button class="btn btn-primary">View Details</button></a>
                                <a href="/apartmentsandhouses"><button class="btn btn-primary">Book Now</button></a>
                                @endif
                                @if(Auth::user())
                                <a href=""><button class="btn btn-primary">View Details</button></a>
                                <a href="{{route('book',['parameter'=>$apartment->Aid]) }}"><button class="btn btn-primary">Book Now</button></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach  
                </table>
                @endif  
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
        @if(isset($details))
    </br> <p> The Search results :</p>
    <table class="table table-responsive" style="margin-top: 30px">
    @foreach($details as $apartment)
    <tr>
    <td><a href="img/a-1.jpg"><img src="img/a-1.jpg" class="img-rounded img-responsive" alt="room View" style="width:500px;height:200px;"></a> </td>
    <td><div class="divider">
            <div class="caption"><span style="color: midnightblue">{{$apartment->apartment_name}}</span></div>
            <div class="price">{{$apartment->apartment_price}}</div>
            <div class="location">{{$apartment->apartment_details}}</div>
            <a href="{{route('book',['parameter'=>$apartment->Aid]) }}"><button class="btn btn-primary">Book Now</button></a>
    </div>
    </td>
    </tr>
        @endforeach
</table>
    @endif
    </div>
    </div>
@endsection
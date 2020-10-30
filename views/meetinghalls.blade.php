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
            <h2>Meeting Halls</h2>
            <form action="/find5" method="POST" role="search">
    {{ csrf_field() }}
                <div class="form-group">
                    <label style="font-size: 12px">Place / Destination</label>
                    <input class="form-control"  type="text" name="location" required>
                </div>

                <div class="form-group">
                    <label style="font-size: 12px">Check in</label>
                    <input class="form-control"  type="date" name="checkAin" required>
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
            @if(isset($meetinghalls)>0) 
                <table class="table table-responsive" style="margin-top: 30px">
                @foreach ($meetinghalls as $meetinghall)
                    <tr>
                        <td>
                        <img style="width:500px;height:200px;" src="{{ URL::asset("prop/$meetinghall->file")}}" alt="banquet image">
                        </td>
                        <td>
                            <div class="divider">
                                <div class="caption"><span style="color: midnightblue">{{$meetinghall->meetinghalls_name}}</span></div>
                                <div class="price">{{$meetinghall->meetinghalls_price}}</div>
                                <div class="location">{{$meetinghall->meetinghalls_details}}</div>
                                @if(!Auth::user())
                                <a href="/meetinghalls"><button class="btn btn-primary">View Details</button></a>
                                <a href="/meetinghalls"><button class="btn btn-primary">Book Now</button></a>
                                @endif
                                @if(Auth::user())
                                <a href=""><button class="btn btn-primary">View Details</button></a>
                                <a href="{{route('book',['parameter'=>$meetinghall->Mid]) }}"><button class="btn btn-primary">Book Now</button></a>
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
            @if(isset($details)>0) 
                <table class="table table-responsive" style="margin-top: 30px">
                @foreach ($details as $meetinghall)
                    <tr>
                        <td>
                            <a href="img/m-1.jpg"><img src="img/m-1.jpg" class="img-rounded img-responsive" alt="room View" style="width:500px;height:200px;"></a>
                        </td>
                        <td>
                            <div class="divider">
                                <div class="caption"><span style="color: midnightblue">{{$meetinghall->meetinghalls_name}}</span></div>
                                <div class="price">{{$meetinghall->meetinghalls_price}}</div>
                                <div class="location">{{$meetinghall->meetinghalls_details}}</div>
                                <a href="{{route('book',['parameter'=>$meetinghall->Mid]) }}"><button class="btn btn-primary">Book Now</button></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach  
                </table>
                @endif  
            </div>
        </div>

    </div>
@endsection
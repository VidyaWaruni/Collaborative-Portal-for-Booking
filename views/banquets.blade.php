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
            <h2>Banquets</h2>
            <form action="/find4" method="POST" role="search">
    {{ csrf_field() }}
                <div class="form-group">
                    <label for="hotel_name" style="font-size: 12px">Place / Destination</label>
                    <input class="form-control"  type="text" name="location" required>
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
            @if(isset($banquets)>0)  
                <table class="table table-responsive" style="margin-top: 30px">
                @foreach ($banquets as $banquet)
                    <tr>
                    <!--captions and descriptions are on the collection!-->
                        <td>
                          <img style="width:500px;height:200px;" src="{{ URL::asset("prop/$banquet->file")}}" alt="banquet image">
                        </td>

                        <td>
                            <div class="divider">
                                <div class="caption"><span style="color: midnightblue">{{$banquet->banquet_name}}</span></div>
                                <div class="price">{{$banquet->banquet_price}}</div>
                                <div class="location">{{$banquet->banquet_details}}</div>
                                @if(!Auth::user())
                                <a href="/banquets"><button class="btn btn-primary">View Details</button></a>
                                <a href="/banquets"><button class="btn btn-primary">Visit us</button</a>
                                @endif
                                @if(Auth::user())
                                <a href=""><button class="btn btn-primary">View Details</button></a>
                                <a href="{{ route('banquetInq',['parameter'=>$banquet->Bid]) }}"><button class="btn btn-primary">Visit Us</button></a>
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
                @foreach ($details as $banquet)
                    <tr>
                        <td>
                        <img src="{{ URL::asset("prop/$banquet->file")}}" alt="banquet image">
                        </td>
                        <td>
                            <div class="divider">
                                <div class="caption"><span style="color: midnightblue">{{$banquet->banquet_name}}</span></div>
                                <div class="price">{{$banquet->banquet_price}}</div>
                                <div class="location">{{$banquet->banquet_details}}</div>
                                <a href="{{ route('banquetInq',['parameter'=>$banquet->Bid]) }}"><button class="btn btn-primary">Visit Us</button></a>
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
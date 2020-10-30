@extends('layout')


@section('content')
<div class="alert-box" style="margin-top: 5px">
@if(!Auth::user())
<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
You need to Sign in for further Activities
</div>

@endif
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <form action="/find2" method="POST" role="search">
                    <div class="form-row">
                        <div class="col-5">
                            <label><b>Place / Hotel Destination</b></label>
                            <input type="text" class="form-control" name="location" placeholder="Place / Hotel Destination" required>
                        </div>
                        <div class="col">
                            <label><b>Checked in</b></label>
                            <input type="date" class="form-control"  id="datefield" name="checkAin" placeholder="" required>
                        </div>
                        <div class="col">
                            <label><b>Checked out</b></label>
                            <input type="date" class="form-control"   id="datefield1" name="checkAout"  placeholder="" required>
                        </div>
                        <div class="col">

                            <button class="form-control btn " style="font-size: 15px;background-color: #191970;color: whitesmoke;margin-top: 32px" type="submit"><b>SEARCH</b></button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>

        </div>
        <div class="container" style="margin-top: 50px;margin-bottom: 500px">
            <div class="row">
                @if(isset($details)>0)
                    @foreach ($details as $hotel)
                        <div class="col-md-4" style="height: 450px;padding-top: 100px">
                        <div class="card" >
                            <img class="card-img-top" src="uploads/{{$hotel->image}}" alt="Card image cap" style="max-height: 200px">
                            <div class="card-body">
                                <h5 class="card-title">{{$hotel->hotel_name}}</h5>
                                <p class="card-text" style="color:darkblue">
                    @if(($hotel->hotel_details)==0)&#9734; &#9734; &#9734; &#9734; &#9734;@endif
                    @if(($hotel->hotel_details)==1)&#9733; &#9734; &#9734; &#9734; &#9734;@endif
                    @if(($hotel->hotel_details)==2)&#9733; &#9733; &#9734; &#9734; &#9734;@endif
                    @if(($hotel->hotel_details)==3)&#9733; &#9733; &#9733; &#9734; &#9734;@endif
                    @if(($hotel->hotel_details)==4)&#9733; &#9733; &#9733; &#9733; &#9734;@endif
                    @if(($hotel->hotel_details)==5)&#9733; &#9733; &#9733; &#9733; &#9733;@endif
                    
                                        <b>{{$hotel->count}}</b>
                                        </p>
                                <p class="card-text">{{$hotel->hotel_address}}</p>
                                <a href="{{route('book',['parameter'=>$hotel->Hid]) }}" style="background-color: #191970;font-size: 11px" class="btn btn-primary">BOOK NOW</a>
                                <a href="{{route('view_property',['pid'=>$hotel->Hid,'tab'=>'hotels'])}}" style="background-color: #191970;font-size: 11px" class="btn btn-primary">VIEW PROPERTY</a>
                            </div>
                        </div>
                        </div>
                        @endforeach
                @else 
                <p>No Results Found</p>
                @endif


                    @if(isset($hotel_shows))
                        @foreach ($hotel_shows as $hotel_show)
                            <div class="col-md-4" style="height: 450px;padding-top: 100px">
                                <div class="card" >
                                    <img class="card-img-top" src="uploads/{{$hotel_show->image}}" alt="Card image cap" style="max-height: 200px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$hotel_show->hotel_name}}</h5>
                                        <p class="card-text" style="color:darkblue">
                    @if(($hotel_show->hotel_details)==0)&#9734; &#9734; &#9734; &#9734; &#9734;@endif
                    @if(($hotel_show->hotel_details)==1)&#9733; &#9734; &#9734; &#9734; &#9734;@endif
                    @if(($hotel_show->hotel_details)==2)&#9733; &#9733; &#9734; &#9734; &#9734;@endif
                    @if(($hotel_show->hotel_details)==3)&#9733; &#9733; &#9733; &#9734; &#9734;@endif
                    @if(($hotel_show->hotel_details)==4)&#9733; &#9733; &#9733; &#9733; &#9734;@endif
                    @if(($hotel_show->hotel_details)==5)&#9733; &#9733; &#9733; &#9733; &#9733;@endif
                    
                                        <b>{{$hotel_show->count}}</b>
                                        </p>
                                        <p class="card-text">{{$hotel_show->hotel_address}}</p>
                                        <a href="{{route('book',['parameter'=>$hotel_show->Hid]) }}" style="background-color: #191970;font-size: 11px" class="btn btn-primary">BOOK NOW</a>
                                        <a href="{{route('view_property',['pid'=>$hotel_show->Hid,'tab'=>'hotels'])}}" style="background-color: #191970;font-size: 11px" class="btn btn-primary">VIEW PROPERTY</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
    </div>
</div>
<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    }
    if(mm<10){
        mm='0'+mm
    }

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("datefield").setAttribute("min", today);
    document.getElementById("datefield1").setAttribute("min", today);
</script>
@endsection

@extends('layout')


@section('content')
@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

           @if (session('message'))
            <div class="alert alert-success">
            {{ session('message') }}
            </div>
          @endif 
<div class="container">
<h2 class="heading"><br>Booking</h2>
<div class="row"> 
<div class="col-md-4" style="height: 450px;float:right;padding-top: 100px">
    <div class="card" >
        <img class="card-img-top" src="uploads/{{$property->image}}" alt="Card image cap" style="max-height: 200px">
            <div class="card-body">
                <h5 class="card-title">{{$property->hotel_name}}aaaa</h5>
                    <p class="card-text">{{$property->hotel_details}}</p>
                    <p class="card-text">{{$property->hotel_address}}</p>
            </div>
    </div>
</div>
<form action="{{ route('reservation',['parameter'=>$category])}}" method="POST">
@csrf  
<div class="form-group">
<input type="number" class="form-control" style="display:none" name="id" value="{{$banNo}}" data-form-field="Name" read-only>
</div>
<div class="col-md-6" style="float:left">
<div class="form-group">
<label>FIRST NAME : </label>
<input type="text" name="firstname" class="form-control" value="{{$firstname}}" placeholder="Name" required>
</div>   

<div class="form-group">
<label>LAST NAME : </label>
<input type="text" name="lastname" class="form-control" value="{{$lastname}}" placeholder="Name" required>
</div>

<div class="form-group">
<label>EMAIL : </label>
<input type="text" placeholder="email" class="form-control" value="{{Auth::user()->email}}" name="email" required>
</div>

<div class="form-group">
<label>CONTACT NUMBER : </label>
<input type="number" placeholder="contact number" class="form-control" value="0{{Auth::user()->contact}}" name="contact" required>
</div>

<div class="form-group">
<label>ADDRESS : </label>
<textarea type="text" placeholder="address" class="form-control" name="address" required>{{Auth::user()->address}}</textarea>
</div>

<div class="form-group">
<label>COUNTRY : </label>
<input type="text" placeholder="country" class="form-control" name="country" required>
</div>
</div>
<div class="col-md-6" style="float:right">
@if($category=='hotels')
<div class="form-group pull-left" style="width: 50%">
<label>ARRIVAL</label><input class="form-control" type="date" name="arrival" required>
</div>

<div class="form-group pull-right" style="width: 45%">
<label>DEPARTURE</label><input class="form-control" type="date" name="departure" required>
</div>

<div class="form-group">
<label>Select Category</label><select class="form-control" name="category" required>
<option value="daynight">Day and Night</option>
<option value="day">Day Only</option>
<option value="night">Night Only</option></select>
</div>

<div class="form-group">
<label>Number of Rooms&nbsp&nbsp&nbsp&nbsp</label>
<input class="form-control" placeholder="0" type="text" name="number" required>
</div>

<div class="form-group">
<label>Select the Room type</label><select class="form-control" name="type" required>
<option value="single">Single</option>
<option value="double">Double</option>
<option value="suite">Suite</option></select>
</div>

<div class="form-group">
<label>Adults</label>
<input class="form-control" type="number" name="adults"> 
</div>

<div class="form-group">
<label>Children</label>
<input class="form-control" type="number" name="child"> 
</div>
@endif

@if($category=='restuarents')
<div class="form-group">
<label>Date for Reservation</label><input class="form-control" type="date" name="arrival" required>
</div>

<div class="form-group">
<label>Function type</label><select class="form-control" name="function" required >
<option value="birthday">Birthday Party</option>
<option value="official">Official Party</option>
<option value="family">Family Party</option>
<option value="other">Other</option></select>
</div>

<div class="form-group">
<label for="hotel_name">Number of Persons</label><input class="form-control"  type="text" name="noofperson" required>
</div>

<div class="form-group pull-left" style="width: 50%">
<label>Time From : </label><input class="form-control"  type="time" name="Tfrom" required>
</div>

<div class="form-group pull-right" style="width: 45%">
<label>Time To : </label><input class="form-control"  type="time" name="Tto" required>
</div>
@endif

@if($category=='meetinghalls')
<div class="form-group">
<label>Date for the Meeting</label><input class="form-control" type="date" name="arrival" required>
</div>

<div class="form-group pull-left" style="width: 50%">
<label>Time From : </label><input class="form-control"  type="time" name="Tfrom" required>
</div>

<div class="form-group pull-right" style="width: 45%">
<label>Time To : </label><input class="form-control"  type="time" name="Tto" required>
</div>
@endif

@if($category=='apartments')
<div class="form-group pull-left" style="width: 50%">
<label>ARRIVAL</label><input class="form-control" type="date" name="arrival" required>
</div>

<div class="form-group pull-right" style="width: 45%">
<label>DEPARTURE</label><input class="form-control" type="date" name="departure" required>
</div>
@endif
</div>  
</div>
<div class="form-group">
<label>COMMENTS :</label><br><textarea name="comments" placeholder="if you need any special messages to inform us" style="width:100%;height:100px" class="form-control"></textarea>
</div>
<button type="submit" style="width:150px" class="btn">Do the Payment</button>  
</form>
<a href="{{route('home')}}"><button style="width:150px" class="btn">Back</button></a>  
</div>
@endsection
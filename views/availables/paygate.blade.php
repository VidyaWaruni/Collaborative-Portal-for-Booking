@extends('layout')


@section('content')
<br>
<div class="container">
<h3>Reservation Details</h3>
<br>
<div class="con" style="margin-left:50px;margin-right:300px;float:left">
<br>
<p><strong>FIRST NAME :</strong> {{$pay[0]->firstname}}</p>
<p><strong>LAST NAME :</strong> {{$pay[0]->lastname}}</p>
<p><strong>EMAIL :</strong> {{$pay[0]->email}}</p>
<p><strong>CONTACT :</strong> {{$pay[0]->contact}}</p>
<p><strong>ADDRESS :</strong> {{$pay[0]->address}}</p>
<p><strong>COUNTRY :</strong> {{$pay[0]->country}}</p>
<p><strong>PROPERTY NAME :</strong> {{$pro[0]->name}}</p>
<p><strong>LOCATION :</strong> {{$pro[0]->detail}}</p>
@if($category=='hotels')
<p><strong>ARRIVAL :</strong> {{$pay[0]->arrival}}</p>
<p><strong>DEPARTURE :</strong> {{$pay[0]->departure}}</hp>
<p><strong>TIME CATEGORY :</strong> {{$pay[0]->hoteltimecategory}}</p>
<p><strong>NUMBER OF ROOMS :</strong> {{$pay[0]->noofrooms}}</p>
<p><strong>ROOM TYPE :</strong> {{$pay[0]->roomtype}}</p>
<p><strong>ADULTS :</strong> {{$pay[0]->adults}}</p>
<p><strong>CHILDREN :</strong> {{$pay[0]->childs}}</p>

@endif
@if($category=='apartments')
<p><strong>ARRIVAL :</strong> {{$pay[0]->arrival}}</p>
<p><strong>DEPARTURE :</strong> {{$pay[0]->departure}}</p>
@endif
@if($category=='meetinghalls')
<p><strong>RESERVED DATE :</label><h4>{{$pay[0]->arrival}}</p>
<p><strong>TIME FROM :</label><h4>{{$pay[0]->time_from}}</p>
<p><strong>TIME TO :</label><h4>{{$pay[0]->time_to}}</p>
@endif
@if($category=='restuarents')
<p><strong>RESERVED DATE :</strong> {{$pay[0]->arrival}}</p>
<p><strong>FUNCTION TYPE :</strong> {{$pay[0]->functiontype}}</p>
<p><strong>TIME FROM :</strong> {{$pay[0]->time_from}}</p>
<p><strong>TIME TO :</strong> {{$pay[0]->time_to}}</p>
@endif
<br>
</div>
</div>
<div class="pay">
<h4><strong>Amount Payable for the reservation</strong></h4>
<div class="con" style="margin-left:100px;margin-bottom:250px">
<div class="form-group">
<h5 style="color:darkblue"><strong>Reservation Ammount : RS: 100/=</strong></h5>
<p>Please Note:</p>
<p style="color:red">(All transaction payments are non refundable)</p>
<form method="post" style="margin-top:-100px" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1212160">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://127.0.0.1:8000/">
    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
    <input type="hidden" name="notify_url" value="http://sample.com/notify">  
    <input type="hidden" name="order_id" value="{{$pro[0]->id}}">
    <input type="hidden" name="items" value="Door bell wireless"><br>
    <input type="hidden" name="currency" value="LKR">
    <input type="hidden" name="amount" value="{{$pay[0]->amount}}">  
    <input type="hidden" name="first_name" value="{{$pay[0]->firstname}}">
    <input type="hidden" name="last_name" value="{{$pay[0]->lastname}}"><br>
    <input type="hidden" name="email" value="{{$pay[0]->email}}">
    <input type="hidden" name="phone" value="{{$pay[0]->contact}}"><br>
    <input type="hidden" name="address" value="{{$pay[0]->address}}">
    <input type="hidden" name="city" value="">
    <input type="hidden" name="country" value="{{$pay[0]->country}}"><br><br> 
    <img src="img/card.png" style="width:150px;height:150px">
    <img src="img/card1.png" style="width:160px;height:150px">
    <img src="img/card3.png" style="width:150px;height:150px">
    <a href=""><button style="width:500px" class="btn"> PAY HERE</button></a>  
</form> 
</div>
</div>
</div>
<div class="clear"></div>
@endsection



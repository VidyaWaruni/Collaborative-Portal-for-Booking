@extends('availables.layout')


@section('content')
<form action="{{route('Availableupdate',['parameter'=>$id,'category'=>$category])}}" method="POST" role="search">
    {{ csrf_field() }}    
<div class="form-group">
            <input type="number" style="display:none" class="form-control" name="ppid" value="{{ $id }}" data-form-field="Name" read-only>
</div>
@if($category=='hotels')
<div class="form-group">
            <label style="font-size: 12px">Available Date : {{$data->available_date}}</label>
            <input class="form-control" value="{{$data->available_date}}" style="display:none" type="date" name="date" required>
</div>
<div class="form-group">
    <label>Available Day Time</label>
         <select class="form-control" name="day" required>
            <option value="yes">Yes</option>
            <option value="no">no</option>
         </select>
</div>
<div class="form-group">
    <label>Available Night Time</label>
         <select class="form-control" name="night" required>
            <option value="yes">Yes</option>
            <option value="no">no</option>
         </select>
</div>
<div class="form-group pull-left" style="width: 27%">
    <label>Number of Rooms(LUXURY)&nbsp&nbsp&nbsp&nbsp</label>
    <input class="form-control" placeholder="0" value="{{$data->luxury}}" type="number" name="luxury" required>
</div>
<div class="form-group" style="width: 35%;float:right">
    <label>Number of Rooms(SEMI-LUXURY)&nbsp&nbsp&nbsp&nbsp</label>
    <input class="form-control" placeholder="0" value="{{$data->semi}}" type="number" name="semi" required>
</div>
<div class="form-group pull-right" style="width: 35%;margin-right:20px">
    <label>Number of Rooms(ECONOMY)&nbsp&nbsp&nbsp&nbsp</label>
    <input class="form-control" placeholder="0" value="{{$data->eco}}" type="number" name="eco" required>
</div>
<div class="form-group pull-left" style="width:50%">
    <label>Number of Single Rooms&nbsp&nbsp&nbsp&nbsp</label>
    <input class="form-control" placeholder="0" value="{{$data->single}}" type="number" name="single" required>
</div>
<div class="form-group pull-right" style="width:45%">
    <label>Number of Double Rooms&nbsp&nbsp&nbsp&nbsp</label>
    <input class="form-control" placeholder="0" value="{{$data->double}}" type="number" name="double" required>
</div>
@endif
@if($category=='restuarents')
<div class="form-group">
            <label style="font-size: 12px">Available Date : {{$data->available_date}}</label>
            <input class="form-control" value="{{$data->available_date}}" style="display:none" type="date" name="date" required>
</div>
<div class="form-group pull-left" style="width: 45%">
            <label style="font-size: 12px">Time From : </label>
            <input class="form-control" value="{{$data->time_from}}"  type="time" name="Tfrom" required>
</div>
<div class="form-group pull-right" style="width: 45%">
            <label style="font-size: 12px">Time To : </label>
            <input class="form-control" value="{{$data->time_to}}"  type="time" name="Tto" required>
</div>
@endif
@if($category=='meetinghalls')
<div class="form-group">
            <label style="font-size: 12px">Available Date : {{$data->available_date}}</label>
            <input class="form-control" value="{{$data->available_date}}" style="display:none" type="date" name="date" required>
</div>
<div class="form-group pull-left" style="width: 45%">
            <label style="font-size: 12px">Time From : </label>
            <input class="form-control" value="{{$data->time_from}}"  type="time" name="Tfrom" required>
</div>
<div class="form-group pull-right" style="width: 45%">
            <label style="font-size: 12px">Time To : </label>
            <input class="form-control" value="{{$data->time_to}}"  type="time" name="Tto" required>
</div>
@endif
@if($category=='apartments')
<div class="form-group">
            <label style="font-size: 12px">Available Date : {{$data->available_date}}</label>
            <input class="form-control" value="{{$data->available_date}}" style="display:none" type="date" name="date" required>
</div>
@endif
<div class="form-group">
<button type="submit" style="width:150px" class="btn">Submit</button>
</div>
</form>
@endsection
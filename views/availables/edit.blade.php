@extends('availables.layout')


@section('content')
<h1>{{$name}}</h1>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Available Future Dates</h2>
            </div>
        </div>
</div>  
@if($category=='hotels') 
@if(isset($dates)>0)
 <table class="table table-bordered">
        <tr>
            <th>Product No</th>
            <th>Available Dates</th>
            <th>Day</th>
            <th>Night</th>
            <th>Luxury</th>
            <th>Semi-Luxury</th>
            <th>Economy</th>
            <th>Single</th>
            <th>Double</th>
            <th width="100px">Action</th>
        </tr>
@foreach($dates as $date)
            <td>{{ $date->pro_id }}</td>
            <td>{{ $date->available_date }}</td>
            <td>{{ $date->day }}</td>
            <td>{{ $date->night }}</td>
            <td>{{ $date->luxury }}</td>
            <td>{{ $date->semi }}</td>
            <td>{{ $date->eco }}</td>
            <td>{{ $date->single }}</td>
            <td>{{ $date->double }}</td>
            <td>
            <a href="{{ route('showupdate',['parameter'=>$date->id,'category'=>$category]) }}"><button class="btn btn-primary pull-left">Edit</button></a>    
                <form action="{{ route('Availablesdestroy',['parameter'=>$date->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>
@endif
@endif
@if($category=='restuarents')
@if(isset($dates)>0)
<table class="table table-bordered">
        <tr>
            <th>Product No</th>
            <th>Available Dates</th>
            <th>Time From</th>
            <th>Time To</th>
            <th>Booking Status</th>
            <th width="100px">Action</th>
        </tr>
@foreach($dates as $date)
            <td>{{ $date->pro_id }}</td>
            <td>{{ $date->available_date }}</td>
            <td>{{$date->time_from }}</td>
            <td>{{ $date->time_to }}</td>
            <td>{{ $date->status }}</td>
            <td>
            <a href="{{ route('showupdate',['parameter'=>$date->id,'category'=>$category]) }}"><button class="btn btn-primary pull-left">Edit</button></a>    
                <form action="{{ route('Availablesdestroy',['parameter'=>$date->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>
@endif 
@endif 
@if($category=='meetinghalls')
@if(isset($dates)>0)
<table class="table table-bordered">
        <tr>
            <th>Product No</th>
            <th>Available Dates</th>
            <th>Time From</th>
            <th>Time To</th>
            <th>Booking Status</th>
            <th width="100px">Action</th>
        </tr>
@foreach($dates as $date)
            <td>{{ $date->pro_id }}</td>
            <td>{{ $date->available_date }}</td>
            <td>{{$date->time_from }}</td>
            <td>{{ $date->time_to }}</td>
            <td>{{ $date->status }}</td>
            <td>
            <a href="{{ route('showupdate',['parameter'=>$date->id,'category'=>$category]) }}"><button class="btn btn-primary pull-left">Edit</button></a>    
                <form action="{{ route('Availablesdestroy',['parameter'=>$date->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>
@endif 
@endif 
@if($category=='apartments')
@if(isset($dates)>0)
<table class="table table-bordered">
        <tr>
            <th>Product No</th>
            <th>Available Dates</th>
            <th>Booking Status</th>
            <th width="100px">Action</th>
        </tr>
@foreach($dates as $date)
            <td>{{ $date->pro_id }}</td>
            <td>{{ $date->available_date }}</td>
            <td>{{ $date->status }}</td>
            <td>  
                <form action="{{ route('Availablesdestroy',['parameter'=>$date->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>
@endif 
@endif 
@endsection
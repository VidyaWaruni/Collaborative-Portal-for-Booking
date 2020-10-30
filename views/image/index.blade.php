@extends('image.layout')


@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Property Gallery</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" style="width:200px;" href="{{ route('image.create',['parameter'=>$id]) }}"> Upload Image</a>
            </div>
        </div>
    </div>

    @if(isset($images)>0)
    <div class="row">
    @foreach($images as $image)
<div class="col-sm-4">
<a href="{{ URL::asset("prop/$image->file")}}" class="portfolio-box">
<img src="{{ URL::asset("prop/$image->file")}}" style="width:350px;height:200px" alt="property image">
<div class="portfolio-box-caption">
            <div class="portfolio-box-caption-content">
            <h6>{{$image->Caption}}</h6>
            </div>
        </div>
    </a>
<p>{{$image->Caption}}</h6><br>
                    <a href="{{route('proedit',['parameter'=>$image->id])}}" class="btn btn-info" href="">Edit</a>
                    <a href="{{route('pdelete',['parameter'=>$image->id])}}"><button type="submit" class="btn btn-danger">Delete</button></a>
</div>
@endforeach
</div>
@endif
                                 
@endsection
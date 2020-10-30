@extends('products.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
    </div>
    <input type="text" class="form-control" style="display:none" value="{{$id}}" name="id">
    
    @if(isset($img)>0)
    <div class="row">
    @foreach($img as $image)
<div class="col-sm-4">
<a href="{{ URL::asset("prop/$image->file")}}" class="portfolio-box">
<img src="{{ URL::asset("prop/$image->file")}}" style="width:350px;height:200px" alt="property image">
<div class="portfolio-box-caption">
            <div class="portfolio-box-caption-content">
            <br>
            <h6>{{$image->Caption}}</h6>
            </div>
        </div>
    </a>
<p>{{$image->Caption}}</h6><br>
</div>
@endforeach
</div>
@endif
    </div>
@endsection
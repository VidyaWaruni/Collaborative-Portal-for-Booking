@extends('products.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.store') }}" method="POST">
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"></br>
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input class="form-control" name="detail" placeholder="Detail">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Category</strong><br>
             <select name="category" class="form-control target">
                <option value="restuarents" id="hee">Restuarents</option>
                <option value="hotels">Hotels</option>
                <option value="meetinghalls">Meeting Halls</option>
                <option value="banquets">Banquets</option>
                <option value="apartments">Apartments/Houses</option>
            </select><br><br>
            </div>
<div class="form-control">
 <div style="display: none" id="restuarents">
 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group"><br>
        <strong>Resturent functions:</strong>
        <input type="text" name="function" class="form-control" placeholder="restuarents function">
    </div>

    <div class="form-group">
        <strong>Maximum Capacity:</strong>
        <input type="text" name="Rmax" class="form-control" placeholder="Maximum Capacity Ex:100,200">
    </div>
</div>
 </div>

<div style="display: none" id="hotels">
 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group"><br>
        <strong>Hotel Category Details:</strong>
        <textarea style="height:150px" name="Hcategory" class="form-control" placeholder="Hotel Category Details Ex:Number of Stars ,Type:Luxury ,Awards "></textarea>
    </div>
 </div>
</div>

<div style="display: none" id="meetinghalls">
 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group"><br>
        <strong>Meeting Hall Price Range:</strong>
        <textarea class="form-control" style="height:150px" name="MPrice" placeholder="Price of the property  Ex: Rs:12000 "></textarea>
    </div>
    <div class="form-group">
        <strong>Meeting Hall Maximum Capacity:</strong>
        <input type="text" name="Mmax" class="form-control" placeholder="Maximum Capacity Ex:100,200">
    </div>
 </div>
</div>

<div style="display: none" id="banquets">
 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group"><br>
        <strong>Banquet Price Ranges:</strong>
        <textarea class="form-control" style="height:150px" name="bfunction" placeholder="function"></textarea>
    </div>
    <div class="form-group">
        <strong>Banquet Maximum Capacity:</strong>
        <input type="text" name="Bmax" class="form-control" placeholder="Maximum Capacity Ex:100,200">
    </div>
</div>

<div style="display: none" id="apartments">
 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group"><br>
        <strong>Apartment / Houses Type:</strong>
        <textarea class="form-control" style="height:150px" name="AType" placeholder="Apartment Type Ex:Luxury,Super Luxury,Economy,normal"></textarea>
    </div>
    <div class="form-group">
        <strong>Apartment / Houses Price Ranges:</strong>
        <input type="text" class="form-control" name="APrice" placeholder="Apartment / Houses Price Range Ex:Rs:12000/=">
    </div>
</div>
</div>

</div>

@endsection
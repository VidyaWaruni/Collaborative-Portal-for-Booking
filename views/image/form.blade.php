@extends('image.layout')


@section('content')
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
    @if(session('success'))
   <div class="alert alert-success">
      {{ session('success') }}
   </div> 
 @endif
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"> 
                <h2> Add Product Images</h2>
            </div>
        </div>
    </div>
    <br>

 <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="file" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Upload a photo</small>
                </div>
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Image Caption" name="Caption">
                </div>
                <div class="form-group">
                <input type="text" class="form-control" style="display:none" value="{{$id}}" name="id">
                </div>
                <div class="form-group">
                <textarea type="text" class="form-control" placeholder="Image Description if needed" name="Description" id="des"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>         

    @endsection
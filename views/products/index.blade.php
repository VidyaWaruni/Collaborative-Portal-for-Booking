@extends('products.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Property</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" style="width:200px;" href="{{route('products.create')}}"> Create New Property</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Product Category</th>
            <th>Name</th>
            <th>Location</th>
            <th>Update Availabilities</th>
            <th>Pictures</th>
            <th width="350px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
            @if($product->category=="banquets")
            <h5>This features not available for Banquets</h5>
            @endif
            @if(!($product->category=="banquets"))
            <a href="{{ route('availables.index',['parameter'=>$product->id,'parameter2'=>$product->name,'parameter1'=>$product->category]) }}"><button class="btn btn-primary">Set New</button></a>
            <a href="{{route('Availableedit',['parameter'=>$product->id,'parameter2'=>$product->name,'parameter1'=>$product->category])}}"><button class="btn btn-primary">Edit</button></a>
            @endif
            </td>
            
            <td><a class="btn btn-secondary" style="width:150px" href="{{ route('image.index',['parameter'=>$product->id]) }}">Update Images</a></td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $products->links() !!}
@endsection
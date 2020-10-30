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
<section>
  <div>
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <div>
              <h1>Banquet Inquery</h1><br>
            </div>
            <form action="{{ route('inquery')}}" method="post">
            @csrf
              <input type="hidden" data-form-email="true">
              <div class="form-group" style="display:none">
              <label style="font-size: 20px">Property ID</label>
                <input type="number" class="form-control" name="id" value="{{$banNo}}" data-form-field="Name" read-only>
              </div>
              <div class="form-group">
              <label style="font-size: 20px">Name of Customer</label>
                <input type="text" class="form-control" name="name" placeholder="User Name" data-form-field="Name">
              </div>
              <div class="form-group">
              <label style="font-size: 20px">Date of Meeting</label>
              <input class="form-control" type="date" id="date" name="date" required>
              </div>
              <div class="form-group">
              <label style="font-size: 20px">Time of Meeting</label>
                <input type="time" class="form-control" name="time" placeholder="Time">
              </div>
              <div class="form-group">
              <label style="font-size: 20px">Message</label>
                <textarea class="form-control" name="message" placeholder="Message" rows="7"></textarea>
              </div>
              <div>
                <button type="submit" style="width:150px" class="btn">Submit Inquery</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
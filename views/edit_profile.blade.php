@extends('layout')


@section('content')

    <div class="container emp-profile">
        <form action="{{route('post_edit_profile')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="uploads/{{Auth::user()->avatar}}" alt=""/>
                        <div  class="file btn btn-lg btn-primary">

                        <input type="file" name="user_image"/>
                            <b style="font-size: 10px">CHANGE PHOTO</b>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h4 style="text-transform: uppercase">
                            {{Auth::user()->name}}
                        </h4>
                        <h6>
                            @if(Auth::user()->role == 'owner')
                                Property Owner
                            @endif
                        </h6>
                        <p class="proile-rating">&nbsp; <span></span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            @if(Auth::user()->role == 'owner')
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Available Properties</a>
                                </li>
                            @endif
                            {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="" aria-selected="false">Reservations</a>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <button style="margin-top: 36px;font-size: 11px" type="submit" class="btn btn-dark btn-sm"><b>SAVE PROFILE</b></button>
                </div>
            </div>
            <div class="row" style="margin-bottom: 200px">
                <div class="col-md-4">
                    <div class="profile-work">

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                {{--<div class="col-md-6">--}}
                                {{--<label>User Id</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                {{--<p>{{Auth::user()->id}}</p>--}}
                                {{--</div>--}}
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input  style=" @if($errors->has('name'))border-color: red @endif " type="text" class="form-control form-control-sm" id="name" name="name"  value="{{Auth::user()->name}}">
                                        @if($errors->has('name'))
                                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input  style=" @if($errors->has('email'))border-color: red @endif " type="text" class="form-control form-control-sm" id="email" name="email"  value="{{Auth::user()->email}}">
                                        @if($errors->has('email'))
                                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input  style=" @if($errors->has('contact'))border-color: red @endif " type="text" class="form-control form-control-sm" id="contact" name="contact"  value="{{Auth::user()->contact}}">
                                        @if($errors->has('contact'))
                                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('contact')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input  style=" @if($errors->has('address'))border-color: red @endif " type="text" class="form-control form-control-sm" id="address" name="address"  value="{{Auth::user()->address}}">
                                        @if($errors->has('address'))
                                            <span style="color: red;font-size: 11px" class="help-block">{{$errors->first('address')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    @if(Auth::user()->role == 'owner')
                                        <table style="margin-left: 20px">
                                            @foreach($availables as $available)
                                                <tr>
                                                    <td><small style="color:#191970"><b>Property ID :</b></small></td>
                                                    <td style="padding-left: 5px;color: #191970"><small >{{$available->pro_id}}</small></td>
                                                    <td style="padding-left: 20px;color: #191970"><small ><b>Name :</b></small></td>
                                                    <td style="padding-left: 5px;color: #191970"><small >{{$available->name}}</small></td>
                                                    <td style="padding-left: 20px;color: #191970"><small ><b>Category :</b></small></td>
                                                    <td style="padding-left: 5px;color: #191970"><small >{{$available->category}}</small></td>
                                                    <td style="padding-left: 20px;color: #191970"><small ><b>Available Date :</b></small></td>
                                                    <td style="padding-left: 5px;color: #191970"><small >{{$available->available_date}}</small></td>
                                                    <td style="padding-left: 20px;color: #191970"><small ><b>Status :</b></small></td>
                                                    <td style="padding-left: 5px;color: #191970"><small >{{$available->status}}</small></td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
    </div>
@endsection

@extends('layout')


@section('content')

    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img style="border-radius: 50%;"  src="uploads/{{Auth::user()->avatar}}" alt=""/>
                        <!--<div class="file btn btn-lg btn-primary">-->
                            <!-- {{--Change Photo--}} -->
                            <!-- {{--<input type="file" name="file"/>--}} -->
                        <!-- {{--</div>--}} -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h4 style="text-transform: uppercase">
                            {{Auth::user()->name}}
                            @if(Auth::user()->role == 'customer')
                            <h6 style="text-align: center;font-family:Times New Roman"><br>Your Total Bookings : {{$tc}}</h5>
                            @endif
                        </h4>
                        <h6>
                            @if(Auth::user()->role == 'owner')
                                Property Owner
                            @endif
                        </h6>
                        <p class="proile-rating">&nbsp; <span></span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @if(Auth::user()->role == 'customer')
                        <li class="nav-item">
                            <a class="nav-link show active" id="bookingsHistory-tab show active" data-toggle="tab" href="#bookingsHistory" role="tab" aria-controls="bookingsHistory" aria-selected="true">Bookings History</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                        @endif 
                        
                            @if(Auth::user()->role == 'owner')
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Available Properties</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            @endif
                            <!-- {{--<li class="nav-item">--}} -->
                                <!-- {{--<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="" aria-selected="false">Reservations</a>--}} -->
                            <!-- {{--</li>--}} -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{route('edit_profile')}}"><button style="margin-top: 36px;font-size: 11px" type="button" class="btn btn-dark btn-sm"><b>EDIT PROFILE</b></button></a>
                </div>
            </div>
            <div class="row" style="margin-bottom: 200px">
                <div class="col-md-4">
                    <div class="profile-work">

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                    <p style="text-transform: capitalize;">{{Auth::user()->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>0{{Auth::user()->contact}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p style="text-transform: capitalize">{{Auth::user()->address}}</p>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->role == 'owner')
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           @endif
                           @if(Auth::user()->role == 'customer')
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           @endif
                            <div class="row">
                                <div class="col-md-12">
                                    @if(Auth::user()->role == 'owner')
                                    @if(count($availables))
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
                                    @else
                                    <p>No Available Properties Found</p>
                                    @endif
                                     @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="bookingsHistory" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Auth::user()->role == 'customer')
                                @if(count($bookings))
                                <table id="example2" class="table table-stripped table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" style="padding-bottom:10px" id="example2_info" role="status" aria-live="polite">Showing {{count($bookings)}} of {{$tc}} entries</div>
                                        </div>
                                        <br>
                          

                                    </div>
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Reserved Date</th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                hidden>id</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Property Index</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Property Type</th>

                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                hidden>property name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">No of Rooms</th>

                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">From </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">To</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $row)

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$row->created_at}}</td>

                                            <td hidden>{{$row->cid}}</td>
                                            {{--
                                            <td>{{$row['pid']}}</td> --}}
                                            <td>{{$row->pid}}</td>
                                            <td>{{$row->productcategory}}</td>

                                            {{-- <td hidden>{{$row->propertyname}}</td> --}}
                                            <td>{{$row->noofrooms}}</td>
                                            <td>{{$row->arrival}}</td>
                                            <td>{{$row->departure}}</td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <p>No Bookings Found</p>
                                @endif
                                {{$bookings->links()}}
                                    @endif
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

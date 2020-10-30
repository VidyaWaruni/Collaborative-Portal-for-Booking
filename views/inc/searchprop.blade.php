<!--hotels-->
<div class="container" id="hot"><h2>&#127978; HOTEL DETAILS</h2></div>
<div class="container"  style="margin-left:-265px;">
  <div id="searchdetails" class="row" style="margin-left:250px;margin-right:20px;margin-top:20px;">
    <form action="/search1" method="POST" role="search">
        {{ csrf_field() }}
    <div class="input-group col-md-6">
        <input type="text" class="form-control" name="hotel_name" placeholder="Search Hotels"><span class="input-group-btn">
            <button type="submit" class="btn btn-default" style="margin-top:0px;height:34px;">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span></div></form><br>
    @if(isset($details))
    <div class="pull-right">
                <a class="btn btn-danger" href="/admin"> Back</a>
            </div>
    </br> <p> The Search results :</p>
    <table class="table table-striped"><thead><tr>
    <th>Hotel ID</th><th>Hotel Name</th><th>Hotel category</th><th>Hotel Details</th><th>Images</th>
    </tr></thead><tbody>
         @foreach($details as $hotel)
    <tr><td>{{$hotel->id}}</td><td>{{$hotel->hotel_name}}</td><td>{{$hotel->hotel_category}}</td><td>{{$hotel->hotel_details}}</td><td><a href="">To see images</a></td>
        <td></td>
    </tr>
        @endforeach
    </tbody></table>
    @endif
</div>
</div>
<!--hotels-->
<!--returents-->
<div class="container" id="res"><h2>&#127979; RESTURENT DETAILS</h2></div>
<div class="container"  style="margin-left:-265px;">
  <div id="searchdetails" class="row" style="margin-left:250px;margin-right:20px;margin-top:20px;">
    <form action="/search2" method="POST" role="search">
         {{ csrf_field() }}
    <div class="input-group col-md-6">
        <input type="text" class="form-control" name="restuarent_name" placeholder="Search Resturents"><span class="input-group-btn">
            <button type="submit" class="btn btn-default" style="margin-top:0px;height:34px;">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span></div></form><br>
@if(isset($details1))
<div class="pull-right">
                <a class="btn btn-danger" href="/admin"> Back</a>
            </div>
    </br> <p> The Search results :</p>
    <table class="table table-striped"><thead><tr>
    <th>Resturent ID</th><th>Resturent Name</th><th>Resturent function</th><th>Max Capacity</th><th>Resturent Details</th><th>Images</th>
    </tr></thead><tbody>
    @foreach($details1 as $resturent)
    <tr><td>{{$resturent->id}}</td><td>{{$resturent->restuarent_name}}</td><td>{{$resturent->restuarent_function}}</td><td>{{$resturent->max_Capacity}}</td><td>{{$resturent->restuarent_details}}</td><td><a href="">To see images</a></td>
    </tr>
    @endforeach
    </tbody></table>
    @endif
</div>
</div>
<!--resturents-->
<!--apartments-->
       <div class="container" id="apa"><h2>&#127969; APARTMENT AND HOUSE DETAILS</h2></div>
      </div> <div class="container" style="width:79%;margin-left:265px">
  <div id="searchdetails" class="row" style="margin-right:20px;margin-top:20px;">
  <form action="/search3" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group col-md-6">
        <input type="text" class="form-control" name="apartment_name" placeholder="Search Apartments and Houses"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" style="margin-top:0px;height:34px;">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
</div>
<br>
    @if(isset($details2))
    <div class="pull-right">
                <a class="btn btn-danger" href="/admin"> Back</a>
            </div>
    </br> <p> The Search results :</p>
    <table class="table table-striped" style="width:100%"><thead><tr>
    <th>Apartments/houses ID</th><th>Apartments/houses Name</th><th>Apartments/houses price</th><th>Apartments/houses type</th><th>Apartments/houses Details</th><th>Images</th>
    </tr></thead><tbody>
         @foreach($details2 as $apartment)
    <tr><td>{{$apartment->id}}</td><td>{{$apartment->apartment_name}}</td><td>{{$apartment->apartment_price}}</td><td>{{$apartment->apartment_type}}</td><td>{{$apartment->details}}</td><td><a href="">To see images</a></td>
        <td></td>
    </tr>
        @endforeach
    </tbody></table>
    @endif
</div>
</div>
<!--apartments-->
<!--banquets-->
       <div class="container" id="ban" style="margin-left:515px;"><h2>&#127970; BANQUET DETAILS</h2></div>
       </div> <div class="container" style="width:79%;margin-left:265px">
  <div id="searchdetails" class="row" style="margin-right:20px;margin-top:20px;">
  <form action="/search4" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group col-md-6">
        <input type="text" class="form-control" name="banquet_name" placeholder="Search Banquets"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" style="margin-top:0px;height:34px;">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
</div>
<br>
@if(isset($details3))
<div class="pull-right">
                <a class="btn btn-danger" href="/admin"> Back</a>
            </div>
    </br> <p> The Search results :</p>
    <table class="table table-striped"><thead><tr>
    <th>Banquet ID</th><th>Banquet Name</th><th>Banquet Details</th><th>Banquet Price</th><th>Banquet Capacity</th><th>Images</th>
    </tr></thead><tbody>
    @foreach($details3 as $banquet)
    <tr><td>{{ $banquet->id}}</td><td>{{$banquet->banquet_name }}</td><td>{{$banquet->banquet_details}}</td><td>{{ $banquet->banquet_price}}</td><td>{{$banquet->banquet_capacity}}</td><td><a href="">To see images</a></td>
        <td></td>
    </tr>
    @endforeach
    </tbody></table>
    @endif
</div>
    </div>
<!--banquets-->
<!--meetinghalls-->
       <div class="container" id="mee" style="margin-left:515px;"><h2>&#127961; MEETING HALL DETAILS</h2></div>
       </div> <div class="container" style="width:79%;margin-left:265px">
  <div id="searchdetails" class="row" style="margin-right:20px;margin-top:20px;">
  <form action="/search5" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group col-md-6">
        <input type="text" class="form-control" name="meetinghalls_name" placeholder="Search Meeting halls"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" style="margin-top:0px;height:34px;">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form><br>
@if(isset($details4))
<div class="pull-right">
                <a class="btn btn-danger" href="/admin"> Back</a>
            </div>
    </br> <p> The Search results :</p>
    <table class="table table-striped"><thead><tr>
    <th>Meeting Hall ID</th><th>Meeting Hall Name</th><th>Meeting Hall Details</th><th>Meeting Hall Price</th><th>Meeting Hall Capacity</th><th>Images</th>
    </tr></thead><tbody>
    @foreach($details4 as $meeting)
    <tr><td>{{ $meeting->id}}</td><td>{{$meeting->meetinghalls_name}}</td><td>{{$meeting->meetinghalls_details}}</td><td>{{$meeting->meetinghalls_price}}</td><td>{{$meeting->meetinghalls_capacity}}</td><td><a href="">To see images</a></td>
    </tr>
    @endforeach
    </tbody></table>
    @endif
</div>
</div>
<div class="container">
@if(count($inquery)>0)
<div class="container" id="banq"><h2>&#xa7; Banquet Inquery History</h2></div>     
<table class="table table-striped table-condensed" style="margin-left:15px;width:79%;">
                  <thead>
                  <tr>
                      <th>Id</th>
                      <th>Username</th>
                      <th>location</th>
                      <th>Date of Inquiry</th>
                      <th>Date of meeting</th>
                      <th>Time of meeting</th>
                      <th>Property Name</th>
                      <th>Property Owner</th>
                      <th>Property Owner Contact</th>
                      <th>Message</th>
                      <th>Status</th>                                          
                  </tr>
              </thead>   
              <tbody>
              @if (isset($inquery)) 
              @foreach ($inquery as $inquer)
                <tr>
                    <td>{{$inquer->Iid}}</td>
                    <td>{{$inquer->user_name}}</td>
                    <td>{{$inquer->prop_venue}}</td>
                    <td>{{$inquer->created_at}}</td>
                    <td>{{$inquer->meeting_date}}</td>
                    <td>{{$inquer->meeting_time}}</td>
                    <td>{{ $inquer->prop_name}}</td>
                    <td>{{ $inquer->prop_owner}}</td>
                    <td>{{ $inquer->prop_owner_contact}}</td>
                    <td>{{ $inquer->message}}</td>
                    <td> 
    <button type="submit" style="margin-top: 10px;border:0;background-color:#ffffff00"><span class="label label-success">{{$inquer->status}}</span></button></td>                                       
                </tr>   
                 @endforeach  
                 @endif                             
              </tbody>
            </table>
            @else
            <div class="container" id="banq"><h2>&#xa7; Banquet Inquery History</h2></div>  
            <h4 style="margin-left:50px">No Banquet Inquiries Found</h4>
            @endif 
            </div>
            <div class="con" style="margin-left:45%;">{{$inquery->links()}}</div>
        </div>
	</div>
</div>
</div>
<!--meetinghalls-->

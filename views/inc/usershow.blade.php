<!--customer details-->
<div class="container" id="cus"><h2>&#128102; CUSTOMER DETAILS</h2></div>
</div> <div class="container" style="width:79%;margin-left:265px">
  <div id="searchdetails" class="row" style="margin-right:20px;margin-top:20px;">
  <form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group col-md-6">
        <input type="text" class="form-control" name="q" placeholder="Search Customers"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" style="margin-top:0px;height:34px;">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
  </div>
    @if(isset($details))
    <div class="pull-right">
                <a class="btn btn-danger" href="/admin"> Back</a>
            </div>
       </br> <p> The Search results :</p>
    <h2>User details</h2>
    <table class="table table-striped" style="margin-top:-125px"><thead><tr> <th>Profile</th> <th>Name</th><th>Email</th><th>Address</th><th>Contact</th>
    </tr></thead><tbody>
        @foreach($details as $user)
    <tr><td> <img src="img/{{$user->avatar}}" class="img-rounded" style=" border-radius: 50%;width:50px;height:50px;" alt="profile img"> </td>
    <td>{{$user->name}}</td><td>{{$user->email}}</td><td>{{$user->address}}</td><td>{{$user->contact}}</td>
    </tr>
         @endforeach
    </tbody></table>
    @endif
</div></div>
<!--customer details-->
<!--property owner-->
    <div class="container" id="pro" style="margin-left:515px;"><h2>&#129492;PROPERTY OWNER DETAILS</h2></div>
<div class="container" style="width:79%;margin-left:265px">
  <div id="searchdetails" class="row" style="margin-right:20px;margin-top:20px;">
  <form action="/searcha" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group col-md-6">
        <input type="text" class="form-control" name="q" placeholder="Search Property Owners"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" style="margin-top:0px;height:34px;">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
  </div>
    @if(isset($detailsa))
    <div class="pull-right">
                <a class="btn btn-danger" href="/admin"> Back</a>
            </div>
       </br> <p> The Search results :</p>
    <h2>User details</h2>
    <table class="table table-striped"  style="margin-top:-125px"><thead><tr> <th>Profile</th> <th>Name</th><th>Email</th><th>Address</th><th>Contact</th>
    </tr></thead><tbody>
        @foreach($detailsa as $user)
    <tr><td> <img src="img/{{$user->avatar}}" class="img-rounded" style=" border-radius: 50%;width:50px;height:50px;" alt="profile img"> </td>
    <td>{{$user->name}}</td><td>{{$user->email}}</td><td>{{$user->address}}</td><td>{{$user->contact}}</td>
    </tr>
         @endforeach
    </tbody></table>
    @endif
</div></div>

<div class="container" style="margin-left:250px;"><h2>&#8962; DASHBOARD</h2></div>
  <div class="row">
  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded"> Customers</div>
  <div class="circle-tile-number text-faded ">{{ \App\User::where(['role' => 'customer'])->get()->count() }}</div>
  <a class="circle-tile-footer" href="#cus">More Info</a>
  </div></div>

  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded"> Prop Owners</div>
  <div class="circle-tile-number text-faded ">{{ \App\User::where(['role' => 'owner'])->get()->count() }}</div>
  <a class="circle-tile-footer" href="#pro">More Info</a>
  </div></div>

  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded"> Banquets</div>
  <div class="circle-tile-number text-faded ">{{ \App\Product::where(['category' => 'banquets'])->get()->count() }}</div>
  <a class="circle-tile-footer" href="#ban">More Info</a>
  </div> </div>

  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded"> Meeting Halls</div>
  <div class="circle-tile-number text-faded ">{{ \App\Product::where(['category' => 'meetinghalls'])->get()->count() }}</div>
  <a class="circle-tile-footer" href="#mee">More Info</a>
  </div></div>

  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded"> Hotels</div>
  <div class="circle-tile-number text-faded ">{{ \App\Product::where(['category' => 'hotels'])->get()->count() }}</div>
  <a class="circle-tile-footer" href="#hot">More Info</a>
  </div></div></div></div>
<div class="clear"></div>
<div class="container" style="margin-top:20px;">
  <div class="row">
  

  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded"> Resturents</div>
  <div class="circle-tile-number text-faded ">{{ \App\Product::where(['category' => 'restuarents'])->get()->count() }}</div>
  <a class="circle-tile-footer" href="#res">More Info</a>
  </div></div>
  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded"> Apartments and Houses</div>
  <div class="circle-tile-number text-faded ">{{ \App\Product::where(['category' => 'apartments'])->get()->count() }}</div>
  <a class="circle-tile-footer" href="#apa">More Info</a>
  </div></div>
  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded"> Banquet Inquiry</div>
  <div class="circle-tile-number text-faded ">{{ \App\Inquery::where(['status' => 'pending'])->get()->count() }}</div>
  <a class="circle-tile-footer" href="#inq">More Info</a>
  </div></div>
  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded">Reservations Having</div>
  <div class="circle-tile-number text-faded ">{{ \App\Reservation::get()->count() }}</div>
  <a class="circle-tile-footer" href="#reserve">More Info</a>
  </div></div>
  <div class="col-lg-2 col-sm-6">
  <div class="circle-tile-content dark-blue">
  <div class="circle-tile-description text-faded"> Admins of the Site</div>
  <div class="circle-tile-number text-faded ">{{ \App\User::where(['role' => 'admin'])->get()->count() }}</div>
  <a class="circle-tile-footer" href="#cus">More Info</a>
  </div></div>
  </div><div class="clear"></div>

<span class="account" style="margin-top:50px"><a href="#" style="font-size: 20px;margin-left: -500px;margin-top: 1000px" onclick="myFunction()">&#128462; Show Admin Monthly Report</a></span>
<div class="overlay"></div>
    <div class="autorize-popup">
        <div class="autorize-tabs">
            <h3 style="margin-left:20px">Monthly Report On </h3>
            <div class="clear"></div>
        </div>
        <section class="autorize-tab-content">
            <div class="autorize-padding">
                <h4 class="autorize-lbl">VOLAR BOOKING SITE (CELL OF GENIUS) - SRILANKA</h4>
<h5>1. Number of each type properties added to the site on last month</h5>
<div class="row">
<div class="col-lg-4 col-sm-4">
                <h6> Meeting Halls : {{ \App\Product::where(['category' => 'meetinghalls'])->where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->count() }}</h6>
</div>
<div class="col-lg-4 col-sm-4">
                <h6> Hotels : {{ \App\Product::where(['category' => 'hotels'])->where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->count() }}</h6>
</div>
<div class="col-lg-4 col-sm-4">
                <h6> Banquets : {{ \App\Product::where(['category' => 'banquets'])->where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->count() }}</h6>
</div>
</div>
<div class="row">
<div class="col-lg-4 col-sm-4">
                <h6> Resturents : {{ \App\Product::where(['category' => 'restuarents'])->where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->count() }}</h6>
</div>
<div class="col-lg-6 col-sm-6">
                <h6> Apartment and Houses : {{ \App\Product::where(['category' => 'apartments'])->where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->count() }}</h6>
</div>
</div>
<h5>2. Number of new users added to the site on last month</h5>
<div class="row">
<div class="col-lg-6 col-sm-6">
                <h6> Customers : {{ \App\User::where(['role' => 'customer'])->where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->count() }}</h6>
</div>
<div class="col-lg-6 col-sm-6">
                <h6> Property Owners : {{ \App\User::where(['role' => 'owner'])->where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->count() }}</h6>
</div>
</div>
<h5>3. Number of Reservations placed on last month :</h5>
<div class="col-lg-12 col-sm-12" style="margin-left:100px">
                <h5>  {{ \App\Reservation::where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->count() }}</h5>
</div> 
<h5>4. Number of Banquet Inquires placed on last month : </h5>
<div class="col-lg-12 col-sm-12" style="margin-left:100px">
                <h5> {{ \App\Inquery::where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->count() }}</h5>
</div> 
<h5>5. The Amount of all the payments get through Web Site on last month :</h5>
<div class="col-lg-12 col-sm-12" style="margin-left:100px">
                <h5> Rs:{{ \App\Reservation::where('created_at', '>=', $previous)->where('created_at', '<=', $after)->get()->sum('amount') }}/=</h5>
                </div>
<h6 class="pull-right" style="margin-top:-10px">Electronically Generated</h6>
 
        </section>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
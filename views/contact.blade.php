@extends('layout')


@section('content')
 <div style="margin-top:100px;float:left;margin-left: 20px">
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBGtntI_aSrtpd1a1Lk4iGFCRkR7jJavsw'></script><div style='overflow:hidden;height:379px;width:381px;'><div id='gmap_canvas' style='height:379px;width:381px;'></div>
<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div> <a href='https://www.embedmap.net/'>Location</a>
<script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=ca6d817d653264bc3d96833e128cce94175f94d4'></script>
<script type='text/javascript'>
function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(6.9319,79.8478),mapTypeId: google.maps.MapTypeId.ROADMAP};
map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(6.9319,79.8478)});
infowindow = new google.maps.InfoWindow({content:'<strong>Volar Booking Site Head Office</strong><br><br> Colombo<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
</div>
<div style="margin-left:400px">
<br><br><br><br><br><br>

<div class="col-lg-4" style="margin-bottom: 200px">
 <div class="custom-control-inline">
 @foreach($admins as $admin)
  <div class="card" style="width: 18rem;;margin-right: 10px">
   <img src="storage/avatars/{{$admin->avatar}}" style="width:100px;height:100px;margin-left: 90px;margin-top: 20px">
   <div class="card-body">
    <h5 class="card-title" style="text-align: center">{{$admin->name}}</h5>
    <p class="card-text" style="text-align: center">{{$admin->email}}</p>
    <p class="card-text" style="text-align: center"><strong>
    {{$admin->address}}<br>
      {{$admin->contact}}</strong></p>
   </div>
  </div>
@endforeach
 </div>

</div>
</div>



@endsection
    
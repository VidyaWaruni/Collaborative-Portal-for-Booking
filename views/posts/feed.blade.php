<!DOCTYPE html>
<html lang="en">
<head>
    <title>Volar | Booking Site</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
body{
    background-color:#DEDCDB;
}
h5{
    margin-top:5%;
    font-size:30px;
}
p{
    font-size:20px;
}
.feed{
    text-align: center;
    border:1px solid #34495E;
    margin-top:8%;
    background-color:#95A5A6;
}
select{
    border:0px;
    background-color:transparent;
    margin-bottom:50px;
}
option{
    background-color:transparent;
}
</style>
</head>
<body>
<div class="feed">
<h5>FEEDBACK</h5>
<p>On the property "{{$property->name}}"<br>Under the Category "{{$property->category}}"</p>
<form action="{{ route('feeder')}}" method="post">
            @csrf
            <input style="display:none" name="id" value="{{$property->id}}">
<label for="select">Rate :</label>
<select id="select" name="select" required>
  <option value="1">★</option>
  <option value="2">★★</option>
  <option value="3">★★★</option>
  <option value="4">★★★★</option>
  <option value="5">★★★★★</option>
</select>
<br>
<button type="submit" style="margin-bottom:50px;width:150px;background-color:#34495E;color:white" class="btn">Rate Property</button>
            </form>

</div>

</body>
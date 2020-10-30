@extends('posts.layout')

@section('content')
</br>
<div class="container">
<a href="/posts" class="btn btn-default">Go Back</a>
<h1>{{$post->title}}</h1>

<div>
{{$post->body}}
</div>
<hr>
<small>Written on {{$post->created_at}}</small>
</div>
@endsection
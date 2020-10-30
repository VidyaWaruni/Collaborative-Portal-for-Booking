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
<!--Form Start-->
@if(Auth::user())
                @if(((Auth::user()->role)=='customer') OR ((Auth::user()->role)=='owner'))
                <div class="container">
<fieldset><br>
<legend><br>LEAVE A COMMENTS</legend>
<div id="respond">
<form action="{{ route('comment')}}" method="POST">
@csrf
<div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="Name">
                </div>
            </div>
<div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                <input type = "text" placeholder = "mail" name = "email" value="{{Auth::user()->email}}"  class="form-control">
                </div>
            </div>
            </div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <textarea name = "comment" placeholder = "Message" class="form-control"></textarea>
                </div>
            </div>
            </div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
            </div>
</div>
</form>
@endif
                @endif
<div class="container">
<br>
<h1 style="text-decoration:underline">Comments</h1>
</br></br>
<div class="con" >
    @if(count($posts) > 0 )
        @foreach($posts as $post)
            <div class="well" style="background-color:#EBEBEB;padding:50px">
                <h2>{{$post->name}}</h2>
                @if(Auth::user())
                @if((Auth::user()->role)=='admin')
                @if($post->reply==null)
                <a href="" data-toggle="modal" data-target="#reply" class="pull-right" style="font-size:20px">Reply</a>
                <div class="container" style="width:80%">
  <div class="modal fade" style="margin:200px"  id="reply">
        <div class="modal-header">
        <h4 class="modal-title" style="color:white">RESPOND TO USER COMMENTS</h4>
          <button type="button" class="close">&times;</button>
        </div>
        <form action="{{route('reply',['parameter'=>$post->id])}}" method="POST">
        @csrf
         <div class="form-group">
         <textarea name="reply" style="height:100px" class="form-control" placeholder="Reply" required></textarea>
         </div>
                    <button type="submit" style="width:100px;margin-right:10px" class="pull-left btn btn-success">Post</button>
        </form>
        <button class="btn btn-danger"  style="width:100px"><a style="color:white;text-decoration:none" href="/posts">Cancel</a></button>      
      </div>
</div>
                @endif
                @endif
                @endif
                <small>Written on {{$post->created_at}}</small>
                <h4>Post : {{$post->message}}</h4>
                @if($post->reply!=null)
                <hr style="border-top: 1px solid black">
<img src="img/volar.jpg" class="inline" style="width:25px;height:25px;margin-right:10px"><strong>VOLAR ADMIN TEAM  -   <small> volaradminteam@gmail.com</small></strong>
               <br>
                <h6 style="color:darkblue;font-size:20px"><br>Reply : {{$post->reply}}</h6>
                @endif
            </div>
        @endforeach

    @else
    <p>No Posts Found</p>
    @endif

<div class="con" style="margin-left:45%;">{{$posts->links()}}</div>
</div>
</div>

</div>
</div>
</div>

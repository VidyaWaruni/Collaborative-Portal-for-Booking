<div class="container" id="containe14">
	<h2>&#128447; My Profile</h2>
	</div>
	<div class="con" style="width:80%">
	<div class="row" id="main">
        <div class="col-md-4 well" id="leftPanel">
            <div class="row">
                <div class="col-md-12">
                	<div>
                    <img class="img-circle img-thumbnail" src="storage/avatars/{{Auth::user()->avatar}}" alt="user image" style="border-radius:50%"/>
                    	<div class="row justify-content-center">
						<br>
            <form action="{{route('profile')}}" style="margin-left:50px" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                </div>
                <button type="submit" style="width:200px" class="btn btn-primary col-lg-12">Upload Profile Picture</button>
            </form>
        </div>
						<h3><strong>{{Auth::user()->name}}</strong></h3>
<form action="" method="post">
<br>
<a href="" data-toggle="modal" data-target="#pass">change password</a> 
</form>

        			</div>
        		</div>
            </div>
        </div>
        <div class="col-md-8 well" id="rightPanel">
            <div class="row">
    <div class="col-md-12">
    	<form action="{{route('Aupdate')}}"  method="post">
		@csrf
			<h2 style="margin-left:200px">Edit your profile.</h2>
			<hr class="colorgraph">
			<div class="row">
			<div class="form-group">
				<input type="text" name="id" class="form-control input-lg" style="display:none" value="{{Auth::user()->id}}" tabindex="4">
			</div>
			<div class="form-group  col-md-6">
				<input type="text" name="cname" class="form-control input-lg" value="{{Auth::user()->name}}" placeholder="FULL NAME" tabindex="4">
			</div>
            <div class="form-group col-md-6">
				<input type="text" name="ccontact" class="form-control input-lg"  value="{{Auth::user()->contact}}" placeholder="CONTACT" tabindex="4">
			</div>
			<div class="form-group  col-md-12">
				<input type="text" name="caddress" class="form-control input-lg"  value="{{Auth::user()->address}}" placeholder="ADDRESS" tabindex="4">
			</div>	
			<button type="submit"  class="btn btn-success col-lg-4 col-lg-offset-4">SAVE</button>
		</form>
        <div>
        <img src="img/p.jpg" alt="similey" style="width:100%;height:160px">
        </div>
	</div>
</div>
</div>
        </div>
     </div>       
	 </div> 

    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul class="alert-danger">
                        @foreach ($errors->all() as $error)
                            <li style="color:black">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
		<div class="container" style="width:80%">
  <div class="modal fade" style="margin:200px" id="pass">
        <div class="modal-header">
          <button type="button" class="close">&times;</button>
          <h4 class="modal-title" style="color:white">CHANGE PASSWORD</h4>
        </div>
        <form action="{{ route('password',['parameter'=>Auth::user()->id])}}" method="POST">
        @csrf
        <div class="form-group">
						<input type="password" name="cpassword" class="form-control input-lg" placeholder="Password" tabindex="5">
					</div>
					<div class="form-group">
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
					</div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
        </form>
      </div>
</div>
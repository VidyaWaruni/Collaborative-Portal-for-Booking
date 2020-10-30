@if(count($inqueries)>0)
<div class="container" id="inq"><h2>&#9734; Banquet Inquery Details</h2></div>     
<button type="button" style="margin-left:15px;padding:0" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Send Mail</button> 
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
              @if (isset($inqueries))  
              @foreach ($inqueries as $inquery)
                <tr>
                    <td>{{$inquery->Iid}}</td>
                    <td>{{$inquery->user_name}}</td>
                    <td>{{$inquery->prop_venue}}</td>
                    <td>{{$inquery->created_at}}</td>
                    <td>{{$inquery->meeting_date}}</td>
                    <td>{{$inquery->meeting_time}}</td>
                    <td>{{ $inquery->prop_name}}</td>
                     <td>{{ $inquery->prop_owner}}</td>
                    <td>{{ $inquery->prop_owner_contact}}</td>
                    <td>{{ $inquery->message}}</td>
                    <td> <form action="{{ route('Update',['parameter'=> $inquery->Iid]) }}" method="POST">
    {{ csrf_field() }}
    <button type="submit" style="margin-top: 0px;border:0;background-color:#ffffff00"><h4><span class="label label-success">{{$inquery->status}}</span></h4></button>
                    </form></td>                                       
                </tr>   
                 @endforeach    
                 @endif                           
              </tbody>
            </table>
            @else
            <div class="container" id="inq"><h2>&#9734; Banquet Inquery Details</h2></div> 
            <h4 style="margin-left:50px">No Banquet Inquiries Found</h4>
            @endif 
            </div>
            <div class="con" style="margin-left:45%;">{{$inqueries->links()}}</div>
        </div>
	</div>
</div>
<div class="container" style="width:80%">
  <div class="modal fade" style="margin:200px"  id="myModal">
        <div class="modal-header">
          <button type="button" class="close">&times;</button>
          <h4 class="modal-title" style="color:white">Reply to your Banquet Inquery</h4>
        </div>
        <form action="{{ route('email') }}" method="POST">
        @csrf
         <div class="form-group">
         <input type="email" placeholder="User Email" class="form-control" name="email" required>
         </div>
         <div class="form-group">
         <textarea name="message" class="form-control" placeholder="type the message here"  required></textarea>
         </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Send Email</button>
            </div>
        </div>
        </form>
      </div>
</div>

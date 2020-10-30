@if(count($comments)>0)
<div class="container" id="com"><h2>&#128172; Comments Details</h2></div>  
<table class="table table-striped table-condensed" style="margin-left:15px;margin-top:20px;width:79%;">
                  <thead>
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Respond</th>    
                      <th>Status</th>                   
                  </tr>
              </thead>   
              <tbody>
              @if (isset($comments))   
              @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->email}}</td>         
                    <td>{{$comment->message}}</td> 
                    <td>{{$comment->reply}}</td> 
                    <td><span class="label label-success">{{$comment->status}}</span></td>                                  
                </tr>   
                 @endforeach   
                 @endif                           
              </tbody>
            </table>
            @else
            <div class="container" id="com"><h2>&#128172; Comments Details</h2></div> 
            <h4 style="margin-left:50px">No Comments Found</h4>
            @endif      
            </div>
            <div class="con" style="margin-left:45%;">{{$comments->links()}}</div>
        </div>
	</div>
</div>


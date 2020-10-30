@if(count($reservations)>0)
<div class="container" id="reserve">

<h2>&#9734; RESERVATIONS HISTORY</h2></div>     
<table class="table table-striped table-condensed" style="margin-left:15px;width:70%;">
                  <thead>
                  <tr>
                      <th>Id</th>
                      <th>PID</th>
                      <th>Category</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Country</th>
                      <th>Comments</th>       
                      <th>Arrival</th>       
                      <th>Departure</th>     
                      <th>No of Rooms</th>    
                      <th>Amount</th>                                     
                  </tr>
              </thead>   
              <tbody>
              @if (isset($reservations)) 
              @foreach ($reservations as $reservation)
                <tr>
                    <td>{{$reservation->id}}</td>
                    <td>{{$reservation->pid}}</td>
                    <td>{{$reservation->productcategory}}</td>
                    <td>{{$reservation->firstname}}</td>
                    <td>{{$reservation->lastname}}</td>
                    <td>{{$reservation->email}}</td>
                    <td>{{$reservation->contact}}</td>
                    <td>{{ $reservation->address}}</td>
                    <td>{{ $reservation->country}}</td>
                    <td>{{ $reservation->comments}}</td>
                    <td>{{ $reservation->arrival}}</td>
                    <td>{{ $reservation->departure}}</td>
                    <td>{{ $reservation->noofrooms}}</td>    
                    <td>{{ $reservation->amount}}</td>                               
                </tr>   
                 @endforeach       
                 @endif                           
              </tbody>
            </table>
            @else
            <div class="container" id="reserve">
            <h2>&#9734; RESERVATIONS HISTORY</h2></div>  
            <h4 style="margin-left:50px">No Reservations Found</h4>
            @endif  
            </div>
<div class="con" style="margin-left:27%;">{{$reservations->links()}}</div>
            </div>
            </div>
            </div>
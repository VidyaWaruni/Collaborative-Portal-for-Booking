<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Validator;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;
use Illuminate\Auth\Passwords\PasswordBroker;
use App\Inquery;
use App\Apartment;
use App\Restaurant;
use App\User;
use App\Reset;
use App\Product;
use App\Feedback;
use App\Hotel;
use App\Image;
use App\Banquet;
use App\Comment;
use App\Available;
use App\Meetinghalls;
use Mail;
use App\Reservation;

class HomeController extends Controller
{
    public function index()
        {

            $i="0";
            return view('home')->with('i',$i);
        }
        public function getAboutus()
        {
            $tab ='aboutus';
            return view('aboutus',['tab'=>$tab]);
        }
        public function getApartmentsandHouses()
        {
            $tab ='apartmentsandhouses';
            $apartments = Apartment::join('images', function ($join) {
                $join->on('apartments.Aid','=', 'images.Pid');
            })->get()->unique('Aid');
            echo $apartments;
            //return view('apartmentsandhouses',['apartments' => $apartments,'tab'=>$tab]);
        }

        public function getHotels()
        {
            $collections = collect();
            $tab ='hotels';
            $hotel_shows = DB::table('hotels')
                ->join('availables', 'pro_id', '=', 'hotels.Hid')
                ->get()->unique('Hid');
            foreach($hotel_shows as $hotel){
                $id=$hotel->Hid;
                $rates = Feedback::where('pro_id','=',$id)->get();
                $save=Hotel::where('Hid','=',$id)->first();
                $count = Feedback::where('pro_id','=',$id)->count();
                $sum=0;
                foreach($rates as $rate){
                    $s=$rate->value;
                    $sum=$sum+$s;
                }
                if($count>0){
                    $co=$count;
                    $mul = $count*5;
                    $percentage = ($sum/$mul)*5;
                    $percentage = round($percentage);
                }else{
                    $percentage =0;
                }
                $hotel->hotel_details=$percentage;
                $save->hotel_details=$percentage;
                $save->save();
                $hotel->count=$count;
            }
            return view('hotels',['hotel_shows' => $hotel_shows,'tab'=>$tab]);
        }
        public function getBanquets()
        {
            $tab ='banquets';
         $banquets = Banquet::join('images', function ($join) {
                $join->on('banquets.Bid','=', 'images.Pid');
            })->get()->unique('Bid');
            return view('banquets',['banquets' => $banquets,'tab'=>$tab]);
        }
        public function BUpdate(Request $request)
        {
            $id = $request['parameter'];
            $banquetinq = Inquery::where('Iid','=',$id)->first();
            $banquetinq->status="arranged";
            $banquetinq->save();
            return back();
        }
        public function getRestuarents()
        {
            $tab ='restuarents';
            $resturents = Restaurant::join('images', function ($join) {
                $join->on('restaurants.Rid','=', 'images.Pid');
            })->get()->unique('Rid');
            return view('restuarents',['resturents' => $resturents,'tab'=>$tab]);
        }
        public function getContact()
        {
            $tab ='contact';
            $admins=User::where('role','=',"admin")->get();
            return view('contact',['tab'=>$tab,'admins'=>$admins]);
        }
        
        public function getCustomerProfile()
        {
            return view('CustomerProfile');
        }
        public function getAdminProfile()
        {
            return view('adminProfile');
        }
        public function getMeetinghalls()
        {
            $tab ='meetinghalls';
            $meetinghalls = Meetinghalls::join('images', function ($join) {
                $join->on('meetinghalls.Mid','=', 'images.Pid');
            })->get()->unique('Mid');
            return view('meetinghalls',['meetinghalls' => $meetinghalls,'tab'=>$tab]);
        }
        public function getBook(Request $request)
        {
            $split = explode(" ",Auth::user()->name );
            $firstname = array_shift($split);
            $lastname  = implode(" ", $split);
            $banNo = $request->parameter;
            $product=Product::where('id','=',$banNo)->first();
            $category=$product->category;
            $tab =$category; 
            if($category=="hotels"){
                $property=Hotel::where('id','=',$banNo)->first();
            }
            if($category=="restuarents"){
                $property=Restuarent::where('id','=',$banNo)->first();
            }
            if($category=="meetinghalls"){
                $property=Meetinghalls::where('id','=',$banNo)->first();
            }
            if($category=="banquets"){
                $property=Banquet::where('id','=',$banNo)->first();
            }
        return view('book',['firstname'=> $firstname,'property'=>$property,'product'=>$product,'tab'=>$tab,'category'=>$category,'lastname'=>$lastname,'banNo' => $banNo]);
        }
        public function getAdmin()
        { 
            $fname=Auth::user()->name;
            $arr = explode(' ',trim($fname));
            $fname= $arr[0];
         /*there is some codes for some needs
          $inqueries = DB::select('select * from inqueries');// $reservations = DB::select('select * from reservations');
          $inqueries = collect($inqueries)->sortBy('creatd_at')->reverse()->paginate(2);
        Paginator::setPageName('page_a'); //$comments = DB::select('select * from comments');
            */
            $previous = Carbon::now()->startOfMonth()->subMonth()->toDateString();
            $after = Carbon::now()->subMonth()->endOfMonth()->toDateString();
            $inqueries = Inquery::query()->where('status','=',"pending")->orderBy('created_at','desc')->paginate(10, ['*'], 'p1');
            $inquery = Inquery::query()->orderBy('created_at','desc')->paginate(2, ['*'], 'p4');
            $comments  = Comment::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p2');
            $reservations = Reservation::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p3');
            return view('admin',['inqueries' => $inqueries,'fname' => $fname,'after'=>$after,'previous'=>$previous,'comments'=>$comments,'inquery'=>$inquery,'reservations'=>$reservations]);
        }
        public function getBanquetInq(Request $request)
        {
            $banNo=new Product();
            $banNo = $request->parameter;
            return view('banquetInq',compact('banNo',$banNo));
        }
        public function inquery(Request $request){
            request()->validate([
                'name' => 'required',
                'date' => 'required',
                'time' => 'required',
                'message'=>'required',
           ]);
           $inquery = new Inquery();
           $a=$request->input("id");
           $product = Product::where('id','=',$a)->first();
           $inquery->lid="7";
           $inquery->user_name = $request->input("name");
           $inquery->prop_venue = "b";
           $inquery->meeting_date = $request->input("date");
           $inquery->meeting_time= $request->input("time");
           $inquery->prop_owner="vidu";
           $inquery->prop_owner_contact="0175848788";
           $inquery->prop_name="hhh";
           $inquery->message=$request->input("message");
           $inquery->status='pending';
           $inquery->save();
     
           return redirect()->route('banquets')
        ->with('success','Product created successfully.')->with("we will confirm you the meeting through Email");
        }
        public function Reservation(Request $request){
       request()->validate([
                'firstname' => 'required|string|max:50',
                'lastname' => 'required|string|max:50',
                'email' => 'required|string|email',
                'contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
                'address' => 'required',
                'country' => 'required',
                'comments'=> 'string|nullable',
                'arrival' => 'required|date',
                'departure' => 'date|after_or_equal:arrival',
                'time_from'=>'nullable',
                'time_to'=>'after:time_from'

            ]);
            $category = $request['parameter'];
            $reservation = new Reservation();
            $id = $request->input("id");
            $reservation->pid = $id;
            $reservation->productcategory = $category;
            $reservation->firstname = $request->input("firstname");
            $reservation->lastname = $request->input("lastname");
            $reservation->email = $request->input("email");
            $reservation->contact = $request->input("contact");
            $reservation->address = $request->input("address");
            $reservation->country = $request->input("country");
            $reservation->comments = $request->input("comments");

         $count = Available::count();
           $available=Available::where('pro_id','=',$id)->get();

if($category=='hotels'){
            request()->validate([
                'number'=>'required|min:0'
                ]);
               $start = $request->input("arrival");
               $last = $request->input("departure");
               $rooms = $request->input("number");
               $roomtype = $request->input("type");
               $time = $request->input("category");
                $i=0;
                $date[]=0;
               for($d = $start;$d< $last;$d++){
                   $data[$i] = $d;
                   $i++;
               }
                $data[$i]=$last;    
                $b=count($data); 
                $status="false";
                $r=0;$n=0;
               foreach($available as $a){
                    for($v=0;$v<$b;$v++){
                        $dat=$data[$v];
                        if($a->available_date==$dat){
                            $r++;
            if($time=='day'){
                if($roomtype=="single"){
                    if($rooms<=$a->daySingle){
                        $n++;
                    }
                }
                elseif($roomtype=="double"){
                    if($rooms<=$a->dayDouble){
                        $n++;
                    }
                }
                elseif($roomtype=="suite"){
                    if($rooms<=$a->daySuite){
                        $n++;
                    }
                }
            }
            elseif($time=='night'){
                if($roomtype=="single"){
                    if($rooms<=$a->nightSingle){
                        $n++;
                    }
                }
                elseif($roomtype=="double"){
                    if($rooms<=$a->nightDouble){
                        $n++;
                    }
                }
                elseif($roomtype=="suite"){
                    if($rooms<=$a->nightSuite){
                        $n++;
                    }
                }
            }
            elseif($time=='daynight'){
                if($roomtype=="single"){
                    if($rooms<=$a->nightSingle && $rooms<=$a->daySingle){
                        $n++;
                    }
                }
                elseif($roomtype=="double"){
                    if($rooms<=$a->nightDouble && $rooms<=$a->dayDouble){
                        $n++;
                    }
                }
                elseif($roomtype=="suite"){
                    if($rooms<=$a->nightSuite && $rooms<=$a->daySuite){
                        $n++;
                    }
                }
            }              
        }             
    }    
}
if($b==$r && $b==$n){
    foreach($available as $a){
        for($v=0;$v<$b;$v++){
            $dat=$data[$v];
if($a->available_date==$dat){
    if($roomtype=="single"){
        $avail =Available::where('pro_id','=',$id)->where('available_date','=',$dat)->first();
        if($time=="daynight"){
            $x = (int)$avail->daySingle-$rooms;
            $y = (int)$avail->nightSingle-$rooms;
            $avail->daySingle=$x;
            $avail->nightSingle=$y;
        }
        elseif($time=="day"){
            $x = (int)$avail->daySingle-$rooms;
            $avail->daySingle=$x;
        }
        elseif($time=="night"){
            $y = (int)$avail->nightSingle-$rooms;
            $avail->nightSingle=$y;
        }
        $avail->save();
    }
    elseif($roomtype=="double"){
        $avail =Available::where('pro_id','=',$id)->where('available_date','=',$dat)->first();
        if($time=="daynight"){
            $x = (int)$avail->dayDouble-$rooms;
            $y = (int)$avail->nightDouble-$rooms;
            $avail->dayDouble=$x;
            $avail->nightDouble=$y;
        }
        elseif($time=="day"){
            $x = (int)$avail->dayDouble-$rooms;
            $avail->dayDouble=$x;
        }
        elseif($time=="night"){
            $y = (int)$avail->nightDouble-$rooms;
            $avail->nightDouble=$y;
        }
        $avail->save();
    }   
    elseif($roomtype=="suite"){
        $avail =Available::where('pro_id','=',$id)->where('available_date','=',$dat)->first();
        if($time=="daynight"){
            $x = (int)$avail->daySuite-$rooms;
            $y = (int)$avail->nightSuite-$rooms;
            $avail->daySuite=$x;
            $avail->nightSuite=$y;
        }
        elseif($time=="day"){
            $x = (int)$avail->daySuite-$rooms;
            $avail->daySuite=$x;
        }
        elseif($time=="night"){
            $y = (int)$avail->nightSuite-$rooms;
            $avail->nightSuite=$y;
        }
        $avail->save();
    }              
                        }
                    }
                }
                $reservation->arrival = $start;
                $reservation->departure = $last;
                $reservation->hoteltimecategory = $time;
                $reservation->noofrooms = $rooms;
                $reservation->roomtype =  $roomtype;
                $reservation->adults = $request->input("adults");
                $reservation->childs = $request->input("child");
                $reservation->amount = 100;
                $reservation->save();
            }
            else{
                  return back()->with('error','RESERVATION DATE OR ROOMS ARE NOT AVAILABLE FOR THIS PROPERTY');
              }

}
            if($category=='restuarents'){
               $status="false";
               $date = $request->input("arrival");
               $from = $request->input("Tfrom");
               $to = $request->input("Tto");
            foreach($available as $a){
                if($date==$a->available_date){
                    if($from>=$a->time_from && $to<=$a->time_to && $a->status=="pending"){
                        $status="true";
                       $avail =Available::where('pro_id','=',$id)->where('available_date','=',$date)->where('time_from','<=',$from)->where('time_to','>=',$to)->first();
                       $avail->status="Reserved $from to $to";
                       $avail->save();
                    }
                }
            }
            if($status=="true"){
                $reservation->arrival = $date;
                $reservation->functiontype =  $request->input("function");
                $reservation->restnoodpersons = $request->input("noofperson");
                $reservation->time_from = $from;
                $reservation->time_to = $to;
                $reservation->amount = 100;
                $reservation->save();
            }else{
                return back()->with("Reservations needs are not available for this Property");
            }
                // $reservation->amount

            }
            if($category=='meetinghalls'){
                $date = $request->input("arrival");
                $from = $request->input("Tfrom");
                $to = $request->input("Tto");
                $status="false";
                foreach($available as $a){
                    if($date==$a->available_date){
                        if($from>=$a->time_from && $to<=$a->time_to && $a->status=="pending"){
                            $status="true";
                            $avail =Available::where('pro_id','=',$id)->where('available_date','=',$date)->where('time_from','<=',$from)->where('time_to','>=',$to)->first();
                            $avail->status="Reserved $from to $to";
                            $avail->save();
                        }
                    }
                }
                if($status=="true"){
                $reservation->arrival = $date;
                $reservation->time_from = $from;
                $reservation->time_to = $to;
                $reservation->amount = 100;
                $reservation->save();
            }else{
                return back()->with("Reservations needs are not available for this Property");
            }
                 // $reservation->amount

            }
            if($category=='apartments'){
                $start = $request->input("arrival");
                $last = $request->input("departure");
                $i=0;
                $date[]=0;
               for($d = $start;$d< $last;$d++){
                   $data[$i] = $d;
                   $i++;
               }
                $data[$i]=$last;    
                $b=count($data); 
                $r=0;
               foreach($available as $a){
                    for($v=0;$v<$b;$v++){
                        $dat=$data[$v];
                        if($a->available_date==$dat && $a->status=="pending"){
                            $r++;
                        }
                    }
               }
            if($b==$r){
                foreach($available as $a){
                    for($v=0;$v<$b;$v++){
                        $dat=$data[$v];
                        if($a->available_date==$dat && $a->status=="pending"){
                            $avail =Available::where('pro_id','=',$id)->where('available_date','=',$dat)->first();
                            $avail->status="Reserved";
                            $avail->save();
                        }
                    }
                }
                $reservation->arrival = $start;
                $reservation->departure = $last;
                $reservation->amount = 100;
                $reservation->save();
           }
            else{
                  return back()->with("Reservation Date or rooms are not available for this Property");
              }
            }
             // $reservation->amount

       //send the payment part to do the payment as to display the amount
       $tab=$category;
       $pro=DB::table('products')->where('id','=',$id)->get();
     $pay=DB::table('reservations')->where('pid','=',$id)->get();
     //feedback email 
    $tok = Reservation::where('email','=',$email)->where('pid','=',$id)->value('pid');
     Mail::send(['html' => 'feedback'],['tok'=>$tok],function($message) use ($email,$tok){
         $message->to( $email,'Dear Customer')->subject('Feed Back Collection About Property');
         $message->from('vidyawarun@gmail.com','Volar Booking System');
     });
     //feedback email
     return view('availables.paygate')->with('category',$category)->with('tab',$tab)->with('pay',$pay)->with('pro',$pro);

    } 
public function Email(Request $request){
    $tab='profile';
    return view('passwordreset.Email')->with('tab',$tab);
}
public function SendResetLinkEmail(Request $request)
{
 $email = $request['email'];
 $user = User::where('email','=',$email)->first();
 if (!$user)
 return back()->with('error','Error! Email is not found');
        /* return response()->json([
             'message' => 'We can\'t find a user with that e-mail address.'
         ], 404);*/
else{
    $reset=new Reset();
    $reset->Uid=$user->id;
    $reset->email=$email;
    $reset->token=str_random(60);
    $reset->save();
if ($user && $reset)
$this->Send($email);
return back()->with('success','Send Password Reset Link successfully');
}
}
public function Send($email){
    $token = DB::table('resets')->where('email','=',$email)->value('token');
    Mail::send(['html' => 'mail'],['token'=>$token],function($message) use ($email,$token){
        $message->to( $email,'Dear Customer')->subject('Password Reset Notification');
        $message->from('vidyawarun@gmail.com','Volar Booking System');
    });
}
public function ShowReset(Request $request){
    $token = $request->token;
    $tab='profile';
    $reset =  DB::table('resets')->where('token','=',$token)->first();
    $email = DB::table('resets')->where('token','=',$token)->value('email');
    if (!$reset)
    return response()->json([
        'message' => 'This password reset token is invalid.'
    ], 404);
    if (Carbon::parse($reset->updated_at)->addMinutes(720)->isPast()) {
        $reset->delete();
        return response()->json([
            'message' => 'This password reset token is invalid.'
        ], 404);
    }
    if(count($email)>0){
   return redirect()->route('Reset')->with('token', $token)->with('email',$email)->with('tab',$tab);
    }else{
        return redirect()->route('home')->with('Token expired');
    }
}

public function getReset(Request $request){
   $token = $request->session()->get('token');
   $email = $request->session()->get('email'); $tab='profile';
   $reset =  DB::table('resets')->where('token','=',$token)->where('email','=',$email)->first();
   $tab='profile';
        return view('passwordreset.Reset')->with('token', $token)->with('email',$email)->with('tab',$tab);
}
public function ResetPassword(Request $request){
    request()->validate([
        'email' => 'required|string|email',
        'password' =>  'required|min:8|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'required|min:8'
   ]);
   $reset =  DB::table('resets')->where('email','=',$request['email'])->delete();
   $user = User::where('email','=',$request['email'])->first();
   if (!$user)
            return response()->json([
                'message' => 'We can\'t find a qquser with that e-mail address.'
            ], 404);

    $password=bcrypt($request['password']);
    $user->password=$password;
    $user->save();
    return redirect()->route('home');
}
public function CommentEmail(Request $request){
    request()->validate([
        'email' => 'required|string|email',
        'message' =>  'required'
   ]);
   $email=$request['email'];
   $msg=$request['message'];
   $com =  DB::table('users')->where('email','=',$email)->first();
   $coms=Inquery::where('user_name','=',$email)->first();
   if(count($com)>0){
   Mail::send([],[],function($message) use ($email,$msg){
    $message->to( $email,'Dear Customer,')->subject('Respond to the Inquery For Banquet Visit')->setBody($msg);
    $message->from('vidyawarun@gmail.com','Volar Booking System');
    });
    $coms->status="arranged";
    $coms->save();
    return redirect()->route('admin');
    }
    return back()->with("user email cannot find");
}
public function ShowRating(Request $request){
    $tab='profile';
    $feed=$request->tok;
    $d = "$feed";
    $count = Reservation::where('pid','=',$d)->count();
    $property = Product::where('id','=',$d)->first();
if($count>0){
    return view('posts.feed')->with('tab',$tab)->with('property',$property);
}else{
    return response()->json([
        'message' => 'URL is Not found.'
    ], 404);
}
}
public function Feeder(Request $request){
    $rate = $request['select'];
    $id =  $request['id'];
    $feedback = new Feedback();
    $feedback->pro_id=$id;
    $feedback->value=$rate;
    $feedback->save();
    return view('posts.thankyou');
}

}


<?php


namespace App\Http\Controllers;

use App\Reservation;
use App\Product;
use App\Hotel;
use Carbon\Carbon;
use App\Apartment;
use App\Banquet;
use App\MeetingHalls;
use App\Restaurant;
use App\Available;
use App\Inquery;
use App\Comment;
use App\Image;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);


        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
       ]);

        $products = new Product();
        $products->name = $request->input("name");
        $products->category = $request->input("category");
        $products->detail= $request->input("detail");
        $products->save();

if($products->category=='hotels'){
        $hotels = new Hotel();
        $hotels->id = $products->id;
        $hotels->Hid = $products->id;
        $hotels->hotel_name = $products->name;
        $hotels->hotel_category = $request->input("Hcategory");
        $hotels->hotel_details = $products->detail;
        $hotels->save();
}
if($products->category=='restuarents'){
        $restuarent = new Restaurant();
        $restuarent->id = $products->id;
        $restuarent->Rid = $products->id;
        $restuarent->restuarent_name = $products->name;
        $restuarent->restuarent_function = $request->input("function");
        $restuarent->max_Capacity = $request->input("Rmax");
        $restuarent->restuarent_details = $products->detail;
        $restuarent->save();
}
//error check it
if($products->category=='apartments'){
    $apartment = new Apartment();
    $apartment->id = $products->id;
    $apartment->Aid = $products->id;
    $apartment->apartment_name = $products->name;
    $apartment->apartment_price = "Rs: 12000";
    $apartment->apartment_type = $request->input("AType");
    $apartment->apartment_details = $products->detail;
    $apartment->save();
}
if($products->category=='banquets'){
    $banquet = new Banquet();
    $banquet->id = $products->id;
    $banquet->Bid = $products->id;
    $banquet->banquet_name = $products->name;
    $banquet->banquet_details = $products->detail;
    $banquet->banquet_price = $request->input("bfunction");
    $banquet->banquet_capacity = $request->input("Bmax");
    $banquet->save();
}
//error check it
if($products->category=='meetinghalls'){
    $meeting = new MeetingHalls();
    $meeting->id = $products->id;
    $meeting->Mid = $products->id;
    $meeting->meetinghalls_name = $products->name;
    $meeting->meetinghalls_details = $products->detail;
    $meeting->meetinghalls_price = $request->input("MPrice");
    $meeting->meetinghalls_capacity = $request->input("Mmax");
    $meeting->save();
}
        //****** Product::create($request->all());********
      return redirect()->route('products.index')
    ->with('success','Product created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) 
    {
        $id =$product->id;
        $img = Image::where('Pid','=',$id)->paginate(8);
        return view('products.show',compact('product'))->with('img',$img)->with('id',$id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        $product->update($request->all());


        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //$images=Image::where('Pid','=',$product->id)->get();
        $images=DB::table('images')->where('Pid','=',$product->id);
        //$availables=Availables::where('pro_id','=',$product->id)->get();
        $availables=DB::table('availables')->where('pro_id','=',$product->id);
        $images->delete();
        $availables->delete();
        $product->delete();


        return redirect()->route('products.index')
                       ->with('success','Product deleted successfully');
    }
    public function search1(Request $request){
        $q = $request->input( 'hotel_name' );
        $previous = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $after = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $inqueries = Inquery::query()->where('status','=',"pending")->orderBy('created_at','desc')->paginate(10, ['*'], 'p1');
        $inquery = Inquery::query()->orderBy('created_at','desc')->paginate(2, ['*'], 'p4');
        $comments  = Comment::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p2');
        $reservations = Reservation::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p3'); 
        $hotel =\App\Hotel::where('hotel_name','LIKE','%'.$q.'%')->orWhere('hotel_details','LIKE','%'.$q.'%')->get();
        if(count($hotel) > 0)
            return view('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withDetails($hotel)->withQuery ( $q );
        else
        return view ('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withMessage('No Details found. Try to search again !');
    }
    public function search2(Request $request){
        $q = $request->input( 'restuarent_name' );
        $previous = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $after = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $inqueries = Inquery::query()->where('status','=',"pending")->orderBy('created_at','desc')->paginate(10, ['*'], 'p1');
        $inquery = Inquery::query()->orderBy('created_at','desc')->paginate(2, ['*'], 'p4');
        $comments  = Comment::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p2');
        $reservations = Reservation::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p3'); 
        $restuarent =\App\Restaurant::where('restuarent_name','LIKE','%'.$q.'%')->orWhere('restuarent_details','LIKE','%'.$q.'%')->get();
        if(count($restuarent) > 0)
            return view('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withDetails1($restuarent)->withQuery ( $q );
        else
        return view ('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withMessage('No Details found. Try to search again !');
    }
    public function search3(Request $request){
        $q = $request->input( 'apartment_name' );
        $previous = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $after = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $inqueries = Inquery::query()->where('status','=',"pending")->orderBy('created_at','desc')->paginate(10, ['*'], 'p1');
        $inquery = Inquery::query()->orderBy('created_at','desc')->paginate(2, ['*'], 'p4');
        $comments  = Comment::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p2');
        $reservations = Reservation::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p3'); 
        $apartment =\App\Apartment::where('apartment_name','LIKE','%'.$q.'%')->orWhere('apartment_details','LIKE','%'.$q.'%')->get();
        if(count($apartment) > 0)
            return view('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withDetails2($apartment)->withQuery ( $q );
        else
        return view ('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withMessage('No Details found. Try to search again !');
    }
    public function search4(Request $request){
        $q = $request->input( 'banquet_name' );
        $previous = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $after = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $previous = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $after = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $inqueries = Inquery::query()->where('status','=',"pending")->orderBy('created_at','desc')->paginate(10, ['*'], 'p1');
        $inquery = Inquery::query()->orderBy('created_at','desc')->paginate(2, ['*'], 'p4');
        $comments  = Comment::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p2');
        $reservations = Reservation::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p3'); 
        $banquet =\App\Banquet::where('banquet_name','LIKE','%'.$q.'%')->orWhere('banquet_details','LIKE','%'.$q.'%')->get();
        if(count($banquet) > 0)
            return view('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withDetails3($banquet)->withQuery ( $q );
        else
        return view ('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withMessage('No Details found. Try to search again !');
    }
    public function search5(Request $request){
        $q = $request->input( 'meetinghalls_name' );
        $previous = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $after = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $inqueries = Inquery::query()->where('status','=',"pending")->orderBy('created_at','desc')->paginate(10, ['*'], 'p1');
        $inquery = Inquery::query()->orderBy('created_at','desc')->paginate(2, ['*'], 'p4');
        $comments  = Comment::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p2');
        $reservations = Reservation::query()->orderBy('created_at','desc')->paginate(5, ['*'], 'p3'); 
        $meeting =\App\Meetinghalls::where('meetinghalls_name','LIKE','%'.$q.'%')->orWhere('meetinghalls_details','LIKE','%'.$q.'%')->get();
        if(count($meeting) > 0)
            return view('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withDetails4($meeting)->withQuery ( $q );
        else
        return view ('admin',['inqueries' => $inqueries,'after'=>$after,'previous'=>$previous,'inquery'=>$inquery,'comments'=>$comments,'reservations'=>$reservations])->withMessage('No Details found. Try to search again !');
    }
    public function find2(Request $request){
        $location = $request->input( 'location' );
        $checkin = $request->input( 'checkAin' );
        $checkout = $request->input( 'checkAout' );
        $i=0;
        $j=0;
        $date[]=0; 
        $find[]=0;
       for($d = $checkin;$d< $checkout;$d++){
           $data[$i] = $d;
           $i++;
       }
        $data[$i]=$checkout;    
        $b=count($data); 
        $collections = collect();
        $hotels = Hotel::where('hotel_address','LIKE','%'.$location.'%')->get();
      foreach($hotels as $hotel){
        $r=0;
        $availables = Available::where('pro_id','=',$hotel->Hid)->where('status','=',"pending")->get();
        $count = Feedback::where('pro_id','=',$hotel->Hid)->count();
        foreach($availables as $available){
            for($v=0;$v<$b;$v++){
                $dat=$data[$v];
                if($available->available_date==$dat){
                    $r++;
                }
            }
        if($r==$b){
            $collections->push($hotel); 
        }
        }
        $hotel->count=$count;
      }
      $tab='hotel';
      if(count($collections)>0)
      return view('hotels',['tab'=>$tab])->withDetails($collections);
      else
      return view('hotels',['tab'=>$tab])->with('error','No Property Results Found');
    }
    public function find1(Request $request){
        $q1 = $request->input( 'location' );
        $q2 = $request->input( 'checkAin' );
        $new1 = date('Y-m-d', strtotime($q2));
        //$apartment = Apartment::where('apartment_details','LIKE','%'.$q1.'%')->first();
        $hotel = DB::table('hotels')
        ->join('availables', 'pro_id', '=', 'hotels.Hid')
        ->where('hotels.hotel_address','LIKE','%'.$q1.'%')
//        ->where('availables.available_to', '>=', $new1)
//        ->where('availables.available_from', '<=', $new1)
        ->get();

        $tab = 'hotels'; //do not delete

    if(count($hotel)>0)
        return view('hotels',['tab'=>$tab])->withDetails($hotel)->withQuery ( $q1 );
    else
            return view ('hotels',['tab'=>$tab])->withMessage('No Details found. Try to search again !');
    }
    
  

    public function find3(Request $request){
        $q1 = $request->input( 'location' );
        $q2 = $request->input( 'checkAin' );
        $new1 = date('Y-m-d', strtotime($q2));
        $restuarent = DB::table('restuarents')
        ->join('availables', 'pro_id', '=', 'restuarents.Rid')
        ->where('restuarents.restuarent_details','LIKE','%'.$q1.'%')
        ->where('availables.available_to', '>=', $new1)
        ->where('availables.available_from', '<=', $new1)
        ->get();

        $tab = 'restuarents'; //do not delete

    if(count($restuarent)>0)
        return view('restuarents',['tab'=>$tab])->withDetails($restuarent)->withQuery ( $q1 );
    else
            return view ('restuarents',['tab'=>$tab])->withMessage('No Details found. Try to search again !');
    }
    public function find4(Request $request){
        $q1 = $request->input( 'location' );
        $banquet = DB::table('banquets')
        ->where('banquet_details','LIKE','%'.$q1.'%')
        ->get();

        $tab = 'banquets'; //do not delete

    if(count($banquet)>0)
        return view('banquets',['tab'=>$tab])->withDetails($banquet)->withQuery ( $q1 );
    else
            return view ('banquets',['tab'=>$tab])->withMessage('No Details found. Try to search again !');
    }
    public function find5(Request $request){
        $q1 = $request->input( 'location' );
        $q2 = $request->input( 'checkAin' );
        $new1 = date('Y-m-d', strtotime($q2));
        $meetinghall = DB::table('meetinghalls')
        ->join('availables', 'pro_id', '=', 'meetinghalls.Mid')
        ->where('meetinghalls.meetinghalls_details','LIKE','%'.$q1.'%')
        ->where('availables.available_to', '>=', $new1)
        ->where('availables.available_from', '<=', $new1)
        ->get();

        $tab = 'meetinghalls'; //do not delete

    if(count($meetinghall)>0)
        return view('meetinghalls',['tab'=>$tab])->withDetails($meetinghall)->withQuery ( $q1 );
    else
            return view ('meetinghalls',['tab'=>$tab])->withMessage('No Details found. Try to search again !');
    }
public function Prof(){
    if((Auth::user()->role)=='admin'){
        return redirect()->route('admin');
    }else{
        return redirect()->route('profile');
    }
}
}
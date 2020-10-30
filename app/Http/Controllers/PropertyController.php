<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Available;
use App\Banquet;
use App\File;
use App\Hotel;
use App\Meetinghalls;
use App\Product;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;


class PropertyController extends Controller

{

//    for hotel

    public function addHotel(){

        $hotels = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('hotels', 'products.id', '=', 'hotels.Hid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'hotels.*')
            ->orderByRaw('hotels.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('hotels', 'products.id', '=', 'hotels.Hid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'hotels.*')
            ->count();

        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();

        return view('Property.add_new_hotel',['hotels' =>$hotels,'count' =>$count,'availables' =>$availables]);
    }

    public function postAddHotel(Request $request){


        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required|max:150',
            'contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'hotel_image' => 'required',
        ]);


        $products = new Product();
        $products->name = $request->input("name");
        $products->category = $request->input("category");
        $products->user_id =Auth::user()->id;
        $products->save();

        if(Input::hasFile('hotel_image')){
            $file =Input::file('hotel_image');
            $file->move('uploads','hotel-'.$products->id.'.jpg');
        }

        $hotels = new Hotel();
        $hotels->id = $products->id;
        $hotels->Hid = $products->id;
        $hotels->hotel_name = $products->name;
        $hotels->hotel_address = $request->input("address");
        $hotels->hotel_contact = $request->input("contact");
        $hotels->hotel_category = $products->category;
        $hotels->image = 'hotel-'.$products->id.'.jpg';
        $hotels->save();

        return redirect()->back();

    }


    public function editHotel($id){

        $edit_hotels = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('hotels', 'products.id', '=', 'hotels.Hid')
            ->where('user_id', Auth::user()->id)
            ->where('hotels.Hid',$id)
            ->select('products.*', 'hotels.*')
            ->get();

        $hotels = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('hotels', 'products.id', '=', 'hotels.Hid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'hotels.*')
            ->orderByRaw('hotels.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('hotels', 'products.id', '=', 'hotels.Hid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'hotels.*')
            ->count();
        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();


        return view('Property.edit_hotel',['hotels' =>$hotels,'count' =>$count,'edit_hotels' =>$edit_hotels,'availables' =>$availables]);
    }

    public function postEditHotel(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required|max:150',
            'contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
        ]);



        Product::find($id)->update([
            'name' => $request->name,
        ]);

        if(Input::hasFile('hotel_image')){
            $file =Input::file('hotel_image');
            $file->move('uploads','hotel-'.$id.'.jpg');
        }

        $hid = \DB::table('hotels')->where('Hid',$id)->value('id');

        Hotel::find($hid)->update([
            'hotel_name' => $request->name,
            'hotel_address' => $request->address,
            'hotel_contact' => $request->contact,
            'image' => 'hotel-'.$id.'.jpg',
        ]);


        return redirect()->route('add_hotel');

    }

    public function deleteHotel($id){

        \DB::table('products')->where('id', '=', $id)->delete();
        $hid = \DB::table('hotels')->where('Hid',$id)->value('id');

        \DB::table('hotels')->where('id', '=', $hid)->delete();
        \DB::table('availables')->where('pro_id', '=', $id)->delete();

        return redirect()->back();
    }


    public function uploadHotelImage($id){
        if(Input::hasFile('hotel_image')){
            $file =Input::file('hotel_image');
            $file->move('uploads','hotel-'.$id.'.jpg');

            Hotel::find($id)->update([
                'image' => 'hotel-'.$id.'.jpg',
            ]);
        }





        return redirect()->back();
    }

//    for hotel

//    for apartment

    public function addApartment(){

        $apartments = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('apartments', 'products.id', '=', 'apartments.Aid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'apartments.*')
            ->orderByRaw('apartments.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('apartments', 'products.id', '=', 'apartments.Aid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'apartments.*')
            ->count();

        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();

        return view('Property.add_new_apartment',['apartments' =>$apartments,'count' =>$count,'availables' =>$availables]);

    }


    public function postAddApartment(Request $request){


        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required|max:150',
            'contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'apartment_image' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'details' => 'required|max:150',
        ]);


        $products = new Product();
        $products->name = $request->input("name");
        $products->category = $request->input("category");
        $products->user_id =Auth::user()->id;
        $products->save();

        if(Input::hasFile('apartment_image')){
            $file =Input::file('apartment_image');
            $file->move('uploads','apartment-'.$products->id.'.jpg');
        }

        $apartments = new Apartment();
        $apartments->id = $products->id;
        $apartments->Aid = $products->id;
        $apartments->apartment_name = $products->name;
        $apartments->apartment_address = $request->input("address");
        $apartments->apartment_contact = $request->input("contact");
        $apartments->apartment_price = $request->input("price");
        $apartments->apartment_type = $request->input("type");
        $apartments->apartment_details = $request->input("details");
        $apartments->image = 'apartment-'.$products->id.'.jpg';
        $apartments->save();

        return redirect()->back();

    }


    public function editApartment($id){


        $edit_apartments = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('apartments', 'products.id', '=', 'apartments.Aid')
            ->where('user_id', Auth::user()->id)
            ->where('apartments.Aid',$id)
            ->select('products.*', 'apartments.*')
            ->get();


        $apartments = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('apartments', 'products.id', '=', 'apartments.Aid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'apartments.*')
            ->orderByRaw('apartments.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('apartments', 'products.id', '=', 'apartments.Aid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'apartments.*')
            ->count();

        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();

        return view('Property.edit_apartment',['apartments' =>$apartments,'edit_apartments'=>$edit_apartments,'count' =>$count,'availables' =>$availables]);

    }

    public function postEditApartment(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required|max:150',
            'contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'price' => 'required|numeric',
            'type' => 'required',
//            'details' => 'required',
        ]);


        Product::find($id)->update([
            'name' => $request->name,
        ]);


        if(Input::hasFile('apartment_image')){
            $file =Input::file('apartment_image');
            $file->move('uploads','apartment-'.$id.'.jpg');
        }

        $aid = \DB::table('apartments')->where('Aid',$id)->value('id');

        Apartment::find($aid)->update([
            'apartment_name' => $request->name,
            'apartment_address' => $request->address,
            'apartment_contact' => $request->contact,
            'apartment_price' => $request->price,
            'apartment_type' => $request->type,
            'apartment_details' => $request->details,
            'image' =>  'apartment-'.$id.'.jpg',
        ]);

        return redirect()->route('add_apartment');

    }

    public function deleteApartment($id){

        \DB::table('products')->where('id', '=', $id)->delete();
        $aid = \DB::table('apartments')->where('Aid',$id)->value('id');

        \DB::table('apartments')->where('id', '=', $aid)->delete();
        \DB::table('availables')->where('pro_id', '=', $id)->delete();

        return redirect()->back();
    }



    public function uploadApartmentImage($id){

        if(Input::hasFile('apartment_image')){
            $file =Input::file('apartment_image');
            $file->move('uploads','apartment-'.$id.'.jpg');

            Apartment::find($id)->update([
                'image' => 'apartment-'.$id.'.jpg',
            ]);
        }


        return redirect()->back();
    }


//    for apartment


//set available

public function setAvailable($id){
    $category = \DB::table('products')->where('id',$id)->value('category');

        if($category == 'hotels'){
            $set_hotels = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('hotels', 'products.id', '=', 'hotels.Hid')
                ->where('user_id', Auth::user()->id)
                ->where('hotels.Hid',$id)
                ->select('products.*', 'hotels.*')
                ->get();

            return view('Property.set_available',['set_hotels' =>$set_hotels,'category' =>$category]);
        }
        if($category == 'apartments'){
        $set_apartments = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('apartments', 'products.id', '=', 'apartments.Aid')
            ->where('user_id', Auth::user()->id)
            ->where('apartments.Aid',$id)
            ->select('products.*', 'apartments.*')
            ->get();

        return view('Property.set_available',['set_apartments' =>$set_apartments,'category' =>$category]);
    }

    if($category == 'restaurants'){
        $set_restaurants = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('restaurants', 'products.id', '=', 'restaurants.Rid')
            ->where('user_id', Auth::user()->id)
            ->where('restaurants.Rid',$id)
            ->select('products.*', 'restaurants.*')
            ->get();

        return view('Property.set_available',['set_restaurants' =>$set_restaurants,'category' =>$category]);
    }

    if($category == 'banquets'){
        $set_banquets = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('banquets', 'products.id', '=', 'banquets.Bid')
            ->where('user_id', Auth::user()->id)
            ->where('banquets.Bid',$id)
            ->select('products.*', 'banquets.*')
            ->get();

        return view('Property.set_available',['set_banquets' =>$set_banquets,'category' =>$category]);
    }

    if($category == 'meetinghalls'){
        $set_meetinghalls = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('meetinghalls', 'products.id', '=', 'meetinghalls.Mid')
            ->where('user_id', Auth::user()->id)
            ->where('meetinghalls.Mid',$id)
            ->select('products.*', 'meetinghalls.*')
            ->get();

        return view('Property.set_available',['set_meetinghalls' =>$set_meetinghalls,'category' =>$category]);
    }



}

    public function editAvailable($id){
        $availables_pro_id = \DB::table('availables')->where('id',$id)->value('pro_id');
        $availables_edit = \DB::table('availables')->where('id',$id)->get();
        $category = \DB::table('products')->where('id',$availables_pro_id)->value('category');


        if($category == 'hotels'){
            $set_hotels = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('hotels', 'products.id', '=', 'hotels.Hid')
                ->where('user_id', Auth::user()->id)
                ->where('products.id',$availables_pro_id)
                ->select('products.*', 'hotels.*')
                ->get();

            return view('Property.edit_available',['set_hotels' =>$set_hotels,'category' =>$category,'availables_edit' =>$availables_edit]);
        }

        if($category == 'apartments'){
            $set_apartments = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('apartments', 'products.id', '=', 'apartments.Aid')
                ->where('user_id', Auth::user()->id)
                ->where('products.id',$availables_pro_id)
                ->select('products.*', 'apartments.*')
                ->get();

            return view('Property.edit_available',['set_apartments' =>$set_apartments,'category' =>$category,'availables_edit' =>$availables_edit]);
        }


        if($category == 'restaurants'){
            $set_restaurants = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('restaurants', 'products.id', '=', 'restaurants.Rid')
                ->where('user_id', Auth::user()->id)
                ->where('products.id',$availables_pro_id)
                ->select('products.*', 'restaurants.*')
                ->get();

            return view('Property.edit_available',['set_restaurants' =>$set_restaurants,'category' =>$category,'availables_edit' =>$availables_edit]);
        }

        if($category == 'banquets'){
            $set_banquets = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('banquets', 'products.id', '=', 'banquets.Bid')
                ->where('user_id', Auth::user()->id)
                ->where('products.id',$availables_pro_id)
                ->select('products.*', 'banquets.*')
                ->get();

            return view('Property.edit_available',['set_banquets' =>$set_banquets,'category' =>$category,'availables_edit' =>$availables_edit]);
        }

        if($category == 'meetinghalls'){
            $set_meetinghalls = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('meetinghalls', 'products.id', '=', 'meetinghalls.Mid')
                ->where('user_id', Auth::user()->id)
                ->where('products.id',$availables_pro_id)
                ->select('products.*', 'meetinghalls.*')
                ->get();

            return view('Property.edit_available',['set_meetinghalls' =>$set_meetinghalls,'category' =>$category,'availables_edit' =>$availables_edit]);
        }





    }



public function postSetHotel(Request $request,$id){

    $available=new Available();
    $available->pro_id = $id;

    $check_date=$request->input("date");

    $count = \DB::table('availables')
        ->where('pro_id',$id)
        ->where('available_date',$check_date)
        ->count();

    if($count >0){
        $this->validate($request, [
            'date' => 'required|date|unique:availables,available_date,'.$available->pro_id,
            'daysingle' => 'required|min:0',
            'nightsingle' => 'required|min:0',
            'daydouble' => 'required|min:0',
            'nightdouble' => 'required|min:0',
            'daysuite' => 'required|min:0',
            'nightsuite' => 'required|min:0'
        ]);
    }else{
        $this->validate($request, [
            'date' => 'required|date',
            'daysingle' => 'required|min:0',
            'nightsingle' => 'required|min:0',
            'daydouble' => 'required|min:0',
            'nightdouble' => 'required|min:0',
            'daysuite' => 'required|min:0',
            'nightsuite' => 'required|min:0'
        ]);
    }

    $available->available_date = $request->input("date");
    $available->daySingle = $request->input("daysingle");
    $available->nightSingle = $request->input("nightsingle");
    $available->dayDouble = $request->input("daydouble");
    $available->nightDouble = $request->input("nightdouble");
    $available->daySuite = $request->input("daysuite");
    $available->nightSuite = $request->input("nightsuite");
    $available->status="pending";
    $available->save();
return redirect()->route('add_hotel');

}


    public function postSetApartment(Request $request,$id){

        $available=new Available();
        $available->pro_id = $id;

        $this->validate($request, [
            'date_from' => 'required|date',
            'date_to' => 'required|date',

        ]);

        $available->available_date = $request->input("date_from");
        $available->date_to = $request->input("date_to");
        $available->status="pending";
        $available->save();
        return redirect()->route('add_apartment');

    }


    public function postSetRestaurant(Request $request,$id){

        $available=new Available();
        $available->pro_id = $id;

        $this->validate($request, [
            'date' => 'required|date',
            'time_from' => 'required',
            'time_to' => 'required',

        ]);


        $available->available_date = $request->input("date");
        $available->time_from = $request->input("time_from");
        $available->time_to = $request->input("time_to");
        $available->status="pending";
        $available->save();
        return redirect()->route('add_restaurant');

    }

    public function postSetBanquet(Request $request,$id){

        $available=new Available();
        $available->pro_id = $id;

        $this->validate($request, [
            'date' => 'required|date',
            'time_from' => 'required',
            'time_to' => 'required',

        ]);


        $available->available_date = $request->input("date");
        $available->time_from = $request->input("time_from");
        $available->time_to = $request->input("time_to");
        $available->status="pending";
        $available->save();
        return redirect()->route('add_banquet');

    }

    public function postSetMeetinghall(Request $request,$id){

        $available=new Available();
        $available->pro_id = $id;

        $this->validate($request, [
            'date' => 'required|date',
            'time_from' => 'required',
            'time_to' => 'required',

        ]);


        $available->available_date = $request->input("date");
        $available->time_from = $request->input("time_from");
        $available->time_to = $request->input("time_to");
        $available->status="pending";
        $available->save();
        return redirect()->route('add_meetinghall');

    }







    public function postSetEditHotel(Request $request,$id){

        $availables_pro_id = \DB::table('availables')->where('id',$id)->value('pro_id');

        $check_date=$request->input("date");

        $count = \DB::table('availables')
            ->where('id',$id)
            ->where('available_date',$check_date)
            ->count();

        $count1 = \DB::table('availables')
            ->where('pro_id',$availables_pro_id)
            ->where('available_date',$check_date)
            ->count();

        if($count>0){
            $this->validate($request, [
                'date' => 'required|date',
                'daysingle' => 'required|min:0',
                'nightsingle' => 'required|min:0',
                'daydouble' => 'required|min:0',
                'nightdouble' => 'required|min:0',
                'daysuite' => 'required|min:0',
                'nightsuite' => 'required|min:0'
            ]);
        }else{
            if($count1 >0){
                $this->validate($request, [
                    'date' => 'required|date|unique:availables,available_date,'.$availables_pro_id,
                    'daysingle' => 'required|min:0',
                    'nightsingle' => 'required|min:0',
                    'daydouble' => 'required|min:0',
                    'nightdouble' => 'required|min:0',
                    'daysuite' => 'required|min:0',
                    'nightsuite' => 'required|min:0'
                ]);
            }else{
                $this->validate($request, [
                    'date' => 'required|date',
                    'daysingle' => 'required|min:0',
                    'nightsingle' => 'required|min:0',
                    'daydouble' => 'required|min:0',
                    'nightdouble' => 'required|min:0',
                    'daysuite' => 'required|min:0',
                    'nightsuite' => 'required|min:0'
                ]);
            }
        }


        Available::find($id)->update([
            'hotel_name' => $request->name,

            'available_date' => $request->date,
            'daySingle' => $request->daysingle,
            'nightSingle' => $request->nightsingle,
            'dayDouble' => $request->daydouble,
            'nightDouble' => $request->nightdouble,
            'daySuite' => $request->daysuite,
            'nightSuite' => $request->nightsuite,
        ]);

        return redirect()->route('add_hotel');

    }


    public function postSetEditApartment(Request $request,$id){

        $availables_pro_id = \DB::table('availables')->where('id',$id)->value('pro_id');

        $this->validate($request, [
            'date_from' => 'required|date',
            'date_to' => 'required|date',

        ]);

        Available::find($id)->update([
            'available_date' => $request->date_from,
            'date_to'=>$request->date_to,

        ]);

        return redirect()->route('add_apartment');

    }

    public function postSetEditRestaurant(Request $request,$id){


        $availables_pro_id = \DB::table('availables')->where('id',$id)->value('pro_id');

        $this->validate($request, [
            'date' => 'required|date',
            'time_from' => 'required',
            'time_to' => 'required',

        ]);

        Available::find($id)->update([
            'available_date' => $request->date,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,

        ]);

        return redirect()->route('add_restaurant');

    }

    public function postSetEditBanquet(Request $request,$id){


        $availables_pro_id = \DB::table('availables')->where('id',$id)->value('pro_id');

        $this->validate($request, [
            'date' => 'required|date',
            'time_from' => 'required',
            'time_to' => 'required',

        ]);

        Available::find($id)->update([
            'available_date' => $request->date,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,

        ]);

        return redirect()->route('add_banquet');

    }

    public function postSetEditMeetinghall(Request $request,$id){


        $availables_pro_id = \DB::table('availables')->where('id',$id)->value('pro_id');

        $this->validate($request, [
            'date' => 'required|date',
            'time_from' => 'required',
            'time_to' => 'required',

        ]);

        Available::find($id)->update([
            'available_date' => $request->date,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,

        ]);

        return redirect()->route('add_meetinghall');

    }







    public function deleteAvailable($id){

        \DB::table('availables')->where('id', '=', $id)->delete();

            return redirect()->back();

    }


    public function searchProperty(Request $request,$name){
        $availables = \DB::table('availables')->get();
        $data = $request->input( 'search-data' );
        if($name == 'hotels'){
            $search_hotels = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('hotels', 'products.id', '=', 'hotels.Hid')
                ->where('hotels.hotel_name','LIKE','%'.$data.'%')
                ->orWhere('hotels.hotel_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'hotels.*')
                ->orderByRaw('hotels.updated_at DESC')
                ->get();

            $count = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('hotels', 'products.id', '=', 'hotels.Hid')
                ->where('hotels.hotel_name','LIKE','%'.$data.'%')
                ->orWhere('hotels.hotel_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'hotels.*')
                ->count();

            return view('Property.search_results',['search_hotels'=>$search_hotels,'name'=>$name,'availables'=>$availables,'count'=>$count]);
        }

        if($name == 'apartments'){
            $search_apartments = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('apartments', 'products.id', '=', 'apartments.Aid')
                ->where('apartments.apartment_name','LIKE','%'.$data.'%')
                ->orWhere('apartments.apartment_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'apartments.*')
                ->orderByRaw('apartments.updated_at DESC')
                ->get();

            $count = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('apartments', 'products.id', '=', 'apartments.Aid')
                ->where('apartments.apartment_name','LIKE','%'.$data.'%')
                ->orWhere('apartments.apartment_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'apartments.*')
                ->count();

            return view('Property.search_results',['search_apartments'=>$search_apartments,'name'=>$name,'availables'=>$availables,'count'=>$count]);
        }


        if($name == 'restaurants'){
            $search_restaurants = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('restaurants', 'products.id', '=', 'restaurants.Rid')
                ->where('restaurants.restaurant_name','LIKE','%'.$data.'%')
                ->orWhere('restaurants.restaurant_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'restaurants.*')
                ->orderByRaw('restaurants.updated_at DESC')
                ->get();

            $count = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('restaurants', 'products.id', '=', 'restaurants.Rid')
                ->where('restaurants.restaurant_name','LIKE','%'.$data.'%')
                ->orWhere('restaurants.restaurant_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'restaurants.*')
                ->count();

            return view('Property.search_results',['search_restaurants'=>$search_restaurants,'name'=>$name,'availables'=>$availables,'count'=>$count]);
        }

        if($name == 'banquets'){
            $search_banquets = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('banquets', 'products.id', '=', 'banquets.Bid')
                ->where('banquets.banquet_name','LIKE','%'.$data.'%')
                ->orWhere('banquets.banquet_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'banquets.*')
                ->orderByRaw('banquets.updated_at DESC')
                ->get();

            $count = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('banquets', 'products.id', '=', 'banquets.Bid')
                ->where('banquets.banquet_name','LIKE','%'.$data.'%')
                ->orWhere('banquets.banquet_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'banquets.*')
                ->count();

            return view('Property.search_results',['search_banquets'=>$search_banquets,'name'=>$name,'availables'=>$availables,'count'=>$count]);
        }

        if($name == 'meetinghalls'){
            $search_meetinghalls = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('meetinghalls', 'products.id', '=', 'meetinghalls.Mid')
                ->where('meetinghalls.meetinghall_name','LIKE','%'.$data.'%')
                ->orWhere('meetinghalls.meetinghall_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'meetinghalls.*')
                ->orderByRaw('meetinghalls.updated_at DESC')
                ->get();

            $count = \DB::table('users')
                ->join('products', 'users.id', '=', 'products.user_id')
                ->join('meetinghalls', 'products.id', '=', 'meetinghalls.Mid')
                ->where('meetinghalls.meetinghall_name','LIKE','%'.$data.'%')
                ->orWhere('meetinghalls.meetinghall_address','LIKE','%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->select('products.*', 'meetinghalls.*')
                ->count();

            return view('Property.search_results',['search_meetinghalls'=>$search_meetinghalls,'name'=>$name,'availables'=>$availables,'count'=>$count]);
        }

    }



//set available


// for rest

    public function addRestaurant(){




        $restaurants = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('restaurants', 'products.id', '=', 'restaurants.Rid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'restaurants.*')
            ->orderByRaw('restaurants.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('restaurants', 'products.id', '=', 'restaurants.Rid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'restaurants.*')
            ->count();

        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();

        return view('Property.add_new_restaurants',['restaurants' =>$restaurants,'count' =>$count,'availables' =>$availables]);
    }

    public function postAddRestaurant(Request $request){


        $this->validate($request, [
            'restaurant_name' => 'required|max:50',
            'restaurant_address' => 'required|max:150',
            'restaurant_contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'restaurant_image' => 'required',
            'restaurant_function'=>'required|max:50',
            'restaurant_capacity' =>'required|numeric|min:1'
        ]);


        $products = new Product();
        $products->name = $request->input("restaurant_name");
        $products->category = $request->input("restaurant_category");
        $products->user_id =Auth::user()->id;
        $products->save();

        if(Input::hasFile('restaurant_image')){
            $file =Input::file('restaurant_image');
            $file->move('uploads','restaurant-'.$products->id.'.jpg');
        }

        $restaurants = new Restaurant();
        $restaurants->id = $products->id;
        $restaurants->Rid = $products->id;
        $restaurants->restaurant_name = $products->name;
        $restaurants->restaurant_address = $request->input("restaurant_address");
        $restaurants->restaurant_contact = $request->input("restaurant_contact");
        $restaurants->restaurant_function = $request->input("restaurant_function");
        $restaurants->max_Capacity = $request->input("restaurant_capacity");
        $restaurants->image = 'restaurant-'.$products->id.'.jpg';
        $restaurants->save();

        return redirect()->back();

    }


    public function editRestaurant($id){

        $edit_restaurants = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('restaurants', 'products.id', '=', 'restaurants.Rid')
            ->where('user_id', Auth::user()->id)
            ->where('restaurants.Rid',$id)
            ->select('products.*', 'restaurants.*')
            ->get();

        $restaurants = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('restaurants', 'products.id', '=', 'restaurants.Rid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'restaurants.*')
            ->orderByRaw('restaurants.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('restaurants', 'products.id', '=', 'restaurants.Rid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'restaurants.*')
            ->count();
        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();


        return view('Property.edit_restaurants',['restaurants' =>$restaurants,'count' =>$count,'edit_restaurants' =>$edit_restaurants,'availables' =>$availables]);
    }

    public function postEditRestaurant(Request $request,$id){



        $this->validate($request, [
            'restaurant_name' => 'required|max:50',
            'restaurant_address' => 'required|max:150',
            'restaurant_contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'restaurant_function'=>'required|max:50',
            'restaurant_capacity' =>'required|numeric|min:1'
        ]);



        Product::find($id)->update([
            'name' => $request->restaurant_name,
        ]);

        if(Input::hasFile('restaurant_image')){
            $file =Input::file('restaurant_image');
            $file->move('uploads','restaurant-'.$id.'.jpg');
        }

        $rid = \DB::table('restaurants')->where('Rid',$id)->value('id');

        Restaurant::find($rid)->update([

            'restaurant_name' => $request->restaurant_name,
            'restaurant_address' => $request->restaurant_address,
            'restaurant_contact' => $request->restaurant_contact,
            'restaurant_function' => $request->restaurant_function,
            'max_Capacity' => $request->restaurant_capacity,
            'image' => 'restaurant-'.$id.'.jpg',

        ]);

        return redirect()->route('add_restaurant');

    }

    public function deleteRestaurant($id){

        \DB::table('products')->where('id', '=', $id)->delete();
        $rid = \DB::table('restaurants')->where('Rid',$id)->value('id');

        \DB::table('restaurants')->where('id', '=', $rid)->delete();
        \DB::table('availables')->where('pro_id', '=', $id)->delete();

        return redirect()->back();
    }



// for rest




// for banquet


    public function addBanquet(){




        $banquets = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('banquets', 'products.id', '=', 'banquets.Bid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'banquets.*')
            ->orderByRaw('banquets.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('banquets', 'products.id', '=', 'banquets.Bid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'banquets.*')
            ->count();

        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();

        return view('Property.add_new_banquet',['banquets' =>$banquets,'count' =>$count,'availables' =>$availables]);
    }

    public function postAddBanquet(Request $request){


        $this->validate($request, [
            'banquet_name' => 'required|max:50',
            'banquet_address' => 'required|max:150',
            'banquet_contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'banquet_image' => 'required',
            'banquet_price'=>'required|numeric',
            'banquet_capacity' =>'required|numeric|min:1'
        ]);


        $products = new Product();
        $products->name = $request->input("banquet_name");
        $products->category = $request->input("banquet_category");
        $products->user_id =Auth::user()->id;
        $products->save();

        if(Input::hasFile('banquet_image')){
            $file =Input::file('banquet_image');
            $file->move('uploads','banquet-'.$products->id.'.jpg');
        }

        $banquets = new Banquet();
        $banquets->id = $products->id;
        $banquets->Bid = $products->id;
        $banquets->banquet_name = $products->name;
        $banquets->banquet_address = $request->input("banquet_address");
        $banquets->banquet_contact = $request->input("banquet_contact");
        $banquets->banquet_price = $request->input("banquet_price");
        $banquets->max_Capacity = $request->input("banquet_capacity");
        $banquets->image = 'banquet-'.$products->id.'.jpg';
        $banquets->save();

        return redirect()->back();

    }


    public function editBanquet($id){

        $edit_banquets = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('banquets', 'products.id', '=', 'banquets.Bid')
            ->where('user_id', Auth::user()->id)
            ->where('banquets.Bid',$id)
            ->select('products.*', 'banquets.*')
            ->get();

        $banquets = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('banquets', 'products.id', '=', 'banquets.Bid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'banquets.*')
            ->orderByRaw('banquets.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('banquets', 'products.id', '=', 'banquets.Bid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'banquets.*')
            ->count();
        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();


        return view('Property.edit_banquet',['banquets' =>$banquets,'count' =>$count,'edit_banquets' =>$edit_banquets,'availables' =>$availables]);
    }

    public function postEditBanquet(Request $request,$id){



        $this->validate($request, [
            'banquet_name' => 'required|max:50',
            'banquet_address' => 'required|max:150',
            'banquet_contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'banquet_price'=>'required|numeric',
            'banquet_capacity' =>'required|numeric|min:1'
        ]);



        Product::find($id)->update([
            'name' => $request->banquet_name,
        ]);

        if(Input::hasFile('banquet_image')){
            $file =Input::file('banquet_image');
            $file->move('uploads','banquet-'.$id.'.jpg');
        }

        $bid = \DB::table('banquets')->where('Bid',$id)->value('id');

        Banquet::find($bid)->update([

            'banquet_name' => $request->banquet_name,
            'banquet_address' => $request->banquet_address,
            'banquet_contact' => $request->banquet_contact,
            'banquet_price' => $request->banquet_price,
            'max_Capacity' => $request->banquet_capacity,
            'image' => 'banquet-'.$id.'.jpg',

        ]);

        return redirect()->route('add_banquet');

    }

    public function deleteBanquet($id){

        \DB::table('products')->where('id', '=', $id)->delete();
        $bid = \DB::table('banquets')->where('Bid',$id)->value('id');

        \DB::table('banquets')->where('id', '=', $bid)->delete();
        \DB::table('availables')->where('pro_id', '=', $id)->delete();

        return redirect()->back();
    }



// for banquet


// for meetinghalls


    public function addMeetinghall(){




        $meetinghalls = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('meetinghalls', 'products.id', '=', 'meetinghalls.Mid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'meetinghalls.*')
            ->orderByRaw('meetinghalls.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('meetinghalls', 'products.id', '=', 'meetinghalls.Mid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'meetinghalls.*')
            ->count();

        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();

        return view('Property.add_new_meetinghall',['meetinghalls' =>$meetinghalls,'count' =>$count,'availables' =>$availables]);
    }

    public function postAddMeetinghall(Request $request){


        $this->validate($request, [
            'meetinghall_name' => 'required|max:50',
            'meetinghall_address' => 'required|max:150',
            'meetinghall_contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'meetinghall_image' => 'required',
            'meetinghall_price'=>'required|numeric',
            'meetinghall_capacity' =>'required|numeric|min:1'
        ]);


        $products = new Product();
        $products->name = $request->input("meetinghall_name");
        $products->category = $request->input("meetinghall_category");
        $products->user_id =Auth::user()->id;
        $products->save();

        if(Input::hasFile('meetinghall_image')){
            $file =Input::file('meetinghall_image');
            $file->move('uploads','meetinghall-'.$products->id.'.jpg');
        }

        $meetinghalls = new Meetinghalls();
        $meetinghalls->id = $products->id;
        $meetinghalls->Mid = $products->id;
        $meetinghalls->meetinghall_name = $products->name;
        $meetinghalls->meetinghall_address = $request->input("meetinghall_address");
        $meetinghalls->meetinghall_contact = $request->input("meetinghall_contact");
        $meetinghalls->meetinghall_price = $request->input("meetinghall_price");
        $meetinghalls->max_Capacity = $request->input("meetinghall_capacity");
        $meetinghalls->image = 'meetinghall-'.$products->id.'.jpg';
        $meetinghalls->save();

        return redirect()->back();

    }


    public function editMeetinghall($id){

        $edit_meetinghalls = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('meetinghalls', 'products.id', '=', 'meetinghalls.Mid')
            ->where('user_id', Auth::user()->id)
            ->where('meetinghalls.Mid',$id)
            ->select('products.*', 'meetinghalls.*')
            ->get();

        $meetinghalls = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('meetinghalls', 'products.id', '=', 'meetinghalls.Mid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'meetinghalls.*')
            ->orderByRaw('meetinghalls.updated_at DESC')
            ->paginate(3);

        $count = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('meetinghalls', 'products.id', '=', 'meetinghalls.Mid')
            ->where('user_id', Auth::user()->id)
            ->select('products.*', 'meetinghalls.*')
            ->count();
        $availables = \DB::table('availables')->orderByRaw('available_date ASC')->get();


        return view('Property.edit_meetinghall',['meetinghalls' =>$meetinghalls,'count' =>$count,'edit_meetinghalls' =>$edit_meetinghalls,'availables' =>$availables]);
    }

    public function postEditMeetinghall(Request $request,$id){


        $this->validate($request, [
            'meetinghall_name' => 'required|max:50',
            'meetinghall_address' => 'required|max:150',
            'meetinghall_contact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'meetinghall_price'=>'required|numeric',
            'meetinghall_capacity' =>'required|numeric|min:1'
        ]);






        Product::find($id)->update([
            'name' => $request->meetinghall_name,
        ]);

        if(Input::hasFile('meetinghall_image')){
            $file =Input::file('meetinghall_image');
            $file->move('uploads','meetinghall-'.$id.'.jpg');
        }

        $mid = \DB::table('meetinghalls')->where('Mid',$id)->value('id');




        Meetinghalls::find($mid)->update([

            'meetinghall_name' => $request->meetinghall_name,
            'meetinghall_address' => $request->meetinghall_address,
            'meetinghall_contact' => $request->meetinghall_contact,
            'meetinghall_price' => $request->meetinghall_price,
            'max_Capacity' => $request->meetinghall_capacity,
            'image' => 'meetinghall-'.$id.'.jpg',

        ]);



        return redirect()->route('add_meetinghall');

    }

    public function deleteMeetinghall($id){

        \DB::table('products')->where('id', '=', $id)->delete();
        $mid = \DB::table('meetinghalls')->where('Mid',$id)->value('id');

        \DB::table('meetinghalls')->where('id', '=', $mid)->delete();
        \DB::table('availables')->where('pro_id', '=', $id)->delete();

        return redirect()->back();
    }



// for meetinghalls



//multiple image upload

public function getViewGallery($id){

    $images = \DB::table('files')
        ->where('pro_id', $id)
        ->paginate(6);

    $count = \DB::table('files')
        ->where('pro_id', $id)
        ->count();


    return view('Property.view_gallery',['images'=>$images],['pro_id'=>$id,'count'=>$count]);
}


public function postGallery(Request $request,$id){
    if($request->hasFile('file')){

        foreach ($request->file as $file){

            $image =new File();
            $image->name='hotel-'.$image->id.'.jpg';
            $image->description=$request->input("description");
            $image->pro_id=$id;
            $image->save();
            $file->move('gallery','hotel-'.$image->id.'.jpg');


            File::find($image->id)->update([
                'name' => 'hotel-'.$image->id.'.jpg',
            ]);
        }

    }
    return redirect()->back();
}


    public function deleteGallery($id){

        \DB::table('files')->where('id', '=', $id)->delete();

        return redirect()->back();
    }

//multiple image upload



}

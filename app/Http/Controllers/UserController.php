<?php

namespace App\Http\Controllers;

use App\User;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    public function cus_register(Request $request){
        $user=new User();
        $validator = Validator::make($request->all(), [
            'cemail' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'cname' => 'required|string|max:50',
            'caddress' => 'required',
            'ccontact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'cpassword' =>  'required|min:8|required_with:cpass|same:cpass',
            'cpass' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
          /*Session::flash('error', $validator->messages()->first());
             return redirect()->back()->withInput();*/
       }

        $name=$request['cname'];
        $email=$request['cemail'];
        $address=$request['caddress'];
        $contact=$request['ccontact'];
        $password=bcrypt($request['cpassword']);

        $user->name=$name;
        $user->email=$email;
        $user->address=$address;
        $user->contact=$contact;
        $user->role='customer';
        $user->password=$password;

        $user->save();

        Auth::login($user);

        return redirect()->back();
    }

    public function pro_register(Request $request){
        $user=new User();
        $validator = Validator::make($request->all(), [
            'pemail' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'pname' => 'required|string|max:50',
            'paddress' => 'required|string|max:150',
            'pcontact' => 'required|size:10|regex:/(0)[0-9]{9}/',
            'ppassword' => 'required|min:8|required_with:ppass|same:ppass',
            'ppass' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
           /* Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();*/
       }

        $name=$request['pname'];
        $email=$request['pemail'];
        $address=$request['paddress'];
        $contact=$request['pcontact'];
        $password=bcrypt($request['ppassword']);

       
        $user->name=$name;
        $user->email=$email;
        $user->address=$address;
        $user->contact=$contact;
        $user->role='owner';
        $user->password=$password;

        $user->save();

        Auth::login($user);

        return redirect()->back();
    }

    public function login(Request $request){
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            if((Auth::user()->role)=='admin'){
                return redirect()->route('admin');
            }
            return redirect()->route('home');
        }
        else{
            return redirect()->route('home')->with('error','User Not Found');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

 public function profile(){

     $availables = \DB::table('availables')
         ->join('products', 'availables.pro_id', '=', 'products.id')
         ->where('products.user_id', Auth::user()->id)
         ->select('availables.*', 'products.*')
         ->get();

         $tab='profile';
         $tc=Reservation::where('cid','=',Auth::user()->id)->count();
         $bookings=Reservation::where('cid','=',Auth::user()->id)->orderBy('created_at','desc')->paginate(1, ['*'], 'p1');
          return view('profile',['availables'=>$availables,'tc'=>$tc,'bookings'=>$bookings,'tab'=>$tab]);
         }

    public function editProfile(){

        $availables = \DB::table('availables')
            ->join('products', 'availables.pro_id', '=', 'products.id')
            ->where('products.user_id', Auth::user()->id)
            ->select('availables.*', 'products.*')
            ->get();

        $tab='profile';

        return view('edit_profile',['availables'=>$availables,'tab'=>$tab]);
    }



    public function postEditProfile(Request $request){

        $user_id=Auth::user()->id;

        if(Input::hasFile('user_image')){
            $file =Input::file('user_image');
            $file->move('uploads','user-'.$user_id.'.jpg');
        }

        User::find($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'contact' => $request->contact,
            'avatar' => 'user-'.$user_id.'.jpg',
        ]);

        return redirect()->route('profile');
    }

    public function update_avatar(Request $request){
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
       }
        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);
        $user->avatar = $avatarName;
        $user->save();

        return back() 
            ->with('success','You have successfully upload image.');

    }
    public function Aupdate(Request $request){
        $validator = Validator::make($request->all(), [
            'cname' => 'required|string|max:50',
            'caddress' => 'required',
            'ccontact' => 'required|size:10|regex:/(0)[0-9]{9}/'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
       }
        $id=$request['id'];
        $name=$request['cname'];
        $email=Auth::user()->email;
        $address=$request['caddress'];
        $contact=$request['ccontact'];
        //$password=bcrypt($request['cpassword']);

        $user=new User();
        $user = User::where('id','=',$id)->first();
        $user->name=$name;
        $user->email=$email;
        $user->address=$address;
        $user->contact=$contact;
        $user->role='admin';
        //$user->password=$password;
        Auth::login($user);
        $user->save();
        return back();  
    }
    public function password(Request $request){
        request()->validate([
            'cpassword' =>  'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);

        $user=new User();
        $id=$request['parameter'];
        $password=bcrypt($request['cpassword']);
        $user = User::where('id','=',$id)->first();
        $user->password=$password;
        Auth::login($user);
        $user->save();
        return back()->with("successfully updated password");  
    }

}
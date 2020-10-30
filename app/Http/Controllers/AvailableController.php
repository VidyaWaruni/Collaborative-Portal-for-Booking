<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Available;
use DB;
use Carbon\carbon;

class AvailableController extends Controller
{
    public function index(Request $request)
    {
        $proNo=new Product();
        Available::where('available_date', '<', Carbon::now())->delete();
        Available::where('luxury','=',0)->where('semi','=',0)->where('eco','=',0)->delete();
        //need to delete for single and boble see tha other part and and do it later
        $proNo = $request->parameter;
        $name = $request->parameter2;
        $category = 'hotels';
        return view('availables.wedit',compact('proNo',$proNo))->with('category',$category)->with('name',$name);
    }
    public function available(Request $request){
        $category=$request['parameter'];
        $available=new Available();
        $available->pro_id = $request->input("ppid");
        if($category=='hotels'){
            request()->validate([
                'date' => 'required|date|after_or_equal:today|unique:availables,available_date,'.$available->pro_id,
                'day' => 'required',
                'night' => 'required',
                'luxury' => 'required',
                'semi' => 'required',
                'eco' => 'required',
                'single' => 'required',
                'double' => 'required'
           ]);
           $available->available_date = $request->input("date");
           $available->day = $request->input("day"); 
           $available->night = $request->input("night");
           $available->luxury = $request->input("luxury");
           $available->semi = $request->input("semi");
           $available->eco = $request->input("eco");
           $available->single = $request->input("single");
           $available->double = $request->input("double");
        }
        if($category=='restuarents'){
            request()->validate([
                'date' => 'required|date|after_or_equal:today',
                'Tfrom' => 'required',
                'Tto' => 'required',
           ]);
           $available->available_date = $request->input("date");
           $available->time_from = $request->input("Tfrom");
           $available->time_to=$request->input("Tto");;
        }
        if($category=='meetinghalls'){
            request()->validate([
                'date' => 'required|date|after_or_equal:today',
                'Tto' => 'required|after:Tfrom',
           ]);
           $available->available_date = $request->input("date");
           $available->time_from = $request->input("Tfrom");
           $available->time_to=$request->input("Tto");;
        }
        if($category=='apartments'){
            request()->validate([
                'date' => 'required|date|after_or_equal:today',
           ]);
           $available->available_date = $request->input("date");
        }

        $available->status="pending";
        $available->save();

            return back()->with('success','Successfully placed a Avilable Dates and Time.');
    
    }
    public function Availableedit(Request $request){
        $name = $request->parameter2;
        $id = $request->parameter;
        $category = $request->parameter1;
        $dates = DB::table('availables')->where('pro_id','=',$id)->get();
        return view('availables.edit')->with('name',$name)->with('dates',$dates)->with('category',$category);
    }
    public function showupdate(Request $request){
        $id = $request['parameter'];
        $category = $request['category'];
        $data = Available::where('id','=',$id)->first();
        return view('availables.show')->with('id',$id)->with('category',$category)->with('data',$data);
    }
    public function Availableupdate(Request $request){
        $id = $request['parameter'];
        $category=$request['category'];
        $available = Available::where('id','=',$id)->first();
        if($category=='hotels'){
            request()->validate([
                'date' => 'required|date',
                'day' => 'required',
                'night' => 'required',
                'luxury' => 'required',
                'semi' => 'required',
                'eco' => 'required',
                'single' => 'required',
                'double' => 'required'
           ]);
           $available->available_date = $request->input("date");
           $available->day = $request->input("day"); 
           $available->night = $request->input("night");
           $available->luxury = $request->input("luxury");
           $available->semi = $request->input("semi");
           $available->eco = $request->input("eco");
           $available->single = $request->input("single");
           $available->double = $request->input("double");
        }
        if($category=='restuarents'){
            request()->validate([
                'date' => 'required|date',
                'Tfrom' => 'required',
                'Tto' => 'required',
           ]);
           $available->available_date = $request->input("date");
           $available->time_from = $request->input("Tfrom");
           $available->time_to=$request->input("Tto");;
        }
        if($category=='meetinghalls'){
            request()->validate([
                'date' => 'required|date',
                'Tfrom' => 'required',
                'Tto' => 'required',
           ]);
           $available->available_date = $request->input("date");
           $available->time_from = $request->input("Tfrom");
           $available->time_to=$request->input("Tto");;
        }
        if($category=='apartments'){
            request()->validate([
                'date' => 'required|date'
           ]);
           $available->available_date = $request->input("date");
        }

        $available->status="pending";
        $available->save();
            return redirect()->route('products.index')->with('success','Successfully Update a Avilable Dates and Time.');
    }
    public function Availablesdestroy(Request $request){
        $id = $request['parameter'];
        $availables=DB::table('availables')->where('id','=',$id);
        $availables->delete();
        return redirect()->route('products.index')->with('success','Successfully Deleted the Avilable Dates and Time.');
    }

}

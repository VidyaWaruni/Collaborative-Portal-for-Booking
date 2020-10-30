<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $id = $request['parameter'];
        $images = Image::orderBy('created_at', 'desc')->where('Pid','=',$id)->paginate(8);
        return view('image.index', compact('images'))->with('id',$id);
    }

    public function create(Request $request)
    {
        $id = $request['parameter'];
            return view('image.form')->with('id',$id);
    }
    public function store(Request $request)
{

    $this->validate($request, [
       'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'Caption' => 'required',
        'Description'  => 'required'
   ]);
 
   if($request->hasfile('file'))
         {
                $img = $request->file('file');
                $name=$img->getClientOriginalName();
                $img->move(public_path().'/prop/', $name);  
                $data = $name;  
         
        $image= new Image();
        $image->file=$data;
        $image->Pid=$request->input("id");
        $image->Description = $request->input("Description");
        $image->Caption = $request->input("Caption");
        $image->save();
            return back()->with('success', 'Your images has been successfully');  
    }
}
public function delete(Request $request,Image $image)
{
    $id = $request['parameter'];
    $image = Image::where('id','=',$id)->first();
    $image->delete();
   return back()->with('success','Product deleted successfully');
}

    public function update(Request $request,Image $image){
        $id = $request['parameter'];
        $image = Image::where('id','=',$id)->first();
return view('image.edit')->with('id',$id)->with('image',$image);
    }

    public function edit(Request $request)
    {
     $this->validate($request, [
            'Caption' => 'required',
             'Description'  => 'required'
       ]);          
        $id = $request->input('id');
             $image= Image::where('id','=',$id)->first();
             $image->Description = $request->input("Description");
             $image->Caption = $request->input("Caption");
             $image->save();
                 return back()->with('success', 'Your images has been successfully updated');  
         }
}

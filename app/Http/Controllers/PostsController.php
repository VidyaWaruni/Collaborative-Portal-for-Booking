<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use DB;
class PostsController extends Controller
{
    public function getcomment(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'comment'=>'required',
        ]);
       $comment=new Comment();
       $comment->name = $request->input("name");
       $comment->email = $request->input("email");
       $comment->message = $request->input("comment");
       $comment->status="to be sent";
       $comment->save();

       return back()->with('success','Comment created submitted.');

    }
    public function index() 
    {
        $tab='blog';
        $posts = Comment::query()->orderBy('created_at','desc')->paginate(5);
        return view('posts.layout',['tab'=>$tab])->with('posts',$posts);
    }
    public function reply(Request $request)
    {
        $id = $request['parameter'];
        $posts = Comment::where('id','=',$id)->first();
        $posts->reply=$request->input("reply");
        $posts->status="sent";
        echo $posts;
        $posts->save();
        return back();
    }
 



}

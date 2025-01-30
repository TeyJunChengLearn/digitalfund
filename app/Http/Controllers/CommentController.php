<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(request $request){
        // dd($request->all());
        $articleID=$request->article;
        $comments=Comment::where("comment_id",$articleID)->get();
        return view('comments',compact('articleID','comments'));
    }

    public function comment(request $request){
        Comment::create([
            'comment'=>$request->comment,
            'user_id'=>Auth::id(),
            'comment_id'=>$request->articleID,
        ]);

        return redirect()->back();
    }
}

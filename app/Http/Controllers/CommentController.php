<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id){
        $user=Auth::user();

        $comment=new Comment();
        $comment->user_id=$user->id;
        $comment->serie_id=$id;
        $comment->content=$request->get('content');
        $comment->note=$request->get('note');
        $comment->validated=0;
        $comment->save();
        return redirect()->route('serie.detail',[$id]);
    }
}

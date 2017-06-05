<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(CommentRequest $request) {
        Auth::user()->comments()->create($request->all());
        flash()->success('Your comment has been posted');

        return redirect('articles');
//        return redirect();
    }
    
    public function destroy($id) {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        flash()->success('Your comment has been deleted');

        return redirect();
    }
}

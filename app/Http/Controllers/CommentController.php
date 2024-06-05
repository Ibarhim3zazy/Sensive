<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(StorCommentRequest $request) {
        $data = $request->validated();
        Comment::create($data);
        return back()->with('storeCommentStatus', 'your Comment has been published successfully');
    }

}

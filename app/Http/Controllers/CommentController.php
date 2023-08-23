<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Thread $thread, Request $request) {

        $request->validate([
            'body' => ['required','string','max:300']
        ]);

        $thread->comments()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id
        ]);

        return redirect()
        ->route('thread')
        ->with(['message' => 'コメントを行いました。',
               'status' => 'info']);
    }
}

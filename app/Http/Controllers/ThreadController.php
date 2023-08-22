<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;
use App\Models\Nice;



class ThreadController extends Controller
{
    public function index() {
        return view('thread.index');
    }

    public function create() {
        return view('thread.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required','string','max:30'],
            'body' => ['required','string','max:300']
        ]);

       

        $thread =  DB::transaction(function () use ($request) {
            $thread = $request->user()->threads()->create([
                'title' => $request->title,
            ]);
    
            $thread->comments()->create([
                'body' => $request->body,
                'user_id' => $request->user()->id
            ]);


            return $thread;
        });
    
        return redirect()->route("thread.show", $thread);

    }

    public function show(Thread $thread)
    {
        $comments = $thread->comments()->with(['user'])->paginate(20);
        $user = Auth::user();
        $nice = Nice::where('thread_id', $thread->id)->where('user_id', auth()->user()->id)->first();
        
        return view('thread.show', [
            'thread' => $thread,
            'comments' => $comments,
            'user' => $user,
            'nice' => $nice
        ]);
    }
}

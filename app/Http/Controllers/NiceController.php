<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nice;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    public function nice(Thread $thread){
        $nice = New Nice();
        $nice->thread_id = $thread->id;
        $nice->user_id = Auth::user()->id;
        $nice->save();
        
        return back();
    }

    public function unnice(Thread $thread){
        $user = Auth::user()->id;
        $nice = Nice::where('thread_id', $thread->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Thread;

class Nice extends Model
{
    use HasFactory;

    // いいね機能
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function threads() {
        return $this->belongsTo(Thread::class);
    }
}

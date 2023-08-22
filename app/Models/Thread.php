<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
use App\Models\Nice;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
       'title'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // いいね機能
    public function nices(){
        return $this->hasMany(Nice::class);
    }
}

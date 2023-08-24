<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Nice;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', // コメント
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    

    // いいね機能
    public function nices(){
        return $this->hasMany(Nice::class);
    }
}

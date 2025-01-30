<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = [
        'comment',
        'user_id',
        'comment_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id',"id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment_Authorization extends Model
{
    use HasFactory;

    protected $table = 'comments_authorization';

    protected $fillable = [
       'content',
       'note',
       'user_id',
    ];

    protected $hidden = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

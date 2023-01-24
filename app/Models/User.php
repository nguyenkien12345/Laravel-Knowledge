<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\Comment;
use Cache;

class User extends Authenticatable implements MustVerifyEmail
{
    // Bô sung thư viện xóa mềm
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'rememberToken',
        'email_verified_at',
        'device_token',
        'mobile',
        'otp',
        'image'
    ];

    protected $hidden = [
        'password',
        'rememberToken'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function checkUserIsOnline(){
        return Cache::has('user-is-online-' . $this->user_id);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    protected $fillable = [
       'title',
       'description',
       'content',
       'image',
       'view_counts',
       'new_post',
       'highlight_post',
       'slug',
       'user_id',
       'category_id'
    ];

    protected $hidden = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'post_id');
    }

    // Trả về đường dẫn hình ảnh
    public function imageUrl(){
        return '/image/post/' . $this->image;
    }
}

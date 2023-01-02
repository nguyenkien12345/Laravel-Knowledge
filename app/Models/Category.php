<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
       'name',
       'slug'
    ];

    protected $hidden = [];

    public function posts(){
        return $this->hasMany(Post::class, 'category_id', 'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text', 'category_id', 'file_path', 'id']; 

    public function category() 
    {
        return $this->belongsTo(Category::class);
        return $this->belongsToMany(Category::class, 'enroll', 'posts_id', 'categories_id');

    }

    
}

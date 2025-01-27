<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $table = 'enroll';
    protected $fillable = [
        'posts_id',
        'categories_id',
    ];
}

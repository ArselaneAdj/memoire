<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    
    protected $fillable = [
        'cour',
        'email',
        'file_path'
    ];
}

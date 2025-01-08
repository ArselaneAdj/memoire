<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentEval extends Model
{
    protected $fillable = [
        'name',
        'email',
        'file_path'
    ]; }

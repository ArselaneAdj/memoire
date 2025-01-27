<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Ramsey\Uuid\Type\Integer;

class Category extends Model
{
    
    use HasFactory, Searchable;
    
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'adresse',
        'note',
        'birthdate',
        'number'
    ]; 

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'enroll', 'categories_id', 'posts_id');
    }

    public function toSearchableArray()
{
    return array_merge($this->toArray(),[
        'name' =>  $this->name,
        'email' =>  $this->email,
        'adresse' =>  $this->adresse,
        'role' =>  $this->role,
        'birthdate' =>  $this->birthdate,
        'number' =>  $this->number,
    ]);
}
}

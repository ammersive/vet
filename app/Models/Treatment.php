<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ["name"];

    public function animals()
    {
    // treatments have a many to many relationship with animals
    return $this->belongsToMany(Animal::class);
    }
}

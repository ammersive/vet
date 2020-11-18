<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    
    protected $fillable = ["name", "type", "date_of_birth", "weight", "height", "biteyness", "owner_id"];
   
    // use singular, as an animal only has one owner   
    public function owner()
    {
    // a comment belongs to an article
        return $this->belongsTo(Owner::class);
    }

    public function dangerous()
    {
        return $this->biteyness >= 3; 
    }
}

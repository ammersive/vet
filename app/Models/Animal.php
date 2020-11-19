<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    
    // protected $fillable = ["name", "type", "date_of_birth", "weight", "height", "biteyness", "owner_id"];
    protected $fillable = ["name", "type", "date_of_birth", "weight", "height", "biteyness"];

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

    public function treatments()
    {
    // animals have a many to many relationship with treatments
    return $this->belongsToMany(Treatment::class);
    }

    // just accept an array of strings
    // we don't want to pass request in as there's no reason models should know about about the request
    public function setTreatments(array $strings) : Animal
    {
        $treatments = Treatment::fromStrings($strings);
        // pass in collection of IDs
        $this->treatments()->sync($treatments->pluck("id"));
        // return $this in case we want to chain
        return $this;
    }
}

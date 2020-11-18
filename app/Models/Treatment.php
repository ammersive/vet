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

    public static function fromStrings(array $strings) : Collection
    {
        // Take an array of strings and turn it into a Collection. Use map to remove any whitespace from either side of each string. Unique to make sure that there aren’t any duplicate strings. Use the Model’s firstOrCreate method to find a matching Treatment in the database or create a new one if one doesn’t exist. Returns a collection containing all the relevant Treatment models from the databas
        return collect($strings)->map(fn($str) => trim($str))
        ->unique()
        ->map(fn($str) => Treatment::firstOrCreate(["name" => $str]));       
    }

}

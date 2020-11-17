<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Owner extends Model
{   
    protected $fillable = ["first_name", "last_name", "telephone", "email", "address_1", "address_2", "town", "postcode"];

    use HasFactory;

    public function fullName()
    {    
        return $this->first_name . " " . $this->last_name;   
    }

    public function fullAddress()
    {   
        $addressString = "";

        if ($this->address_1) {
            $addressString .= $this->address_1 . ", ";     
        }
        if ($this->address_2) {
            $addressString .= $this->address_2 . ", ";      
        }
        if ($this->town) {
            $addressString .= $this->town . ", ";      
        }
        if ($this->postcode) {
            $addressString .= $this->postcode;     
        }

        return $addressString;

        // return "{$this->address_1}, {$this->address_2}, {$this->town}, {$this->postcode}";   
    }

    public function formattedPhoneNumber()
    {   
        $this->telephone = substr_replace($this->telephone, " ", 4, 0);
        $this->telephone = substr_replace($this->telephone, " ", 8, 0);
        return $this->telephone;   
    }

    public static function haveWeBananas($number)
    {
        if ($number === 0) {
            return "No we have no bananas";
        }
        if ($number === 1) {
            return "Yes we have 1 banana";
        }

        return "Yes we have {$number} bananas";
    }

    // Checks if an owner with a given email address already exists
    public static function checkByEmail($email)
    {             
        return DB::table('owners')->where('email', $email)->get()->isNotEmpty(); 
    }

    public function validPhoneNumber()
    {
        return preg_match("/(^[0-9-+\s]{11,16}$)/", $this->telephone) === 1; 
    }

    // plural, as an article can have multiple comments
    public function animals()
    {
        // use hasMany relationship method
        return $this->hasMany(Animal::class);
    }
}
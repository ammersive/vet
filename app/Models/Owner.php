<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
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
}
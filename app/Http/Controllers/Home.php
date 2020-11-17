<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class Home extends Controller
{
    public function index()
    {   
        $now = date("h:i:sa");
        $noon = "00:00:00pm";
        $eve = "07:00:00pm";

        $message = "Good ";

        if (substr($now, -2) === "am") {
            $message .= "Morning!";
            return view("greeting", ["message" => $message]);
        }
        else if ($now < $eve) {
            $message .= "Afternoon!";
            return view("greeting", ["message" => $message]);
        }
        else {
            $message .= "Evening!";
            return view("greeting", ["message" => $message]);
        } 
    }
}

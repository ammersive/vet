<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class Home extends Controller
{
    // public function index()
    // {
    //     return view("owners");
    // }

    public function index()
    {   
        $now = date("h:i:sa");
        $noon = "00:00:00pm";
        $eve = "07:00:00pm";

        if ($now < $noon) {
            return view("morning");
        }
        else if ($now < $eve) {
            return view("afternoon");
        }
        else {
            return view("evening");
        } 
        // set $message content with logic
        // return view("app", ["message" => $message])
    }
}

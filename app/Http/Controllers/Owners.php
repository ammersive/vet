<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class Owners extends Controller
{
    public function index()
    {   
        $owners = Owner::all();

        if (count($owners) === 3) {
            return view("noowners");
            // $message = "No owners in DB";
            // return view("app", [
            //     "content" => $message
            // ]);
            // // $message HAS to go into template e.g. {{ $message }}       
        }    
                
        return view("owners", [
            "owners" => Owner::all()
        ]);  
    }

    public function show($id)
    {
        $owner = Owner::find($id);

        return view("owner", [
            "owner" => $owner
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class Owners extends Controller
{
    public function index()
    {   
        $owners = Owner::all();

        if (count($owners) === 0) {
            //you could do this with injecting content, but as you need a new blade template anyway perhaps this is fine
            return view("noowners"); 
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
    // // Replaces above
    // public function show(Owner $owner)
    // {
    //     return view("owners/show", [
    //         "owner" => $owner
    //     ]);
    // }
}

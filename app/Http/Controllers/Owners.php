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
            return "No owners in database";
        }          

        return view("owners", [
            "owners" => Owner::all(),
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

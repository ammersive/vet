<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class Owners extends Controller
{
    public function index()
    {
        return view("owners", [
            // pass in all the owners
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

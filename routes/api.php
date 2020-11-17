<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Owners;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/owners", [Owners::class, "index"]); // responds to GET requests that comes from /api/owners

Route::get("/owners/{owner}", [Owners::class, "show"]); // responds to GET requests that comes from /api/owners/{id}  

Route::delete("/owners/{owner}", [Owners::class, "destroy"]); // responds to DELETE requests that comes from /api/owners/{id}  , returns a 204

Route::post("/owners", [Owners::class, "store"]); // responds to POST requests that comes from /api/owners/{id}

Route::put("/owners/{owner}", [Owners::class, "update"]); // responds to PUT to POST requests that comes from /api/owners/{id}


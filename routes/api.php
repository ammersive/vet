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

Route::group(["prefix" => "owners"], function () {

    Route::get("", [Owners::class, "index"]); // responds to GET requests that comes from /api/owners
    Route::post("", [Owners::class, "store"]); // responds to POST requests that comes from /api/owners/{id}

    Route::group(["prefix" => "{owner}"], function () {
        Route::get("", [Owners::class, "show"]); // responds to GET requests that comes from /api/owners/{id}  
        Route::delete("", [Owners::class, "destroy"]); // responds to DELETE requests that comes from /api/owners/{id}  , returns a 204
        Route::put("", [Owners::class, "update"]); // responds to PUT to POST requests that comes from /api/owners/{id}
    });
});

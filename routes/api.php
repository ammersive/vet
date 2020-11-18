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
    Route::post("", [Owners::class, "store"]); // POST from /api/owners/{id}

    Route::group(["prefix" => "{owner}"], function () {
        Route::get("", [Owners::class, "show"]); // GET /api/owners/{id}  
        Route::put("", [Owners::class, "update"]); // PUT /api/owners/{id}
        Route::delete("", [Owners::class, "destroy"]); // DELETE /api/owners/{id}, returns a 204

        Route::group(["prefix" => "{animals}"], function () {
            Route::get("", [Animals::class, "index"]); // GET /api/owners/owner_id/animals
            Route::post("", [Animals::class, "store"]); // POST /api/owners/owner_id/animals
            
            Route::group(["prefix" => "{animal}"], function () {
                Route::get("", [Animals::class, "show"]); // GET /api/owners/owner_id/animals/{id} 
                Route::put("", [Animals::class, "update"]); // PUT /api/owners/owner_id/animals/{id} 
                Route::delete("", [Animals::class, "destroy"]); // /api/owners/owner_id/animals/{id} , returns a 204
            });
        });    
    });
});

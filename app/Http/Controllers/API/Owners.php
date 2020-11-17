<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Http\Requests\API\OwnerRequest;
use App\Http\Resources\API\OwnerResource;
use App\Http\Resources\API\OwnerListResource;

class Owners extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // needs to return multiple owners
        // so we use the collection method
        return OwnerListResource::collection(Owner::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnerRequest $request)
    {        
        $data = $request->all();
        $owner = Owner::create($data);
        return new OwnerResource($owner);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner) //Route model binding
    {
        return new OwnerResource($owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnerRequest $request, Owner $owner)
    {
        $data = $request->all();
        $owner->fill($data)->save();
        return new OwnerResource($owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return response(null, 204);
    }
}

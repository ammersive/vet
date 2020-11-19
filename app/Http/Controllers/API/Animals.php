<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\API\AnimalResource;
use App\Http\Requests\API\AnimalRequest;
use App\Models\Owner;
use App\Models\Animal;
use App\Http\Resources\API\AnimalFormatResource;

class Animals extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Owner $owner)
    {
        // return all animals for a given owner
        return AnimalFormatResource::collection($owner->animals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Owner $owner)
    {
        $data = $request->all();
        $animal = new Animal($data);
        // $animal = Animal::create($data); // :: create creates a database record, needs to know owner_id
        $animal->owner()->associate($owner);
        $animal->save();
        $animal->setTreatments($request->get("treatments")); 
        return new AnimalFormatResource($animal);
    }
    // public function store(AnimalRequest $request, Owner $owner)
    // {
    //     $data = $request->all();
    //     $animal = Animal::create($data)->setTreatments($request->get("treatments"));
    //     return new AnimalResource($animal);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner, Animal $animal)
    {
        return new AnimalFormatResource($animal);
        // return $animal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Owner $owner, Animal $animal)
    // {
    //     $data = $request->all();
    //     $animal->fill($data);
    //     $animal->save();
    //     return new AnimalFormatResource($animal);
    // }
    public function update(AnimalRequest $request, Owner $owner, Animal $animal)
    {
        // return $animal;
        // update the animal first
        $data = $request->all();
        $animal->fill($data)->save();
        // use the new method - can't chain as save returns a bool
        $animal->setTreatments($request->get("treatments"));
        return new AnimalResource($animal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner, Animal $animal)
    {
        $animal->delete();
        return response(null, 204);
    }
}

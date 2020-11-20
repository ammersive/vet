<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\AnimalRequest;
use App\Http\Resources\API\AnimalResource;
use App\Http\Resources\API\AnimalFormatResource;
use App\Models\Owner;
use App\Models\Animal;

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
        // $animal_data = $request->only("name", "type", "date_of_birth", "weight", "height", "biteyness", "owner_id");
        $animal = new Animal($data); // create new animal IN MEMORY 
        $animal->owner()->associate($owner); // set owner IN MEMORY
        $animal->save(); // only now, save to the database
        $animal->setTreatments($request->get("treatments")); // now we call set treatments method on a database entry
        return new AnimalFormatResource($animal);
    }

    // ** Compare with Animal::create($data), which would create a database record, but the DB will reject this we've set up db to expect us to enforce the owner_id (which we do with associate owner)

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
        return new AnimalFormatResource($animal);
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

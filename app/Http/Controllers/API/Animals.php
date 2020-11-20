<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\AnimalRequest;
use App\Http\Resources\API\AnimalResource;
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
        // return all animals for a given owner from the database
        return AnimalResource::collection($owner->animals);  // :: indicates interacting with database
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Owner $owner)
    {
        $data = $request->all(); // could have: $animal_data = $request->only("name", "type", "date_of_birth", "weight", "height", "biteyness", "owner_id");
        $animal = new Animal($data); // ** create new animal IN MEMORY (not yet in db)
        $animal->owner()->associate($owner); // set owner IN MEMORY
        $animal->save(); // only now, after associating owner, save to the database
        $animal->setTreatments($request->get("treatments")); //  call set treatments method on what is now a database entry
        return new AnimalResource($animal);
    }

    // ** Compare with Animal::create($data), which would create a database record, but the DB will reject this we've set up db to expect us to enforce the owner_id (which we do with associate owner)

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner, Animal $animal)
    {
        $this->checkAccess($owner, $animal);
        return new AnimalResource($animal);
        // return $animal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(AnimalRequest $request, Owner $owner, Animal $animal)
    {
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

    private function checkAccess(Owner $owner, Animal $animal)
    {
        if ($owner->id !== $animal->owner_id){
            abort(403, 'This animal does not belong to this owner.');
        }
    }
}
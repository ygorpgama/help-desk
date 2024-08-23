<?php

namespace App\Repositories;

use App\Interfaces\CauseRepositoryContract;
use App\Models\Cause;

class CauseRepository implements CauseRepositoryContract{
    public function findAll()
    {
        return Cause::all();
    }

    public function findById(int $cause_id)
    {
        return Cause::where('cause_id', $cause_id)->get();
    }

    public function create(string $description){
        return Cause::create([
            "description" => $description
        ]);
    }

    public function update(Cause $cause, string $newDescription)
    {
        $cause->description = $newDescription;
        $cause->save();
        return $cause;
    }

    public function delete(Cause $cause)
    {
        $cause->delete();
        return "Sucessfully Delete!";
    }
}

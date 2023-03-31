<?php

namespace App\Services;

use App\Models\Type;
 
class TypeService
{
    public function createOrUpdateType($request,$id = NULL)
    {
        $request->validate([
            "name" => "required",
        ]);

        Type::updateOrCreate(['id' => $id],[
            'name' => $request->name,
        ]);
    }
}
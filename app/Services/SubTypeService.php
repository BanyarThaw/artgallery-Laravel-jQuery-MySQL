<?php

namespace App\Services;

use App\Models\SubType;
 
class SubTypeService
{
    public function createOrUpdateSubType($request,$id = NULL)
    {
        $request->validate([
            "name" => "required",
            "type_id" => "required",
        ]);

        SubType::updateOrCreate(['id' => $id],[
            'name' => $request->name,
            'type_id' => $request->type_id,
        ]);
    }
}
<?php

namespace App\Services;

use App\Models\Sector;
 
class SectorService
{
    public function createOrUpdateSector($request,$id = NULL)
    {
        $request->validate([
            "name" => "required",
        ]);

        Sector::updateOrCreate(['id' => $id],[
            'name' => $request->name,
        ]);
    }
}
<?php

namespace App\Services;

use App\Models\SubSector;
use Illuminate\Http\Request;
 
class SubSectorService
{
    public function createSubSector(Request $request)
    {
        $sub_sector = new SubSector();

        $sub_sector->name = $request->name;
        $sub_sector->sub_sector_logo = uploadPhoto($request->file('image'));
        $sub_sector->sector_id = $request->sector_id;
        $sub_sector->save();
    }

    public function updateSubSector(Request $request,$id) {
        $sub_sector = SubSector::find($id);

        if($request->hasFile('image')) {
            // delete old photo
            deletePhoto("public/$sub_sector->sub_sector_logo");
            $sub_sector->sub_sector_logo = uploadPhoto($request->file('image'));
        }

        $sub_sector->name = $request->name;
        $sub_sector->sector_id = $request->sector_id;
        $sub_sector->save();
    } 
}
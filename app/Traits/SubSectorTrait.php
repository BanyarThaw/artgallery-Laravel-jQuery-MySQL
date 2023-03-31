<?php

namespace App\Traits;

use App\Models\SubSector;

trait SubSectorTrait {
    public function deleteSubSectorPhoto($id) {
        $sub_sectors = SubSector::where('sector_id',$id)->get();
        
        foreach($sub_sectors as $sub_sector) {
            deletePhoto("public/$sub_sector->sub_sector_logo");
        }
    }
}
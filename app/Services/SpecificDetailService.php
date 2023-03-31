<?php

namespace App\Services;
 
use App\Models\SpecificDetail;
 
class SpecificDetailService
{
    public function createOrUpdateSpecificDetail($request,$id = NULL): SpecificDetail
    {
        $specific_detail = SpecificDetail::updateOrCreate(['id' => $id],[
            'name' => $request->name,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'sub_type_id' => $request->sub_type_id,
            'sector_id' => $request->sector_id,
            'sub_sector_id' => $request->sub_sector_id
        ]);
 
        return $specific_detail;
    }
}
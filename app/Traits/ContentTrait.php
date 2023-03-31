<?php

namespace App\Traits;

use App\Models\Content;

trait ContentTrait {
    public function get_contents($type,$id) {
        $contents = Content::whereHas('specific_detail',function($q) use ($type,$id) {
                $q->where($type,$id);
            })->leftJoin('specific_details','contents.specific_detail_id','=','specific_details.id')
            ->select('contents.*','specific_details.id','specific_details.name')
            ->orderBy('created_at','desc')
            ->paginate(12);

        return $contents;
    }
}
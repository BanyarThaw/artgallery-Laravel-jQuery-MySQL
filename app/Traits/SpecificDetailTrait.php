<?php

namespace App\Traits;

use App\Models\SpecificDetail;

trait SpecificDetailTrait {
    public function deleteContentPhoto($type,$id) {
        $specific_details = SpecificDetail::where($type,$id)->get();

        foreach($specific_details as $specific_detail) {
            foreach($specific_detail->contents as $content) {
                if($content->content_type == 'photos') {
                    deletePhoto("public/$content->value");
                }
            }
        }
    }
}
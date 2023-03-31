<?php

namespace App\Services;

use App\Models\Category;
 
class CategoryService
{
    public function createOrUpdateCategory($request,$id = NULL)
    {
        $request->validate([
            "name" => "required",
        ]);

        Category::updateOrCreate(['id' => $id],[
            'name' => $request->name,
        ]);
    }
}
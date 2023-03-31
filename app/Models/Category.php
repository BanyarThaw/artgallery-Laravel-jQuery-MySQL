<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function get_categories() {
        $categories = Category::orderBy('created_at','desc')->get();

        return $categories;
    }
}

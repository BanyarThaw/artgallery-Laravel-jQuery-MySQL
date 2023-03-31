<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function get_types() {
        $types = Type::orderBy('created_at','desc')->get();

        return $types;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function get_sectors() {
        $sectors = Sector::orderBy('created_at','desc')->get();

        return $sectors;
    }
}

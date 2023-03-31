<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSector extends Model
{
    use HasFactory;

    /**
     * Get the sector that owns the sub sector.
    */
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    /**
     * Get the specific details for sub sector.
    */
    public function specific_details()
    {
        return $this->hasMany(SpecificDetail::class);
    } 
}

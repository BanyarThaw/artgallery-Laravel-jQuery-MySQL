<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubType extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'type_id'
    ];

    /**
     * Get the category that owns the specific detail.
    */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the specific details for sub type.
    */
    public function specific_details()
    {
        return $this->hasMany(SpecificDetail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'type_id',
        'sub_type_id',
        'sector_id',
        'sub_sector_id'
    ];

    /**
     * Get the category that owns the specific detail.
    */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    /**
     * Get the type that owns the specific detail.
    */
    public function type()
    {
        return $this->belongsTo(Type::class,'type_id');
    }

    /**
     * Get the sub type that owns the specific detail.
    */
    public function sub_type()
    {
        return $this->belongsTo(SubType::class,'sub_type_id');
    }

     /**
     * Get the sector that owns the specific detail.
    */
    public function sector()
    {
        return $this->belongsTo(Sector::class,'sector_id');
    }

    /**
     * Get the sub sector that owns the specific detail.
    */
    public function sub_sector()
    {
        return $this->belongsTo(SubSector::class,'sub_sector_id');
    }

    /**
     * Get contents.
    */
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
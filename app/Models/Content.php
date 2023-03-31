<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    /**
     * Get the specific detail that owns the contents.
    */
    public function specific_detail()
    {
        return $this->belongsTo(SpecificDetail::class);
    }
}

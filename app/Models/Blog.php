<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory; 

    
    /** ===================================== @ Relationships ===================================== */

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}

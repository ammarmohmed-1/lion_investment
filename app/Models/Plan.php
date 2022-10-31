<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    /** ===================================== @ Relationships ===================================== */

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

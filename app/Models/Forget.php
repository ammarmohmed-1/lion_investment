<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forget extends Model
{
    use HasFactory;

    /** ===================================== @ Attributes ===================================== */

    public function getStatusTextAttribute()
    {
        return $this->status ? 'Password changed' : 'Password has not been changed';
    }
}

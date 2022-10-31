<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /** ===================================== @ Relationships ===================================== */

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

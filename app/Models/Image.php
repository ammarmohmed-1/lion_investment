<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

     /** ===================================== @ Relationships ===================================== */

     public function blog()
     {
         return $this->hasOne(Blog::class);
     }
     
     public function payment()
     {
         return $this->hasOne(Payment::class);
     }
}

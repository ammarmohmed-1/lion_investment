<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['status_text'];


    /** ===================================== @ Attributes ===================================== */

    public function getStatusTextAttribute()
    {
        $status_text = $this->status ?  'Has been approved' : 'Under review' ;
        return $status_text;
    }
    
    /** ===================================== @ Relationships ===================================== */

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}

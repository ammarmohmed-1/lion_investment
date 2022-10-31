<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'referral_link',
        'total_profit',
    ];


    /** ===================================== @ Attributes ===================================== */

    public function getProfitAttribute()
    {
        $price = $this->price;
        $profitInPlan = $this->plan->profit;
        $profit =  $price * ($profitInPlan / 100);
        return $profit;
    }

    public function getTotalProfitAttribute()
    {
        $origin = new DateTime($this->created_at);
        $target = new DateTime('now');
        $interval = $origin->diff($target);
        $days = $this->plan->days;
        
        $price = $this->price;
        $profitInPlan = $this->plan->profit;
        $avg = $price * ($profitInPlan / 100);
        
        $interval=(int)intval($interval->format('%a'));
        
        if ($interval < $days){
            $total_profit = $avg * $interval;
        
        }else{
            $total_profit = $avg * $days;
            
        }
        return $total_profit;
    }


    
    /** ===================================== @ Relationships ===================================== */

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
}

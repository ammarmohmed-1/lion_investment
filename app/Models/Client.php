<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DateTime;
class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'referral_link',
        'total_balance',
        'available_balance',
        'withdrawable_balance',
        'used_balance',
        'profit_from_investment',
        'profit_from_referral',
        'total_profit',
    ];


    /** ===================================== @ Attributes ===================================== */

    public function getReferralLinkAttribute() 
    {
        return $this->referral_link = route('sign-up', ['ref' => $this->id]);
    }

    public function getStatusTextAttribute()
    {
        return $this->status ? 'active' : 'inactive';
    }

    public function getTotalBalanceAttribute()
    {
        
        $deposits = $this->deposits->where('status' , '=' , true);
        $withdrawal = $this->withdrawals->where('status' , '=' , true);

        $deposit_amounts = $deposits->pluck('amount')->sum();
        $withdrawal_amounts = $withdrawal->pluck('amount')->sum();

        $total_balance = $deposit_amounts - $withdrawal_amounts;
        
        return $total_balance;
    }

    public function getAvailableBalanceAttribute()
    {
        return $this->total_balance + $this->total_profit - $this->used_balance;
    }

    public function getWithdrawableBalanceAttribute()
    {
        return $this->available_balance ;
    }

    public function getUsedBalanceAttribute()
    {
        $orders = $this->orders;
        $arr=array();
        foreach($orders as $order){
        //     $plan=$order->plan->where;
          
            $plan=Plan::find($order->plan_id);
            $origin = new DateTime($order->created_at);
            $target = new DateTime('now');
            $interval = $origin->diff($target);
            $interval=(int)intval($interval->format('%a'));
            $days = $plan->days;
            if ($interval <= $days) 
            {
                 $arr[]=$order->price;
            }
            
    }
    // var_dump($arr);
    $order_amounts=0;
    
    foreach($arr as $value){
        $order_amounts=$order_amounts+$value; 
    }    
   // var_dump($arr);
        // $order_amounts = $orders->pluck('price')->sum();
        return $order_amounts;
    }

    public function getProfitFromInvestmentAttribute()
    {
        $orders = $this->orders;
        $orders_profits = $orders->pluck('total_profit')->sum();
        return $orders_profits;
    }

    public function getProfitFromReferralAttribute()
    {
        $referrals = $this->referrals;
        $profitFromReferral = 0;
        foreach( $referrals as $referral ){
            $order = $referral->orders->first();
            if($order === null ){
                $profitFromReferral = 0;
            }
            else{
                $profitFromReferral = $profitFromReferral + ($order->price*(10/100));
            }
        }
        return $profitFromReferral;
    }

    public function getTotalProfitAttribute()
    {
        return $this->profit_from_investment + $this->profit_from_referral;
    }


    /** ===================================== @ Relationships ===================================== */

    public function referrer()
    {
        return $this->belongsTo(Client::class , 'id' , 'referrer_id');
    }

    public function referrals()
    {
        return $this->hasMany(Client::class , 'referrer_id' , 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
}

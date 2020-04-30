<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['userDetail_id','vendor_id','meal_id','price','order_id','transaction_id','payment_status'];

    public function saveOrder($user_id,$menu_id,$price,$order_id,$quantity,$vendor_id)
    {
    	$this->userDetail_id=$user_id;
    	$this->vendor_id=$vendor_id;
    	$this->meal_id=json_encode($menu_id);
    	$this->price=$price;
    	$this->order_id=$order_id;
    	$this->quantity=json_encode($quantity);
    	$this->save();
    }
    public function user()
    {
    	return $this->belongsTo('App\UserDetail');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=['User_id','Menu_id','quantity'];
    public function menu()
    {
    	return $this->belongsTo('App\Menu');
    }
    public function saveCart($userid,$menuid)
    {
    	$this->user_id=$userid;
    	$this->menu_id=$menuid;
    	$this->quantity=1;
    	$this->save();
    }
}

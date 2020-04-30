<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function state()
    {
    	return $this->belongsTo('App\State');
    }
    public function vendorDetail()
    {
        return $this->hasMany('App\VendorDetail');
    }
    public function saveData($data)
    {
    	$this->state_id=$data['state_id'];
    	$this->city_name=$data['city_name'];
    	$this->save();
    }
}

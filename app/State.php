<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable=['state_name'];
    public function city()
    {
    	return $this->hasMany('App\City');
    }
    public function vendorDetail()
    {
        return $this->hasMany('App\vendorDetail');
    }
    public function saveData($data)
    {
    	$this->state_name=$data['state_name'];
    	$this->save();
    }
}

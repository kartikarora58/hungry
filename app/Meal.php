<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable=['type'];
    public function vendorDetail()
    {
    	return $this->belongsTo('App\vendorDetail');
    }
    public function time()
    {
    	return $this->belongsTo('App\Time');
    }
    public function menu()
    {
    	return $this->hasMany('App\Menu');
    }
}

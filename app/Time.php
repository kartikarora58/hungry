<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable=['times'];
    public function vendorDetail()
    {
    	return $this->belongsTo('App\Time');
    }
    public function meal()
    {
    	return $this->hasMany('App\Meal');
    }
    public function menu()
    {
    	return $this->hasMany('App\Menu');
    }
}

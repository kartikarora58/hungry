<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable=['fname','lname','address','mobile'];
    public function user()
    {
    	return $this->belongsTo('App\user');
    }
    public function order()
    {
        return $this->hasMany('App\Order');
    }
    public function saveData($data,$id)
    {
    	$this->user_id=$id;
    	$this->fname=$data['fname'];
    	$this->lname=$data['lname'];
    	$this->mobile=$data['mobile'];
    	$this->address=$data['address'];
    	$this->save();
    }
}

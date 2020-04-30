<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VendorDetail;
class Menu extends Model
{
    protected $fillable=['vendorDetail_id','time_id','meal_id','meal_name','description','menu_image','price'];

 	public function vendorDetail()
    {
    	return $this->belongsTo('App\VendorDetail');
    }
    public function time()
    {
        return $this->belongsTo('App\Time');
    }
    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }
    public function cart()
    {
        return $this->hasMany('App\Cart');
    }
    public function saveMenu($data,$img,$vendor_id)
    {
    	$this->vendorDetail_id=$vendor_id;
    	$this->time_id=$data['time'];
    	$this->meal_id=$data['meal_type'];
    	$this->meal_name=$data['meal_name'];
    	$this->description=$data['menu_description'];
    	$this->menu_image=$img;
    	$this->price=$data['price'];
    	$this->save();
    }
}

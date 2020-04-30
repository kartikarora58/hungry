<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorDetail extends Model
{
    protected $fillable=['vendor_id','company_name','state_id','city_id','address','pincode','mobile','email','logo','off_days','about_us','contact_person','website'];

    public function saveData($data,$img,$id,$email)
    {
    	$this->vendor_id=$id;
    	$this->company_name=$data['company_name'];
        $this->state_id=$data['state'];
        $this->city_id=$data['city'];
        $this->address=$data['address'];
        $this->pincode=$data['pincode'];
        $this->mobile=$data['mobile'];
        $this->email=$email;;
        $this->logo=$img;
        $this->off_days=$data['off_days'];
        $this->meal_type=json_encode($data['meal_type']);
        $this->about_us=$data['about'];
        $this->contact_person=$data['contact_person'];
        $this->website=$data['website'];
    	
    	$this->save();
	
    }
    public function meal()
    {
        return $this->hasMany('App\Meal');
    }

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }
    public function time()
    {
        return $this->hasMany('App\Time');
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function state()
    {
        return $this->belongsTo('App\State');
    }
}

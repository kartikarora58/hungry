<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VendorDetail;
use DataTables;
use App\Menu;
use App\State;
use Response;
use App\City;
class SiteController extends Controller
{
    public function home()
    {
    	return view('frontEnd.home');
    }
    public function listing()
    {
        $states=State::all();
    	return view('frontEnd.listing',compact('states'));
    }
    public function data()
    {
        if($_GET['state_id']!='all')
        {
            $id=$_GET['state_id'];
            $vendors=VendorDetail::get()->where('status',1)->where('state_id',$id);
            if($_GET['city_id']!='all')
            {
                $city_id=$_GET['city_id'];
                $vendors=VendorDetail::get()->where('status',1)->where('state_id',$id)->where('city_id',$city_id);
            }

        }
        else
        {
    	$vendors=VendorDetail::get()->where('status',1);
    	}
        return DataTables()->of($vendors)
    					   ->addColumn('address',function($data){
    					   	$address='<p>'.$data->address.','.$data->city->city_name.','.$data->state->state_name.'</p>';
    					   	return $address;
    					   })
    					   ->addColumn('action',function($data){
                            $button='<a class="btn btn-outline-info" target="_blank" href="'.url('/detail/'.$data->id).'"  value='.$data->id.'>View Detail</a>';
                            return $button;
                            })
    					   ->rawColumns(['address','action'])
    					   ->make(true);
    					 
    }
    public function detail($id)
    {
    	$vendor=VendorDetail::get()->where('status',1)->where('id',$id)->first();
        $meals=json_decode($vendor->meal_type);
        //dd($vendor->id);
        $menus=Menu::get()->where('vendorDetail_id',$vendor->id);
    	return view('frontEnd.detail',compact('vendor','meals','menus'));
    }
    public function fetch_city($id)
    {
        $cities=City::get()->where('state_id',$id);
       // dd($cities);
        return response::json($cities);
    }
    public function contact()
    {
        return view('frontEnd.contact');
    }
}

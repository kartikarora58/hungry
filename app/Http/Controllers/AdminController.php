<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
use App\VendorDetail;
use App\Meal;
use Response;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    public function index()
    {
    	return view('admin.admin-home');
    }
    public function states()
    {
        $states=State::latest()->paginate(5);
        //dd($states);
    	return view('admin.state',compact('states'));
    }
    public function state_store(Request $request)
    {
        $state=new State();
        $state->saveData($request);
        return redirect('/admin/states');
    }
    public function state_delete($id)
    {
        $state=State::find($id);
        $state->delete();
        return redirect('/admin/states');
    }
    public function fetch_state($id)
    {
        $state=State::get()->where('id',$id)->first();
        //dd($state);
        return response::json($state);
    }
    public function updateState(Request $request)
    {
        $state=State::find($request->id);
        $state->state_name=$request->state_name;
        $state->save();
        return redirect('/admin/states');
    }
    //cities methods
    public function cities()
    {
        $states=State::all();
        return view('admin.city',compact('states'));
    }
    public function city_store(Request $request)
    {
        $city=new City();
        $city->saveData($request);
        echo("success");
    }
    public function status($id=null)
    {
        if(is_null($id))
            $vendors=VendorDetail::latest()->get()->where('status',NULL);
        else if($id==1)
            $vendors=VendorDetail::latest()->get()->where('status',1);
        else if($id==8)
            $vendors=VendorDetail::latest()->get()->where('status',8);
       // dd($vendors);
        return view('admin.status',compact('vendors'));
    }
    public function check($id)
    {
        $vendor=VendorDetail::get()->where('id',$id)->first();
        $foods=json_decode($vendor->meal_type);
        $meals=Meal::all();
        return view('admin.check',compact('vendor','foods','meals'));
    }
    public function action(Request $request)
    {
        $id=$request->id;
        $vendor=VendorDetail::get()->where('id',$id)->first();
        $status=$request->status;
        if($status=="approve")
        {
            $vendor->status=1;            
        }
        else if($status=="reject")
        {
            $vendor->status=8;
        }
        $vendor->save();
        return $this->status();
    }
}

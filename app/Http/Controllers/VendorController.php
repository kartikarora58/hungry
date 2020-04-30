<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
use Response;
use App\VendorDetail;
use App\Meal;
use App\Time;
use Illuminate\Support\Facades\Auth;
use App\Menu;
use App\Vendor;
class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }
    public function index()
    {
        return view('vendor.home');
    }
    public function state()
    {
    	return view('vendor.state');
    }
    public function create_profile()
    {
        $states=State::all();
        //$cities=City::all();
        $meals=Meal::all();
        $id=Auth::user()->id;
        $vendor=VendorDetail::get()->where('vendor_id',$id)->first();
        if(is_null($vendor))
            return view('vendor.vendor_profile',compact('states','meals'));
        else
            return redirect('/vendor/update');
    }
    public function update_profile()
    {
        $id=Auth::user()->id;
        $vendor=VendorDetail::get()->where('vendor_id',$id)->first();
        $states=State::all();
        $meals=Meal::all();
        $foods=json_decode($vendor->meal_type);
        //dd($foods);
        return view('vendor.vendor_update',compact('vendor','foods','states','meals'));
    }
    public function fetch_city($id)
    {
        $cities=City::get()->where('state_id',$id);
        return response::json($cities);
    }
   
    public function store(Request $request)//vendor profile registeration
    {
        if(is_null($request['non_veg']))
        {
            $request['non_veg']="0";
           // dd($request['non_veg']);
        }
        $file=$request->file('logo');
        $name=$file->getClientOriginalName();
        $destinationPath=public_path('/images');
        $file->move($destinationPath,$name);
        $img=$name;
        $email=Auth::user()->email;
        $data=$this->validate($request,[
            'company_name' => 'required|max:200',
            'about' => 'required',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'meal_type'=>'required',
           // 'landline'=>'required',
            'pincode'=>'required|max:6',
            'off_days'=>'nullable',
            'website'=>'nullable',
            'logo'=>'nullable',
            'contact_person'=>'required',
        ]);
      //  dd($data);
        $vendor=new VendorDetail();
        $id=Auth::user()->id;
        $vendor->saveData($data,$img,$id,$email);
        echo "success";

    }
    public function create_menu()
    {
        $id=Auth::user()->id;
        $record=VendorDetail::get()->where('vendor_id',$id)->first();
        $meal_id=json_decode($record->meal_type);
        $meals=Meal::get()->whereIn('id',$meal_id);
        $times=Time::all();
        return view('vendor.create_menu',compact('meals','times'));
        
    }
    public function store_menu(Request $request)//Menu registration
    {
        
        $file=$request->file('menu');
        $img="";
        if($file!=null)
        {
        $name=$file->getClientOriginalName();
        $destinationPath=public_path('/images');
        $file->move($destinationPath,$name);
        $img=$name;
        }      
        $data=$this->validate($request,[
            
            'time'=>'required',
            'meal_type'=>'required',
            'meal_name'=>'required',
            'menu_description'=>'required',
            'menu'=>'nullable',
            'price'=>'required',

        ]);
        $id=Auth::user()->id;
        $vendor=VendorDetail::where('vendor_id',$id)->get()->first();
        $vendor_id=$vendor->id;
        $menu=new Menu();
        $menu->saveMenu($data,$img,$vendor_id);
        echo "success";
    }
}

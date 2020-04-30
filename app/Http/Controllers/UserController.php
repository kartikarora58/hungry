<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cart;
use App\UserDetail;
use App\Order;
use App\Vendor;
use App\Menu;
use App\VendorDetail;
use PaytmWallet;
class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth',['except'=>'paymentCallback']);
    }
    public function home()
    {
        return view('user.home');
    }
    public function AddCart($id)
    {
    	$userid=Auth::user()->id;
    	$menuid=$id;
    	$cart=new Cart();
    	$cart->saveCart($userid,$menuid);
    	return redirect('/cart');
    }
    public function cart_delete($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect('/cart');
    }
    public function update_cart(Request $request)
    {
        unset($request['_token']);
        unset($request['submit']);
       // dd($request->all());
        //$ids=$request->id;
        $datas=$request->all();
        //dd($datas);
        $array=array();
        $n=sizeof($datas['id']);
        for($i=0;$i<$n;$i++)
        {
            foreach($datas as $key=>$value)
            {
            //print_r($value);
                $array[$key]=$value[$i];         
            }
            Cart::where('id', $array['id'])->update($array);
            $array=array();
        }
        return redirect('/cart');
        // dd($datas['quantity'][0]);
        // Cart::whereIn('id', $datas['id'])->update($datas);
        // $carts=Cart::all();
        // dd($cart);
    }
    public function cart()
    {
        $id=Auth::user()->id;
        $carts=Cart::get()->where('user_id',$id);
        // dd($carts);
        return view('user.cart',compact('carts'));
    }
    public function shipping()
    {
        $id=Auth::user()->id;
        $users=UserDetail::get()->where('user_id',$id);
        //dd($users);
        return view('user.profile',compact('users'));
    }
    public function add_shipping_details(Request $request)
    {
        $id=Auth::user()->id;
        if(isset($request['address_id']))
        {
            $user=UserDetail::get()->where('id',$request['address_id'])->where('user_id',$id)->first();
        }
        else
        {
            $user=new UserDetail();
            $user->saveData($request,$id);
            $user=UserDetail::where('user_id',$id)->latest()->first();
        }
        $carts=Cart::get()->where('user_id',$id);
        // dd($carts);
        return view('user.checkout',compact('user','carts'));   
    }
    public function checkout(Request $request)
    {
        //dd($request);
        $id=Auth::user()->id;
        $user_id=$request->id;
        $carts=Cart::get()->where('user_id',$id);
        $i=0;
        $menu_id=array();
        $quantity=array();
        $price=$request->price;
        foreach($carts as $cart)
        {
            $menu_id[$i]=$cart->menu_id;
            $quantity[$i]=$cart->quantity;
            ++$i;
        }
        $id=Menu::where('id',$menu_id[0])->get()->first();
        $vid=$id->vendorDetail_id;
        $vendorId=VendorDetail::where('id',$vid)->get()->first();
        $vendor_id=$vendorId->vendor_id;
        //dd($vendor_id);
        $order_id=rand(111111,999999);
        $order=new Order();
        $order->saveOrder($user_id,$menu_id,$price,$order_id,$quantity,$vendor_id);
        if($request->payment_method=="online")
        {
            $payment=PaytmWallet::with('receive');
            $payment->prepare([
                'order'=>$order_id,
                'user'=>'user@123',
                'mobile_number'=>'your paytm number',
                'email'=>'your paytm email',
                'amount'=>$price,
                'callback_url'=>url('api/payment/status')
            ]);
            return $payment->receive();
        }
        else
        {
            return redirect('/user/order_status');
        }
        
    }
    public function order_status()
    {
        $id=Auth::user()->id;
        $ids=UserDetail::get()->where('user_id',$id);
        //dd($ids);
        $userId=array();
        $j=0;
        foreach($ids as $i)
        {
            $userId[$j]=$i->id;
            $j++;
        }
       // dd($userId);
        $order=Order::whereIn('UserDetail_id',$userId)->where('payment_status','!=',1)->get()->first();
        $mealId=array();
        if(is_null($order))
        {
            $meals=array();
            
            return view('user.current',compact('meals'));
        }
        $mealId=json_decode($order->meal_id);
        $meals=Menu::whereIn('id',$mealId)->get();
       // dd($meals);
        $quantity=array();
        $quantity=json_decode($order->quantity);
        $user=UserDetail::get()->where('id',$order->userDetail_id)->first();
        $address=$user->address;
        $vendor_id="";
        foreach($meals as $meal)
        {
            $vendor_id=$meal->vendorDetail_id;
            break;
        }
       // dd($meals);
        $vendor=VendorDetail::where('id',$vendor_id)->get()->first();
        //dd($vendor);
        $vendor_name=$vendor->company_name;
       // dd($vendor_name);
        return view('user.current',compact('meals','quantity','order','address','vendor_name'));
    }
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        // dd($transaction);
        $response = $transaction->response();
        $order_id = $transaction->getOrderId();


        if($transaction->isSuccessful()){
          Order::where('order_id',$order_id)->update(['payment_status'=>2, 'transaction_id'=>$transaction->getTransactionId()]);
          return redirect('/user/order_status');

          dd('Payment Successfully Paid.');
        }else if($transaction->isFailed()){
          Order::where('order_id',$order_id)->update(['payment_status'=>1, 'transaction_id'=>$transaction->getTransactionId()]);
          dd('Payment Failed.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\City;
use App\Provicne;
use App\Feeship;
use App\Wards;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use App\Shipping;
use App\Order;
use App\OrderDetails;

class CheckouController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function confirm_order(Request $request){
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order;
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->order_code =$checkout_code;
        $order->save();



        if(Session::get('cart')){
            foreach(Session::get('cart') as $key =>$cart){
                $order_details = new OrderDetails;
                $order_details->order_code = $checkout_code;
                $order_details->product_id =$cart['product_id'];
                $order_details->product_name =$cart['product_name'];
                $order_details->product_price =$cart['product_price'];
                $order_details->product_sales_quantity =$cart['product_qty'];
                $order_details->product_coupon =$data['order_coupon'];
                $order_details->product_feeship =$data['order_fee'];
                $order_details->save();

            }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }
    public function del_fee(){
		$fee = Session::get('fee');
        if($fee==true){
            Session::forget('fee');
        }
	}
    public function caculate_fee(Request $request) {
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                    foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_ship);
                        Session::save();
                    }
                }else{
                    Session::put('fee',25000);
                    Session::save();
                }
            }
            foreach($feeship  as $key =>$fee){
                Session::put('fee',$fee->fee_feeship);
                Session::save();
            }
        }
    }
    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output ='';
            if($data['action']=="city"){
                $select_province = Provicne::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                $output.='<option >--- chọn quận huyện ---</option>';
                foreach($select_province as $key =>$province){
                $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                 }
            }else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option >--- chọn quận huyện ---</option>';
                foreach($select_wards as $key =>$ward){
                 $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                 }
            }
        }
        echo $output;
    }
    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customer.customer_name','tbl_order_details.*')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('/admin_layout')->with('admin.manage_order',$manager_order);
    }
    public function view_order($orderId){
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_details.*')->first();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('/admin_layout')->with('admin.view_order',$manager_order_by_id);
    }
   public function login_checkout(){
    $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    return view('page.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
   }
   public function add_customer(Request $request){
    $data = array();
    $data['customer_name'] = $request->customer_name;
    $data['customer_email'] = $request->customer_email;
    $data['customer_password'] = md5($request->customer_password);
    $data['customer_phone'] = $request->customer_phone;
    $customer_id = DB::table('tbl_customer')->insertGetId($data);
    Session::put('customer_id',$customer_id);
    Session::put('customer_name',$request->customer_name);
    return Redirect('/checkouts');
   }
   public function checkouts(){
    $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    $city = City::orderby('matp','ASC')->get();
    return view('page.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('city',$city);
   }
   public function save_checkout_customer(Request $request){
    $data = array();
    $data['shipping_name'] = $request->shipping_name;
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_notes'] = $request->shipping_notes;
    $data['shipping_address'] = $request->shipping_address;
    $data['shipping_phone'] = $request->shipping_phone;
    $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
    Session::put('shipping_id',$shipping_id);
    return Redirect('/payment');
   }
   public function payment(){
    $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    return view('page.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
   }
   public function order_place(Request $request){
     // insert payment_method
    $data = array();
    $data['payment_method'] = $request->payment_method;
    $data['payment_status'] = 'Đang chờ xử lí';
    $payment_id = DB::table('tbl_payment')->insertGetId($data);
    //Insert-order
    $order_data = array();
    if (Session::get('cart') == true){
        $total = 0;
    foreach (Session::get('cart') as $key => $cart){
        $subtotal = $cart['product_price'] * $cart['product_qty'];
        $total += $subtotal;
            $order_data['customer_id'] = Session::get('customer_id');
            $order_data['shipping_id'] = Session::get('shipping_id');
            $order_data['payment_id'] = $payment_id;
            $order_data['order_total'] = $total;
            $order_data['order_status'] = 'Đang chờ xử lí';
            $order_id = DB::table('tbl_order')->insertGetId($order_data);
}
}
    //insert-order-details
    if (Session::get('cart') == true){
        $total = 0;
    foreach (Session::get('cart') as $key => $carts){
        $subtotal = $carts['product_price'] * $carts['product_qty'];
        $total += $subtotal;
        $order_d_data['order_id'] = $order_id;
        $order_d_data['product_id'] =$carts['product_id'];
        $order_d_data['product_name'] = $carts['product_name'];
        $order_d_data['product_price'] =$carts['product_price'];
        $order_d_data['product_sales_quantity'] = $carts['product_qty'];
        DB::table('tbl_order_details')->insert($order_d_data);
    }
}
    if($data['payment_method']==1){
        // echo'Thanh toán thẻ ATM';
        Cart::destroy();
        Session::forget('cart');
        Session::forget('coupon');
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('page.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
    }elseif($data['payment_method']==2){
        Cart::destroy();
        Session::forget('cart');
        Session::forget('coupon');
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('page.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
    }else{
        echo'Thẻ ghi nợ';
    }
    // return Redirect::to('/payment');
   }
   public function logout_checkout(Request $request){
    // Session::flush();
    Session::put('customer_name', null);
    Session::put('cart', null);
    Session::put('coupon', null);
    Session::put('customer_id', null);
    return Redirect('login-checkout');
   }
   public function login_customer(Request $request){
    $email = $request->email_account;
    $password = md5($request->password_account);
    $result =DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();
    if($result){
        Session::put('customer_id',$result->customer_id);
        return Redirect::to('/checkouts');
    }else{
        return Redirect::to('/login-checkout');
    }
    }
}


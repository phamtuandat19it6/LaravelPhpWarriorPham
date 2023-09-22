<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','asc')->get();
        return view('page.slider')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('page.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }
    public function send_email(){
        $to_name = "Tuấn Đạt";
        $to_email = "ptdat.19it6@sict.udn.vn";

        $data = array("name"=>"Mail từ tài khoản khách hàng","body"=>'Mail gửi về vấn đề hàng hóa');

        Mail::send('page.send_mail',$data,function($message) use ($to_name,$to_email){
        $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
        $message->from($to_email,$to_name);
        });

//--send mail
    }
}

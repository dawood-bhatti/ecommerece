<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index(){
        $data = product::all();
        return view('product', ['products'=>$data]);
    }
    function detail($id){
        $data =  product::find($id);
        return view('detail', ['products'=>$data]);
    }
    function search(Request $req)
    {
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }

    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
           $cart= new Cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('/');

        }
        else
        {
            return redirect('/login');
        }
    }

    static function cartitem(){
        $userId=Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
    function cartlist(){
        $products=DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', Session::get('user')['id'])
        ->select('products.*', 'carts.id as cart_id')
        ->get();
        return view('cartlist', ['products'=>$products]);
    }
    function removeItem($id){
        Cart::destroy($id);
        return redirect('/cartlist');
    }

    function orderNow()
    {
        $userId=Session::get('user')['id'];
        $total= $products= DB::table('carts')
         ->join('products','carts.product_id','=','products.id')
         ->where('carts.user_id',$userId)
         ->sum('products.price');
 
         return view('ordernow',['total'=>$total]);
    }

    function orderPlace(Request $req)
    {
        $userId=Session::get('user')['id'];
         $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->save();
             Cart::where('user_id',$userId)->delete(); 
         }
         $req->input();
         return redirect('/');
    }


    function myOrders()
    {
        $userId=Session::get('user')['id'];
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$userId)
         ->get();
 
         return view('myorders',['orders'=>$orders]);
    }

    



    }
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Subcategory;
use App\Productdetails;
use DB;
use Cart;
use Auth;
use App\News;

class MainController extends Controller
{
    public function execute(){

	   $category =DB::select('SELECT subcategory.*, category.* FROM category INNER JOIN subcategory ON subcategory.categoryId = category.id');

        $phones = DB::table('products')
        ->join('category', 'products.categoryId', '=', 'category.id')
        ->join('subcategory', 'products.subId', '=', 'subcategory.id')
        ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->take(10)->where('products.categoryId','=', 1 )->get();

    	$discount=DB::table('products')
        ->join('category', 'products.categoryId', '=', 'category.id')
        ->join('subcategory', 'products.subId', '=', 'subcategory.id')
        ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->take(20)->where('discount','>', 0)->get();

       	$computers = DB::table('products')
        ->join('category', 'products.categoryId', '=', 'category.id')
        ->join('subcategory', 'products.subId', '=', 'subcategory.id')
        ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->take(10)->where('products.categoryId','=', 2 )->get();

        $electronics = DB::table('products')
        ->join('category', 'products.categoryId', '=', 'category.id')
        ->join('subcategory', 'products.subId', '=', 'subcategory.id')
        ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->take(10)->where('products.categoryId','=', 3 )->get();

    	$appliances = DB::table('products')
        ->join('category', 'products.categoryId', '=', 'category.id')
        ->join('subcategory', 'products.subId', '=', 'subcategory.id')
        ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->take(10)->where('products.categoryId','=', 4 )->get();

        $feedback =  DB::table('feedback')
        ->join('users', 'users.id', '=', 'feedback.userId' )
        ->select('feedback.*', 'users.fname', 'users.lname')->latest()->take(3)->get();

        $news = News::latest()->take(3)->get();
        
        if (auth()->user()) {
           $cartItems = \Cart::session(auth()->id())->getContent(); 
           $total=\Cart::session(auth()->id())->getTotalQuantity();
           $totalPrice=\Cart::session(auth()->id())->getTotal();
        }
       
        else{
            $cartItems = 0; 
            $total= 0;
            $totalPrice = 0;
        }
    	return view('home',array(
                'category' => $category,
                'phones' => $phones, 
                'discount' => $discount,
                'computers' =>$computers,
                'electronics' =>$electronics,
                'appliances' =>$appliances,
                'feedback' => $feedback,
                'news' => $news,
                'total' => $total,
                'totalPrice' => $totalPrice,
                'cartItems' => $cartItems,

              ));



    }
    public function ContactIndex(){
        if(view()->exists('contact')) {
         if (auth()->user()) {
           $cartItems = \Cart::session(auth()->id())->getContent(); 
           $total=\Cart::session(auth()->id())->getTotalQuantity();
           $totalPrice=\Cart::session(auth()->id())->getTotal();
        }
       
        else{
            $cartItems = 0; 
            $total= 0;
            $totalPrice = 0;
        }
        return view('contact',array(
                'total' => $total,
                'totalPrice' => $totalPrice,
                'cartItems' => $cartItems,

              ));

    };
    abort(404);
}



  

}

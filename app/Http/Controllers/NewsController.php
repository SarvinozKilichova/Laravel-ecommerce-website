<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Cart;
use DB;

class NewsController extends Controller
{
    public function NewsIndex(){
    	$news = News::latest()->get();
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
    	 return view('news_list', array(
              'news' => $news,
              'total' => $total,
              'totalPrice' => $totalPrice,
              'cartItems' => $cartItems

              ));


    }

     /*public function NewsIdExecute(Request $request, $slug){
     	if(view()->exists('news_detail')) {
     		$news = News::where('slug', $slug )->get();
    	if (auth()->user()) {
           $cartCount = Cart::where('userId', '=', auth()->user()->id )->get()->count();
           $cartIteams = DB::table('products')
        ->join('cart', 'products.id', '=', 'cart.productId')
        ->select( 'products.*','cart.*')->take(3)->where('cart.userId','=', auth()->user()->id)->get();
        }
        else{
            $cartCount = '0';
            $cartIteams = '0';
        }

    	 return view('news_list', array(
              'news' => $news,
              'cart' => $cartCount,
              'cartIteams' => $cartIteams

              ));
     	}
    	
		abort(404);    	 

    }*/
}

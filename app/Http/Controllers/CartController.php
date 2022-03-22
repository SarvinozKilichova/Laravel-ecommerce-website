<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Cart;
use App\Product;

class CartController extends Controller
{

	public function index(){
		if(view()->exists('cart')) {
			if (auth()->user()) {
           $cartItems = \Cart::session(auth()->id())->getContent(); 
           $total=\Cart::session(auth()->id())->getTotalQuantity();
           $totalPrice=\Cart::session(auth()->id())->getTotal();
           $subTotal = \Cart::session(auth()->id())->getSubTotal();
        }
       
        else{
            $cartItems = 0; 
            $total= 0;
            $totalPrice = 0;
        }

	        return view('cart', array(
              'total' => $total,
              'cartItems'=> $cartItems, 
              'totalPrice' => $totalPrice,
              'subTotal' => $subTotal

              ));
    };
		abort(404);

		

			
	}

	public function updateExecute(Request $request){

	}
   	public function AddExecute(Request $request, Product $products){

   		\Cart::session(auth()->id())->add(array(
            'id' => $request->productId,
            'name' => $request->name,
            'price' => $request->price,
            'attributes' => array("image"=>$request->img,
            					  "total"=>$request->total,
            					  "cat_slug"=>$request->cat_slug,
            					  "sub_slug"=>$request->sub_slug,		
        	),
            'quantity'=>$request->quantity,
            'associatedModel' => $products,));
   		$total=\Cart::session(auth()->id())->getTotalQuantity();
   		$totalPrice=\Cart::session(auth()->id())->getTotal();
   		$cartItems = \Cart::session(auth()->id())->getContent();
   		if ($request->productId) {
			return response()->json([
				'count' => $total,
				'totalPrice' =>$totalPrice,
				'cartItems' => $cartItems,
				'success' => "Mahsulot savatga muvaffaqiyatli qo'shildi!"
			]);
		     }

		else{
			return response()->json([
				'success' => false,
				'error' => "Xatolik yuz berdi. Iltimos qaytadan o'rinib ko'ring"
			]);
		}     
    	
    }

    public function delete(Request $request, $id){
    	if (! session(auth()->id())) {
    		\Cart::session(auth()->id())->remove($id);
    		$cartItems = \Cart::session(auth()->id())->getContent(); 

    		return redirect()->back()->with('message', "Mahsulot savatdan muvaffaqiyatli o'chirildi");
    	}
    	

    }


     public function update(Request $request, $id){
    	if (! session(auth()->id())) {

    		$qty= $request->quantity;
    		$total = $request->price * $qty;
    		\Cart::session(auth()->id())->update($id, ['quantity' => ['relative' => false,
                                   'value' => $qty,
                                 ], 
            ]);
    		

    		return redirect()->back()->with('message', "Mahsulot soni muvaffaqiyatli tahrirlandi");
    	}
    	

    }
}

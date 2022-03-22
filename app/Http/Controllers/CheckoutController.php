<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Shipping_address;
use App\User;
use App\Payment;
use App\Product;
use Validator;
use App\Cart;
use App\Orders;
use App\Order_items;
use DB;

class CheckoutController extends Controller
{
    public function index(){
    	 if(view()->exists('checkout')) {
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


    	 	$user = User::where('id', auth()->user()->id)->get()[0];
        $address = Shipping_address::where('userId', auth()->user()->id)->get();

    	 	return view('checkout', array(
              'user' => $user,
              'total' => $total,
              'cartItems'=> $cartItems, 
              'totalPrice' => $totalPrice,
              'subTotal' => $subTotal,
              'address' => $address,
              ));
    	 }
    }

    public function AddExecute(Request $request){
      if ($request->isMethod('post')) {
        $isset = DB::select('SELECT userId FROM shipping_address WHERE userId = "'.auth()->user()->id.'"');
        if (auth()->user()->id) {
          if ($isset == null) {
             $messages= [
            'required'=>":attribute mavjud qator to'ldirilishi shart!",
            'email'=>"Mavjud bo'lgan:attribute manzilini kiriting!",
            'max' => ":attribute  ko'pi bilan :max ta belgidan iborat bo'lishi kerak",
            'min' => ":attribute kamida :min ta belgidan iborat bo'lishi shart",
            'unique' => "ushbu :attribute boshqa foydalanuvchi tomonidan kirgizilgan ",
            ];
                        
            $input =$request->except('_token');
            $validator = Validator::make($input, [
            'shahar'=>'required|max:20',
            'viloyat'=>'required|max:20',
            'manzil'=>'required|max:200',
            'zipkod'=>'required|min:5|max:6',
            ], $messages);

          if ($validator->passes()) {
              $address = new  Shipping_address();
              $address->region = $request->viloyat;
              $address->city = $request->shahar;
              $address->address = $request->manzil;
              $address->zipcode = $request->zipkod;
              $address->userId = auth()->user()->id;
              $address->save ();
                 return response()->json([
                  'address'=> $address
                 ]);
              }
              return response()->json([
                'errors' => $validator->getMessageBag()->toArray()
                ]);
            }

          } 


          $data = new payment ();
          $data->userId = auth()->user()->id;
          $data->paymentType = $request->paymentType;
          if ($request->paymentType == 1 ) {
            $data->allowed = '2';
          }
          $data->save ();

          $order = Orders::create([
            'orderNumber' => 'ORD-'.strtoupper(uniqid()),
            'userId'      => auth()->user()->id,
            'status'      => 'pending',
            'grand_total' => \Cart::session(auth()->id())->getSubTotal(),
            'item_count'  => \Cart::session(auth()->id())->getTotalQuantity(),
            'payment_satus' => 0,
            'payment_method' => $request->paymentType,
            'notes'       => $request->eslatma,
            'payment'

          ]);


          if ($order) {
             $items = \Cart::session(auth()->id())->getContent();

             foreach ($items as $item) {
               $product = Product::where('id', $item->id)->first();

               $orderItem = new Order_items([
                  'productId' => $product->id,
                  'quantity' => $item->quantity,
                  'price' => $item->getPriceSum(),
                  'userId'=> auth()->user()->id,
               ]);

               $order->items()->save($orderItem);
             }
           }         
           \Cart::session(auth()->id())->clear();
           // redirect('user/dashboard')->with('status', "Buyurtma qabul qilindi!");
      }
    }
}

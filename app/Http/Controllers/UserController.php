<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cart;
use DB;
use Validator;
use App\Payment; 
use App\Shipping_address;


class UserController extends Controller
{
    public function index(){
    	if(view()->exists('user')) {
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
    		$user = User::where('id', auth()->user()->id)->get()[0];
        $address = Shipping_address::where('userId', auth()->user()->id)->get();
        $payment = Payment::where('userId', auth()->user()->id)->get();

    		 return view('user', array(
              'user' => $user,
              'total' => $total,
              'cartItems'=> $cartItems,
              'totalPrice' => $totalPrice,
              'payment' => $payment,
              'address' => $address,

              ));


    	}

    	abort(404);

    }

    public function UpdateExecute(Request $request){
       if ($request->isMethod('post')) {

             $messages= [
            'required'=>":attribute mavjud qator to'ldirilishi shart!",
            'email'=>"Mavjud bo'lgan :attribute manzilini kiriting!",
            'min' => ":attribute kamida :min ta sondan iborat bo'lishi shart",
            'max' => ":attribute ko'pi bilan :max ta sondan iborat bo'lishi shart",
            'unique' => "ushbu :attribute boshqa foydalanuvchi tomonidan kirgizilgan ",
         ];
                        
            $input =$request->except('_token');
            $validator = Validator::make($input, [

            'ism'=>'required|string|max:20',
            'familiya'=>'required|max:20',
            'email'=>'required|max:50|email|unique:users',
            'telefon'=>'required|min:9|max:9|unique:users',

       ], $messages); 
              if ($validator->passes()) {
                if (auth()->user()->id) {
                  $data = User::find(auth()->user()->id);
                  $data->fname = $request->ism;
                  $data->lname = $request->familiya;
                  $data->email = $request->email;
                  $data->phone = $request->telefon;
                  $data->save ();
                  $user = User::where('id', auth()->user()->id)->get()[0];
                  return response()->json([
                    'success'=> "Ma'lumotlar muvaffaqiyatli o'zgartirildi",
                    'user'=> $user
                   ]);
                }
                  
                  return response()->json([
                    'errors' => "Foydalanuvchi topilmadi"
                   ]);
              }

              return response()->json([
                    'errors' => $validator->getMessageBag()->toArray()
                   ]);


          }
      }

    public function AddressExecute(Request $request){
       if ($request->isMethod('post')) {

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
                $address = Shipping_address::where('userId', auth()->user()->id)->get();
                $isset = DB::select('SELECT userId FROM shipping_address WHERE userId = "'.auth()->user()->id.'"');
                if ($isset != null) {
                  DB::update('UPDATE shipping_address SET region = "'.$request->viloyat.'", city = "'.$request->shahar.'", zipcode ="'.$request->zipkod.'", address = "'.$request->manzil.'", updated_at = "'.now().'" WHERE userId = "'.auth()->user()->id.'"');
                  
                  return response()->json([
                    'success'=> "Ma'lumotlar muvaffaqiyatli o'zgartirildi",
                    'address'=> $address
                   ]);
                }
                else{
                  $data = new  Shipping_address();
                  $data->region = $request->viloyat;
                  $data->city = $request->shahar;
                  $data->address = $request->manzil;
                  $data->zipcode = $request->zipkod;
                  $data->userId = auth()->user()->id;
                  $data->save ();
                   return response()->json([
                    'success'=> "Ma'lumotlar muvaffaqiyatli o'zgartirildi",
                    'address'=> $address
                   ]);
                }
                  
                  return response()->json([
                    'error_get_last()' => "Foydalanuvchi topilmadi"
                   ]);
              }

              return response()->json([
                    'errors' => $validator->getMessageBag()->toArray()
                   ]);


          }
      }

    public function ChangeExecute(Request $request){
       if ($request->isMethod('post')) {
             $messages= [
            'required'=>":attribute parol mavjud qator to'ldirilishi shart!",
            'min' => ":attribute parol kamida 8 ta belgidan iborat bo'lishi kerak!"
         ];
                        
            $input =$request->except('_token');
            $validator = Validator::make($input, [
            'password'=>'required|max:50',
            'newPassword'=>'required|min:8',
            'confirmPass'=>'required|min:8',


       ], $messages); 
              if ($validator->passes()) {
                if (auth()->user()->password == $request->password) {
                  $data = User::find(auth()->user()->id);
                  $data->password = Hash::make($request->newPassword);
                  $data->save ();
                  $user = User::where('id', auth()->user()->id)->get()[0];
                  return response()->json([
                    'success'=> "Parol muvaffaqiyatli o'zgartirildi",
                    'user'=> $user
                   ]);
                }
                  
                  return response()->json([
                    'error' => "Joriy parol noto'g'ri"
                   ]);
              }

              return response()->json([
                    'errors' => $validator->getMessageBag()->toArray()
                   ]);


          }
      }  
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\Subcategory;
use App\Phone;
use DB;
use App\Property;
use App\Company;
use Crypt;
use Auth;
use App\feedback;
use App\Cart;
use paginate;



class ProductsController extends Controller
{   
  public function TelefonExecute(Request $request){
    $productQuery=Product::query();
    if(view()->exists('phone')) {
      $start = microtime(true);
        $cost_to=$request->filled('cost_to');
        $cost_from=$request->filled('cost_from');
          if ($cost_from) {
                $productQuery->where('price', ">=", "$request->cost_from");
              } 
          if ($cost_to) {
                $productQuery->where('price', "<=", "$request->cost_to");
              }  
            $brands = $request->get('company');
                        if (!empty($brands)) {            
                          foreach ($brands as $key => $brand) {
                           $productQuery->OrWhere('company', "=", $brand)->toSql() ;
                          }                  
                }
           $colors = $request->has('color') ? $request->get('color') : [];     
                        if (isset($colors)) {            
                          foreach ($colors as $key => $color) {
                           $productQuery->orWhere('color', "=", $color);
                                                     }                        
                      } 

                if ($request->has('discountOn')) {
                      $productQuery->where('discount', ">", 0);
                    } 

                if ($request->has('discountOff')) {
                      $productQuery->where('discount', "=", 0);
                    }  

                    

      $phone=$productQuery->where('category_id', '1')->latest()->paginate(6);
      
      print_r(microtime(true)-$start);

      return view('phone', array(
                'phone'=> $phone, 
                                         
              ));
    };    
    abort(404);
   }


    public function get_causes_against_category($id){
     
         $data = DB::table('subcategories as sub_cat')->selectRaw('(Select image from categories where id = sub_cat.category_id) as cat_image,  (Select title from categories where id = sub_cat.category_id) as cat_title')->whereRaw('category_id IN ('.$id.')')->get();

        echo json_encode($data);
    }


  public function CategoryExecute(Request $request, $category, $catId){
        $did = base64_decode($catId);   

        $productQuery=Product::query(); 
        if(view()->exists('product_listing')) {

        $products = DB::table('products')
        ->join('category', 'products.categoryId', '=', 'category.id')
        ->join('subcategory', 'products.subId', '=', 'subcategory.id')
        ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->where('products.categoryId','=', $did)->paginate(25);

        $subcategory = Subcategory::where('categoryId', '=', $did)->get();
        $company = Company::where('cat_id', $did)->get();
        $property = DB::table('property')->join('property_name', 'property.groupby', '=', 'property_name.id')
        ->select('property.*', 'property_name.*')->where('property.cat_id', $did)->orderBy('p_name')->get();
         $category = Category::where('id', $did)->get()[0];
         $did = $did;
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

  

      return view('product_listing', array(
              'products' => $products,
              'subcat' =>$subcategory,
              'property' => $property,
              'company' => $company,
              'title' => $category,
              'cat_id' => $did,
              'total' => $total,
              'totalPrice' => $totalPrice,
              'cartItems'=> $cartItems,
              'did' =>$did,
              ));
    };

        abort(404);
    
  }


  public function SubcatExecute(Request $request, $category, $subcat, $subid){
   

        $did = base64_decode($subid);

        $productQuery=Product::query(); 
        if(view()->exists('product_listing')) { 
           if ($request->ajax()) {
            if (isset($request->formdata)) {
             $subcat = $request->formdata;
             $products = DB::table('products')
                ->join('category', 'products.categoryId', '=', 'category.id')
                ->join('subcategory', 'products.subId', '=', 'subcategory.id')
                ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->whereIn('subid', explode(",", $subcat))->get(); 
                return response()->json($products);
                return view('product_listing', array(
                    'products' => $products,
                    ));           
            };

          }
        $products = DB::table('products')
        ->join('category', 'products.categoryId', '=', 'category.id')
        ->join('subcategory', 'products.subId', '=', 'subcategory.id')
        ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->where('products.subId','=', $did)->paginate(25);
        $subcategory = DB::select('SELECT * FROM subcategory WHERE categoryId = (SELECT categoryId FROM subcategory WHERE id = '.$did.')');
        $category =  DB::select('SELECT cat_name FROM category WHERE id = (SELECT id FROM category WHERE cat_slug = "'.$category.'")')[0];
        $company = Company::where('sub_id', $did)->get();
        $property = DB::table('property')->join('property_name', 'property.groupby', '=', 'property_name.id')
        ->select('property.*', 'property_name.*')->where('property.cat_id', $did)->orderBy('p_name')->get();
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
      
  

      return view('product_listing', array(
              'products' => $products,
              'subcat' =>$subcategory,
              'property' => $property,
              'company' => $company,
              'cat' => $category,
              'total' => $total,
              'title' => $category,
              'did' => $did,
              'total' => $total,
              'cartItems'=> $cartItems,
              'totalPrice' => $totalPrice,

              ));
    };

        abort(404);
    
  }

  public function ProductExecute($category, $subcat, $id,$name){
        $cat_slug = $category;
        $sub_slug = $subcat;

        $did = base64_decode($id);
        $products = DB::table('products')
        ->join('productdetails', 'productdetails.productId', '=', 'products.id' )
        ->select('products.*', 'productdetails.*')->where('productdetails.productId', '=', $did)->get();

        $feedback =  DB::table('feedback')
        ->join('products', 'products.id', '=', 'feedback.productId' )
        ->join('users', 'users.id', '=', 'feedback.userId' )
        ->select('feedback.*', 'users.fname', 'users.lname')->where('products.id', '=', $did)->get();
        $p = ($products[0]);

        $searchValues = preg_split('/\s+/', $p->name, -1, PREG_SPLIT_NO_EMPTY);

        $similar =  DB::table('products')
        ->join('category', 'products.categoryId', '=', 'category.id')
        ->join('subcategory', 'products.subId', '=', 'subcategory.id')
        ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->where('products.id', '!=', $did)->where('products.categoryId', $p->categoryId)->where('products.subId', $p->subId)->where(function($q) use ($searchValues){
          foreach ($searchValues as  $value) {
            $q->orWhere('products.name', 'like', "%{$value}%");
          }
        })->get();

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
        return view('product-detail', array(
              'products' => $p,
              'feedback' => $feedback,
              'similar' => $similar,
              'total' => $total,
              'cartItems' => $cartItems,
              'totalPrice' => $totalPrice,
              'cat_slug' => $cat_slug,
              'sub_slug' => $sub_slug, 

              ));
    

  } 

    public function AddFeedExecute(Request $request){

    $data = new feedback ();
    $data->text = $request->text;
    $data->productId = $request->id;
    $data->userId = auth()->user()->id;
    $data->save ();

    $feedback =  DB::table('feedback')
        ->join('products', 'products.id', '=', 'feedback.productId' )
        ->join('users', 'users.id', '=', 'feedback.userId' )
        ->select('feedback.*', 'users.fname', 'users.lname')->where('products.id', '=', $request->id)->get();  
       
    return response()->json($feedback);


    }


    /*public function FilterExecute(Request $request){

     if (isset($request->formdata)) {
       $subcat = $request->formdata;
       $products = DB::table('products')
          ->join('category', 'products.categoryId', '=', 'category.id')
          ->join('subcategory', 'products.subId', '=', 'subcategory.id')
          ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->whereIn('subid', explode(",", $subcat))->get();
          return response()->json($product);
         
        
    };*/

    
     
     /* $filter = $request->formdata;
      if (!empty($filter)) {      
        $value = $filter; 
        foreach ($value as $val) {
         $products = DB::table('products')
          ->join('category', 'products.categoryId', '=', 'category.id')
          ->join('subcategory', 'products.subId', '=', 'subcategory.id')
          ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->where('subid', $val)->get();  return response()->json($products);     
        }        
      }
      else{
        $value = "";
      }
      $and = "AND"; 
    
     
   
   }*/


   public function searchExecute(Request $request){
    if(view()->exists('product_listing')) {
    $searchName = $request->search;
    $searchValues = preg_split('/\s+/', $searchName, -1, PREG_SPLIT_NO_EMPTY);
    $products =  DB::table('products')
        ->join('category', 'products.categoryId', '=', 'category.id')
        ->join('subcategory', 'products.subId', '=', 'subcategory.id')
        ->select( 'products.*','category.cat_slug', 'subcategory.slug')->latest()->where(function($q) use ($searchValues){
          foreach ($searchValues as  $value) {
            $q->orWhere('products.name', 'like', "%{$value}%");
          }
        })->paginate(25);
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

        return view('product_listing', array(
              'products' => $products,
              'total' => $total,
              'totalPrice' => $totalPrice,
              'cartItems'=> $cartItems,
              'search_name' => 'Filter'
            ));
   }
 }
   
   }


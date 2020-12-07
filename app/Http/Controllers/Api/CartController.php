<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
//use Session;
use Cookie;
use App\Products;
use App\Category;
use App\Cart;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{


      public function show_cart(Request $request) {

       if($request->session()->has('my_name')){
         if (Auth::guard('api')->check()){
           $user_id = auth('api')->user()->getKey();
         }else{
           $user_id = NULL;
         }

         $cart = $request->session()->get('my_name');
         return response()->json(
           ['message'=>'Successfull',
           "user_id" => $user_id,
           'data'=>$cart
           ]);
       }else{
         return response()->json(
           [
             'message'=>'No Items in the cart',
           ]);
       }

    }




    public function add_to_cart(Request $request) {

      $inputs = $request->all();
      $product_id = $inputs['product_id'];
      $product_qty = $inputs['quantity'];
      $product = Products::find($product_id);
      if (Auth::guard('api')->check()){
        $user_id = auth('api')->user()->getKey();
      }else{
        $user_id = NULL;
      }

      $flag = 0;
      $cart = $request->session()->get('my_name');
      if($cart){
        for($i=0; $i<count($cart); $i++ ){
          if($cart[$i]['product_id'] == $product_id){
              //$t_quantity = $cart[$i]['quantity'] + $product_qty;
              $price = $product->discount_price * $product_qty;
              $cart[$i]['quantity'] = $product_qty;
              $cart[$i]['total_price'] = $price;
              $flag = 1;
          }
        }
      }


      if($flag == 0){
        $price = $product->discount_price * $product_qty;
        $cart[] = [
            "name" => $product->name,
            "product_id" => $product_id,
            "quantity" => $product_qty,
            "price" => $product->discount_price,
            "total_price" => $price,
            "photo" => $product->image,
        ];
        $request->session()->put('my_name',$cart,1);
      }

      return response()->json(
        ['message'=>'Successfull',
        "user_id" => $user_id,
        'data'=>$cart
        ]);

    }


      public function delete_cart_item(Request $request){
        $inputs = $request->all();
        $product_id = $inputs['product_id'];

        $cart = $request->session()->get('my_name');
        if($cart){
          for($i=0; $i<count($cart); $i++ ){
            if($cart[$i]['product_id'] == $product_id){
                //unset($cart[$i]);
                \array_splice($cart, $i, 1);
                break;
            }
          }
        }

        $request->session()->put('my_name',$cart,1);

        return response()->json(
          [
            'message'=>'Successfully removed product_id '.$product_id.' from the cart'
            //'data'=>$cart
          ]);


      }


    public function clear_cart(Request $request) {
       $request->session()->forget('my_name');
       return response()->json(
         [
           'message'=>'Cart is cleared',
         ]);
    }





}

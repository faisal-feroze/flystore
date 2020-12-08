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
use App\Order;
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
         $cart_total_price = 0;
         if($cart){
           for($i=0; $i<count($cart); $i++ ){
             $cart_total_price = $cart_total_price + $cart[$i]['total_price'];
           }
         }
         $total_items = count($cart);
         return response()->json(
           ['message'=>'Successfull',
           'user_id' => $user_id,
           'total_items' => $total_items,
           'cart_total_price' => $cart_total_price,
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
              $request->session()->put('my_name',$cart,1);
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

    public function purchase(Request $request) {
      $inputs = $request->all();
      $shipping_address = $inputs['shipping_address'];
      $payment_method = $inputs['payment_method'];
      $user_id = auth('api')->user()->getKey();
      $status = "placed";
      $payment_status = "unpaid";

      $lastOrderId = Order::select('id')->orderBy('id','desc')->first();
      $lastOrderId=(int)substr($lastOrderId , 6);
      $lastOrderId++;
      $order_no = 'ORDER-'.$lastOrderId;
      $cart = $request->session()->get('my_name');

      if($cart){
        for($i=0; $i<count($cart); $i++ ){
          $order_data = [
              'user_id'=> $user_id,
              'product_id'=> $cart[$i]['product_id'],
              'quantity'=> $cart[$i]['quantity'],
              'total_amount'=> $cart[$i]['total_price'],
              'shipping_address'=> $shipping_address,
              'status'=> $status,
              'order_code'=> $order_no,
              'payment_method'=> $payment_method,
              'payment_status'=> $payment_status,
              'product_name'=> $cart[$i]['name'],
          ];

          Order::create($order_data);
        }

        $request->session()->forget('my_name');
        return response()->json(
          [
            'message'=>'Successfully Placed Order',
          ]);

      }else{
        return response()->json(
          [
            'message'=>'No items in the cart',
          ]);
      }


      //$request->session()->forget('my_name');



    }







}

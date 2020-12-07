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

  // public function addToCart(Request $request)
  //   {
  //       $inputs = $request->all();
  //       $product_id = $inputs['product_id'];
  //       $quantity = $inputs['quantity'];
  //
  //       $product = Products::find($product_id);
  //       $price = $product->discount_price * $quantity;
  //
  //       if (Auth::guard('api')->check()){
  //           $user_id = auth('api')->user()->getKey();
  //       }else{
  //         $user_id = NULL;
  //       }
  //
  //
  //       $cart = session()->get('cart');
  //       // if cart is empty then this the first product
  //       if(!$cart) {
  //           $cart = [
  //                   $product_id => [
  //                         "product_id" => $product_id,
  //                         "quantity" => $quantity,
  //                         "price" => $price,
  //                         "user_id" => $user_id
  //                   ]
  //           ];
  //           session()->put('cart', $cart);
  //           //return redirect()->back()->with('success', 'Product added to cart successfully!');
  //           $value = Session::get('cart');
  //           return response()->json(
  //             ['message'=>'Successfull',
  //               'data' => $value
  //             ]);
  //       }
  //       // if cart not empty then check if this product exist then increment quantity
  //       if(isset($cart[$product_id])) {
  //           $cart[$product_id]['quantity']++;
  //           session()->put('cart', $cart);
  //           //return redirect()->back()->with('success', 'Product added to cart successfully!');
  //           $value = Session::get('cart');
  //           return response()->json(
  //             ['message'=>'Successfull',
  //               'data' => $value
  //             ]);
  //       }
  //       // if item not exist in cart then add to cart with quantity = 1
  //       $cart[$product_id] = [
  //           "product_id" => $product_id,
  //           "quantity" => $quantity,
  //           "price" => $price,
  //           "user_id" => $user_id
  //       ];
  //       session()->put('cart', $cart);
  //       // return redirect()->back()->with('success', 'Product added to cart successfully!');
  //       $value = Session::get('cart');
  //       return response()->json(
  //         ['message'=>'Successfull',
  //           'data' => $value
  //         ]);
  //   }



  public function add_to_cart(Request $request){
    $inputs = $request->all();
    $product_id = $inputs['product_id'];
    $quantity = $inputs['quantity'];

    if (Auth::guard('api')->check()){
        $user_id = auth('api')->user()->getKey();
    }else{
      $user_id = NULL;
    }

    Session::push('cart', [
       'product_id' => $product_id,
       'quantity' => $quantity,
       'user_id' => $user_id
    ]);

    $value = Session::get('cart');
    return response()->json(
      ['message'=>'Successfull',
        'data' => $value
      ]);
  }

  public function show_cart(){

  //  $value =  session()->get('cart');
    $total = 0;
    $cart_data = array();
    // if(session('cart')){
    //   foreach(session('cart') as $id => $details){
    //     //$total += $details['price'] * $details['quantity'];
    //     $data['id'] = $id;
    //     $data['name'] = $details['name'];
    //     $data['quantity'] = $details['quantity'];
    //     $data['price'] = $details['price'];
    //     $data['photo'] = $details['photo'];
    //     $data['user_id'] = $details['user_id'];
    //     $cart_data =  $data;
    //   }
    // }

    //$data = Session::get('cart');
    $data = session()->get( 'cart' );

    return response()->json(
      ['message'=>'Successfull',
       'data' => $data
      ]);


  }



  public function addToCart(Request $request)
      {

          $inputs = $request->all();
          $product_id = $inputs['product_id'];
          $product = Products::find($product_id);
          if(!$product) {
              abort(404);
          }

          if (Auth::guard('api')->check()){
            $user_id = auth('api')->user()->getKey();
          }else{
            $user_id = NULL;
          }

          $cart = session()->get('cart');
          // if cart is empty then this the first product
          if(!$cart) {
              $cart = [
                      $product_id => [
                          "name" => $product->name,
                          "quantity" => 1,
                          "price" => $product->discount_price,
                          "photo" => $product->image,
                          "user_id" => $user_id
                      ]
              ];
              session()->put('cart', $cart);
              return response()->json(
                ['message'=>'Successfull',
                'data'=>$cart
                ]);
          }
          // if cart not empty then check if this product exist then increment quantity
          if(isset($cart[$product_id])) {
              $cart[$product_id]['quantity']++;
              session()->put('cart', $cart);
              return response()->json(
                ['message'=>'Successfull',
                'data'=>$cart
                ]);
          }
          // if item not exist in cart then add to cart with quantity = 1
          $cart[$product_id] = [
              "name" => $product->name,
              "quantity" => 1,
              "price" => $product->discount_price,
              "photo" => $product->image,
              "user_id" => $user_id
          ];
          session()->put('cart', $cart);
          return response()->json(
            ['message'=>'Successfull',
            'data'=>$cart
            ]);
      }


      public function set_cookie(Request $request)
      {
        $inputs = $request->all();
        $product_id = $inputs['product_id'];
        $product = Products::find($product_id);

        if (Auth::guard('api')->check()){
          $user_id = auth('api')->user()->getKey();
        }else{
          $user_id = NULL;
        }

        $cart = [
                $product_id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->discount_price,
                    "photo" => $product->image,
                    "user_id" => $user_id
                ]
        ];


        $minutes = 60;
        $response = new Response('Set Cookie');
        //$re = $response->withCookie(cookie('cart', 'my cart', $minutes));

        $ee = request()->cookie('cart', $cart, $minutes);

        return response()->json(
          ['message'=>'Successfull',
          'data'=>$ee
          ]);

      }

      public function get_cookie(Request $request)
      {
        //$ee = $_COOKIE['cart'];
        //$ee = request()->cookie('cart');
        $ee = Cookie::get( 'cart' );
        return response()->json(
          ['message'=>'Successfull',
          'data'=>$ee
          ]);


      }


      public function accessSessionData(Request $request) {

       if($request->session()->has('my_name')){
         $value = $request->session()->get('my_name');
       }else{
         $value ="123";
       }

       return $value;
          // echo 'No data in the session';
    }

    protected function prepareCartItems($items = []){
          $cart_items = [];
          foreach($items as $item){
              array_push($cart_items, $item);
          }
          return $cart_items;
      }

    public function storeSessionData(Request $request) {

      $inputs = $request->all();
      $product_id = $inputs['product_id'];
      $product_qty = $inputs['quantity'];
      $product = Products::find($product_id);

      if (Auth::guard('api')->check()){
        $user_id = auth('api')->user()->getKey();
      }else{
        $user_id = NULL;
      }


        $cart = [
             "product_id" => $product_id,
             "quantity" =>$product_qty,
             "price" => $product->discount_price,
             "user_id" => $user_id
        ];


        if( isset($cart->$product_id) ){
              echo "fghgj";
          }

   $request->session()->put('my_name',$cart,1);

   return $cart;
    }

    public function addCart(Request $request){
        $validate = Validator::make($request->all(),[
            'qty' => ['required','gt:0'],
            'product_id' => ['required'],

        ]);

        if( $validate->fails() ){
            $this->message = $this->getValidationError($validate);
            return $this->apiOutput();
        }
        try{
            $product = Products::findOrFail($request->product_id);

            //$cart = new Cart($this->cart());
            $cart->addCart($product, $request->qty, asset($product->image));
            $this->storeInSession($request, $cart);
          //  $cart = new Cart($cart);
            if( isset($cart->items) ){
                $cart->items = $this->prepareCartItems($cart->items);
            }
            $total_cart_amount = isset($cart->total_price) ? $cart->total_price : 0;
            $cart->offer_message = $this->availableOffer($total_cart_amount)->title ?? '';
            $cart->current_offer_amount = $this->getApplicableOffer($total_cart_amount)->amount ?? 0;
            $this->data = $cart;
            $this->apiSuccess("Add to Cart Successfully");
        }catch(Exception $e){
            $this->message = $this->getError($e);
        }
        return $this->apiOutput();
    }

    public function deleteSessionData(Request $request) {
       $request->session()->forget('my_name');
       echo "Data has been removed from session.";
    }

    public function purches(Request $request) {
      $value = $request->session()->get('my_name');
      //$value->attachRole('order');
      $asd[auth()->user()->id] = $value;
    //  echo auth()->user()->id;
      return $value;
        //return response()->json(auth()->>user()->id);
    }




}

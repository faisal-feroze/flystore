<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Category;

class ProductController extends Controller
{
    public function all_products(){
      $products = Products::all();
      return response()->json(
        ['message'=>'Successfull',
         'data' => $products
        ]);
    }

    public function pagination_products(Request $request){
      $inputs = $request->all();
      $pagination = $inputs['pagination_index'];
      $perpage_products = 5;
      if($pagination == 1){
        $skip = 0;
      }else{
        $skip = $perpage_products * ($pagination -1);
      }

      $products = Products::skip($skip)->take($perpage_products)->get();
      return response()->json(
        ['message'=>'Successfull',
         'data' => $products
        ]);
    }



    public function product_details(Request $request){
      $inputs = $request->all();
      $product_id = $inputs['product_id'];
      $product = Products::find($product_id);
      return response()->json(
        ['message'=>'Successfull',
         'data' => $product
        ]);
    }


    public function all_category(){
      $category = Category::all();
      return response()->json(
        ['message'=>'Successfull',
         'data' => $category
        ]);
    }

    public function category_items(Request $request){
      $inputs = $request->all();
      $category_id = $inputs['category_id'];
      $products = Products::where('category_id','=',$category_id)->get();
      return response()->json(
        ['message'=>'Successfull',
         'data' => $products
        ]);
    }








}

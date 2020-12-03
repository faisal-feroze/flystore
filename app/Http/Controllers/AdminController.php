<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Products;
use App\Category;


class AdminController extends Controller
{
  public function __construct(){
      $this->middleware('role:superadministrator');
  }

  public function index(){
    return view('admin.index');
  }

  public function show_products(){
    $products = Products::all();
    return view('admin.all_products',['products'=>$products,'count'=>1]);
  }

  public function add_products(){
    $category = Category::all();
    return view('admin.add_products',['category'=>$category]);
  }

  public function show_category(){
    $category = Category::all();
    return view('admin.show_category',['category'=>$category,'count'=>1]);
  }

  public function category_update(Request $request, $id){
    $category = Category::find($id);
    $inputs = $request->all();
    $category->update($inputs);
    return redirect()->route('show_category');

  }

  public function add_category(Request $request){
    $inputs = $request->all();
    Category::create($inputs);
    return redirect()->route('show_category');
  }




  public function product_save(Request $request){

      $inputs = $request->all();

      if($image = $request->file('image')){
        $image_main_name = $image->getClientOriginalName();
        if($image->move('images', $image_main_name)){
          $inputs['image'] = $image_main_name;
        }
      }

      if($image1 = $request->file('image1')){
        $image1_name = $image1->getClientOriginalName();
        if($image1->move('images', $image1_name)){
          $inputs['image1'] = $image1_name;
        }
      }

      if($image2 = $request->file('image2')){
        $image2_name = $image2->getClientOriginalName();
        if($image2->move('images', $image2_name)){
          $inputs['image2'] = $image2_name;
        }
      }

      if($image3 = $request->file('image3')){
        $image3_name = $image3->getClientOriginalName();
        if($image3->move('images', $image3_name)){
          $inputs['image3'] = $image3_name;
        }
      }

      Products::create($inputs);
      return redirect()->route('show_products');

  }


  public function product_edit(Request $request, $id){
    $product = Products::find($id);
    $category = Category::all();
    return view('admin.edit_products',['product'=>$product, 'category'=>$category]);
  }

  public function product_update(Request $request, $id){
    $product = Products::find($id);
    $inputs = $request->all();

    if($image = $request->file('image')){
      $image_main_name = $image->getClientOriginalName();
      if($image->move('images', $image_main_name)){
        $inputs['image'] = $image_main_name;
      }
    }

    if($image1 = $request->file('image1')){
      $image1_name = $image1->getClientOriginalName();
      if($image1->move('images', $image1_name)){
        $inputs['image1'] = $image1_name;
      }
    }

    if($image2 = $request->file('image2')){
      $image2_name = $image2->getClientOriginalName();
      if($image2->move('images', $image2_name)){
        $inputs['image2'] = $image2_name;
      }
    }

    if($image3 = $request->file('image3')){
      $image3_name = $image3->getClientOriginalName();
      if($image3->move('images', $image3_name)){
        $inputs['image3'] = $image3_name;
      }
    }

    $product->update($inputs);

    return redirect()->route('show_products');

  }




























}

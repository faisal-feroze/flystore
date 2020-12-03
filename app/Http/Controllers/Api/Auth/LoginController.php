<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{

  public function login(Request $request){
    $creds = $request->only(['phone','password']);

    if(!$token = auth()->attempt($creds)){
      return response()->json(['message' => 'Incorrect phone or password'], 401);
    }

    return response()->json(['message' => 'login successfull', 'token' => $token]);

  }

  public function logout(){
    auth()->logout();
    return response()->json(['message'=>'Successfully logged out']);
  }

  public function me(){
    return response()->json(auth()->user());
  }

  public function refresh(){
    $newToken = auth()->refresh();
    return response()->json(['token',$newToken]);
  }


  public function profile_update(Request $request){
    $user_id = auth()->user()->id;
    $user = User::find($user_id);
    $inputs = $request->all();
    $user->update($inputs);
    return response()->json(['message'=>'Successfully Profile Updated']);

  }

  // name
  // email
  // present_address
  // shipping_address
  // dob
  // profession
  // gender









}

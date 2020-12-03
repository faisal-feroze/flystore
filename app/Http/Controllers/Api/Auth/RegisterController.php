<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
  public function register(Request $request){
      $data = $request->all();
      $validatedData = $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8'],
      ]);

      $hash_password = Hash::make($data['password']);

      $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'password' => $hash_password,
      ]);
      $user->attachRole('user');
      //return $user;

      $token = auth()->login($user);

      return response()->json(
        ['message'=>'Registtration successfull',
         'token' => $token,
         'data' => $user
        ]);
  }
}

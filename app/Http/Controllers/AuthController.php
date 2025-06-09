<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function register(UserRequest $r){
      $r['password'] = Hash::make($r['password']);
      $user = User::create($r->all());
      $token = $user->createToken('Laravel Password Grant Client')->plainTextToken;
      $response = [
          'user' => $user,
          'token' => $token
      ];
      return response($response, 201);
   }
   public function login(Request $request){
       abort_if(!$request->email, '403', 'email is empty');
       abort_if(!$request->password, '403', 'password is empty');
       $user = User::where('email', $request->email)->first();
       if(!$user || !Hash::check($request->password, $user->password)){
           return response()->json([
               'message' => 'bad credits'
           ]);
       }
       $token = $user->createToken('Laravel Password Grant Client')->plainTextToken;
       $response = [
           'user' => $user,
           'token' => $token
       ];
       return response($response, 201);
   }
   public function logout(){
       Auth::user()->tokens()->delete();
       return response()->json([
           'message' => 'user logout'
       ]);
   }
   public function user(){
       return response(Auth::user());
   }
}

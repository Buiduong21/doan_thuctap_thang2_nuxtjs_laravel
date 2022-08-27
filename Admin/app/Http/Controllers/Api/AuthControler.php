<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthControler extends Controller
{
    public function register(UserRegister $request)
    {
       $user = new User;
       $user -> fill($request->all());
       $user->password = Hash::make($request->password);
       $user->save();
       return response()->json($user);
    }
    
    public function Login(UserLogin $request)
    {
       if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
       ])){
         $user = User::whereEmail($request->email)->first();
         $user->token = $user->createToken('Token Name')->accessToken;
         return response()->json($user);
       }
       return response()->json(['mess' => 'Sai tên đăng nhập hoặc mật khẩu'], 401);
   }

   //get user information
   public function userInfo(Request $request)
   {
      return response()->json($request->user('api'));
   } 
}
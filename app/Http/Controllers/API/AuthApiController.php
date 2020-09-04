<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class AuthApiController extends Controller
{

   public function hello(Request $request)
    {

     if(Auth::attempt($request->all())){
         $user = $request->user();
         $tokenCreate = $user->createToken('hello token');
         $token = $tokenCreate->token;
         $token->save();


     }
     else{
         echo"your are not a ....";
     }
     

    }



   
}


<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $details =[
            'greeting' => 'Hello'.$user->first_name,
            'body'    => 'Confirm Your Email..',
            'thanks'    => 'Thanks Your For Register..',
            'actionText'    => 'Please Loging',
            'mysite'    => route('user.verification',$this->user->remember_token)

        ];
        $user = User::where('remember_token',$token)->first();
        if (!is_null($user))
         {
            $user->status = 1;
            $user->remember_token = NULL;
            $user->save();
            session()->flash('success','You are registered successfully!!');
        return redirect('login');
        }
        else
        {
            session()->flash('errors','Sorry!Your token is not matched!!');
        return redirect()->route('index');
        }
         

    }
}

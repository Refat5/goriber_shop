<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App;
use Session;

class AdminController extends Controller
{
  
     public function local($language)
   {
   	App::setlocale($language);
   	Session::put('locale',$language);
    return Session::get('locale');
   }
}

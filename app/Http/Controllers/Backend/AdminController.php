<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App;
use Session;
use Auth;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function adashboard()
	{
		$admin = Auth::user();
		return view('admin.pages.user.dashboard',compact(
			'admin'));
	}


	public function aprofile()
	{

		$admin = Auth::user();
		return view('admin.pages.user.profile',compact(
			'admin'));
	}

	public function aprofileUpdate(Request $request)
	{
		 $admin = Auth::user();



        $request->validate([
            'name' => 'required|string|max:30',
           
            'email' => 'required|string|email|max:100|,'.$admin->id,
            'mobile_no' => 'required|max:15|unique:admins,mobile_no,'.$admin->id,
            

        ]);

          
            $admin->name = $request->name;
             
             $admin->mobile_no = $request->mobile_no;
           
             $admin->email = $request->email;
             
             if ($request->password != NULL || $request->password != "") 
             {
             	$admin->password = Hash::make($request->password);
             }
             $admin->save();
             return back();
             session()->flash('success','Your Profile Updated Successfully!');
            
	}

  
     public function local($language)
   {
   	App::setlocale($language);
   	Session::put('locale',$language);
    return Session::get('locale');
   }


}

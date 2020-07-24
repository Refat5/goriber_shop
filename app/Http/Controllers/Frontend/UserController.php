<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Division;
use App\District;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function dashboard()
	{
		$user = Auth::user();
		return view('pages.user.dashboard',compact(
			'user'));
	}

	public function profile()
	{

        $divisions = Division::orderBy('d_priority','asc')->get();
        $districts = District::orderBy('ds_name','asc')->get();
		$user = Auth::user();
		return view('pages.user.profile',compact(
			'user','divisions','districts'));
	}

	public function profileUpdate(Request $request)
	{
		 $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'nullable|string|max:20',
            'user_name' => 'required|alpha_dash|max:100|unique:users,user_name,'.$user->id,
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'mobile_no' => 'required|max:15|unique:users,mobile_no,'.$user->id,
            'street_address' => 'required|max:100',

        ]);

          
            $user->first_name = $request->first_name;
             $user->last_name = $request->last_name;
             $user->user_name = $request->user_name;
             $user->gender = $request->gender; 
             $user->division_id = $request->division_id;
             $user->district_id = $request->district_id;
             $user->mobile_no = $request->mobile_no;
             $user->street_address = $request->street_address;
             $user->ip_address= request()->ip();
             $user->email = $request->email;
             $user->shipping_address=$request->shipping_address;
             if ($request->password != NULL || $request->password != "") 
             {
             	$user->password = Hash::make($request->password);
             }
             $user->save();
             return back();
             session()->flash('success','Your Profile Updated Successfully!');
            
	}
   
}

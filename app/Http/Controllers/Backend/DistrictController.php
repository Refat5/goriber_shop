<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
use App\Division;
use Crypt;

class DistrictController extends Controller
{

    public function __construct()
  {
    $this->middleware('auth:admin');
  }
      public function create()
    {
    	$divisions = Division::orderBY('d_priority','asc')->get();
    	return view('admin.pages.district.create',compact('divisions'));

    }


     public function store(Request $request)
     {
        $request->validate
        ([
      	'name'  => 'required',
      	'division_id' => 'required',
         ]);

      $district = new District();
      $district->ds_name = $request->name;
      $district->division_id = $request->division_id;
     


      $district->save();


      Session()->flash('success','A new district has Added Successfully !!');
      return redirect()->route('admin.district.list');


    	
     }

 

      public function list()
    {
      $divisions = Division::orderBY('d_priority','asc')->get();
    	$districts = District::orderBY('ds_name','asc')->get();
    	return view('admin.pages.district.index',compact('districts','divisions'));

    }
    
      public function update(Request $request,$id)
    {
    	$request->validate
        ([
      	'name'  => 'required',
      	'division_id' => 'required',
         ]);


      $district = District::find($id);


      $district->ds_name = $request->name;
      $district->division_id = $request->division_id;
     
     
      $district->save();

      session()->flash('success', 'district Updated Successfully!!');
      return redirect()->route('admin.district.list');




    }
     public function delete($id)
     {
    	 
    	$district = District::find($id);
    
   
    
    		$district->delete();
    	
    	session()->flash('success','district Has Deleted Successfully!!');
    	return back();

   

   }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
use App\Division;

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
    	$districts = District::orderBY('ds_name','asc')->get();
    	return view('admin.pages.district.index',compact('districts'));

    }
     public function edit($id)
     {
     	$divisions = Division::orderBY('d_priority','asc')->get();
     	$district = District::find($id);
     	if (!is_null($district)) 
     	{
     	  return view('admin.pages.district.edit',compact('district','divisions'));	
     	}
     	else
     	{
     		return redirect()->route('admin.district.list');
     	}
     	

    	
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

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Division;

class DivisionController extends Controller
{

    public function __construct()
  {
    $this->middleware('auth:admin');
  }
     public function create()
    {
    	
    	return view('admin.pages.division.create');

    }


     public function store(Request $request)
     {
        $request->validate
        ([
      	'name'  => 'required',
      	'priority' => 'required',
         ]);

      $division = new Division();
      $division->d_name = $request->name;
      $division->d_priority = $request->priority;
     


      $division->save();


      Session()->flash('success','A new Division has Added Successfully !!');
      return redirect()->route('admin.division.list');


    	
     }



      public function list()
    {
    	$divisions = Division::orderBY('d_priority')->get();
    	return view('admin.pages.division.index',compact('divisions'));

    }
   
      public function update(Request $request,$id)
    {
    	   $request->validate
        ([
      	'name'  => 'required',
      	'priority' => 'required',
         ]);


      $division = Division::find($id);
      $division->d_name = $request->name;
      $division->d_priority = $request->priority;
     
     
      $division->save();

      session()->flash('success', 'division Updated Successfully!!');
      return redirect()->route('admin.division.list');




    }
     public function delete($id)
     {
    	 
    	$division = Division::find($id);
    
   
    
    		$division->delete();
    	
    	session()->flash('success','Division Has Deleted Successfully!!');
    	return back();

   

   }
}

<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Image;
use File;
use JsValidator;
class BrandController extends Controller
{

    public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
    public function create()
    {
      $validator=JsValidator::make([
        'name'  => 'required',
        'image' => 'nullable|image',
         ]);
    	
    	return view('admin.pages.brands.create',compact('validator'));

    }


     public function store(Request $request)
     {
      $val= $request->validate
        ([
        'name'  => 'required',
        'image' => 'nullable|image',
         ]);
      $jsValidator = JsValidator::validator($val);
       

      $brand = new Brand();
      $brand->b_name = $request->name;
      $brand->b_description = $request->description;
     

      /*insert image*/


    if (($request->image))
       {
      	$image = $request->file('image');
      	$img = time() . '.'. $image->getClientOriginalExtension();
      	$location = public_path('images/Brands/'.$img);
      	Image::make($image)->save($location);
      	$brand->b_image = $img;	
      }

      $brand->save();


      Session()->flash('success','A new Brand has Added Successfully !!');
      return redirect()->route('admin.brands.list');


    	
     }



      public function list()
    {
    	$brands = Brand::orderBY('id','desc')->get();
    	return view('admin.pages.brands.index',compact('brands'));

    }
     public function edit($id)
     {
     	
     	$sbrand = Brand::find($id);
     	if (!is_null($sbrand)) 
     	{
     	  return view('admin.pages.brands.edit',compact('sbrand'));	
     	}
     	else
     	{
     		return redirect()->route('admin.brands.list');
     	}
     	

    	
     }
      public function update(Request $request,$id)
    {
    	$request->validate
        ([
      	'name'  => 'required',
      	'image' => 'nullable|image',
         ]);

      $brand = Brand::find($id);
      $brand->b_name = $request->name;
      $brand->b_description = $request->description;
     
      /*insert image also*/
      if (($request->image)) 
      {
      	//Delete the old image form folder
      	if (File::exists('images/Brands/'.$brand->image)) 
      	{
      		File::delete('images/Brands/'.$brand->image);
      	}
      	$image = $request->file('image');
      	$img = time() . '.'. $image->getClientOriginalExtension();
      	$location = public_path('images/Brands/'.$img);
      	Image::make($image)->save($location);
      	$brand->b_image = $img;

      }
      $brand->save();

      session()->flash('success', 'Brand Updated Successfully!!');
      return redirect()->route('admin.brands.list');




    }
     public function delete($id)
     {
    	 
    	$brand = Brand::find($id);
    	
	    			
	    		
	    if (File::exists('images/Brands/'.$brand->image)) 
	      	{
	      		File::delete('images/Brands/'.$brand->image);
      	    }
   
    
    		$brand->delete();
    	
    	session()->flash('success','Brand Has Deleted Successfully!!');
    	return back();

   

   }
}

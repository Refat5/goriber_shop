<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Image;
use File;

class CategoryController extends Controller
{

    public function __construct()
  {
    $this->middleware('auth:admin');
  }
   public function create()
    {
      $main_categories = Category::orderBY('c_name','desc')->where('c_parent_id',NULL)->get();
      return view('admin.pages.categorys.create',compact('main_categories'));

    }


     public function store(Request $request)
     {
        $request->validate
        ([
      	'name'  => 'required',
      	'image' => 'nullable|image',
         ]);

      $category = new Category();
      $category->c_name = $request->name;
      $category->c_description = $request->description;
      $category->c_parent_id = $request->parent_id;

      /*insert image*/


    if (($request->image))
       {
      	$image = $request->file('image');
      	$img = time() . '.'. $image->getClientOriginalExtension();
      	$location = public_path('images/categoris/'.$img);
      	Image::make($image)->save($location);
      	$category->c_image = $img;	
      }

      $category->save();


      Session()->flash('success','A new Catefory has Added Successfully !!');
      return redirect()->route('admin.category.list');


    	
     }



      public function list()
    {
    	$categoris = Category::orderBY('id','desc')->get();
    	return view('admin.pages.categorys.index',compact('categoris'));

    }
     public function edit($id)
     {
     	$main_categories = Category::orderBY('c_name','desc')->where('c_parent_id',NULL)->get();
     	$scategory = Category::find($id);
     	if (!is_null($scategory)) 
     	{
     	  return view('admin.pages.categorys.edit',compact('scategory','main_categories'));	
     	}
     	else
     	{
     		return redirect()->route('admin.category.list');
     	}
     	

    	
     }
      public function update(Request $request,$id)
    {
    	$request->validate
        ([
      	'name'  => 'required',
      	'image' => 'nullable|image',
         ]);

      $category = Category::find($id);
      $category->c_name = $request->name;
      $category->c_description = $request->description;
      $category->c_parent_id =$request->parent_id;
      /*insert image also*/
      if (($request->image)) 
      {
      	//Delete the old image form folder
      	if (File::exists('images/categoris/'.$category->image)) 
      	{
      		File::delete('images/categoris/'.$category->image);
      	}
      	$image = $request->file('image');
      	$img = time() . '.'. $image->getClientOriginalExtension();
      	$location = public_path('images/categoris/'.$img);
      	Image::make($image)->save($location);
      	$category->c_image = $img;

      }
      $category->save();

      session()->flash('success', 'Category Updated Successfully!!');
      return redirect()->route('admin.category.list');




    }
     public function delete($id)
     {


    	$category = Category::find($id);
    	if (!is_null($category)) 
	    {
	    		//if it is parent category, then delete all its sub category
	    		if ($category->c_parent_id == NULL)
	    		 {
	    			//Delete sub categories
	    			$sub_categories = Category::orderBY('c_name','desc')->where('c_parent_id',$category->id)->get();
	    			foreach ($sub_categories as $sub)
	    				{
	    					//delete category image
	    					if (File::exists('images/categoris/'.$sub->image)) 
							      	{
							      		File::delete('images/categoris/'.$sub->image);
							      	}
	      							$sub->delete();
	    				
	    			    }
	    		}
	    if (File::exists('images/categoris/'.$category->image)) 
	      	{
	      		File::delete('images/categoris/'.$category->image);
      	    }

       $category->delete();
     }
    
    	
    	
    	session()->flash('success','Category Has Deleted Successfully!!');
    	return back();

   

   }
}

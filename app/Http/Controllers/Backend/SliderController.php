<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Image;
use File;

class SliderController extends Controller
{   public function __construct()
  {
    $this->middleware('auth:admin');
  }
   
     public function store(Request $request)
     {
        $request->validate
        ([
      	'title'  => 'required',
      	'image' => 'nullable|image',
      	'priorety' =>'required',
      	'button_text' =>'nullable',
      	'button_url' =>'nullable|url'


         ]);

      $slider = new Slider();
      $slider->title = $request->title;
      $slider->priorety = $request->priorety;
      $slider->button_text = $request->button_text;
      $slider->button_url = $request->button_url;


      /*insert image*/


    if (($request->image))
       {
      	$imag = $request->file('image');
      	$img = time() . '.'. $imag->getClientOriginalExtension();
      	$location = public_path('images/sliders/'.$img);
      	Image::make($imag)->save($location);
      	$slider->image = $img;	
      }

      $slider->save();


      Session()->flash('success','A new slider has Added Successfully !!');
      return redirect()->route('admin.slider.list');


    	
     }



 



      public function list()
    {
    	$sliders = Slider::orderBY('id','desc')->get();
    	return view('admin.pages.slider.index',compact('sliders'));

    }
     
      public function update(Request $request,$id)
    {
    	$request->validate
        ([
      	'title'  => 'required',
      	'image' => 'image',
      	'priorety' =>'required',
      	'button_text' =>'nullable',
      	'button_url' =>'nullable|url'
         ],
         [
         	'title.required' =>'please write a provied Titel',
         ]
     );

      $slider = Slider::find($id);
      $slider->title = $request->title;
      $slider->priorety = $request->priorety;
      $slider->button_text = $request->button_text;
      $slider->button_url = $request->button_url;
      /*insert image also*/
      if (($request->image)) 
      {
      	//Delete the old image form folder
      	if (File::exists('images/sliders/'.$slider->image)) 
      	{
      		File::delete('images/sliders/'.$slider->image);
      	}
      	$imag= $request->file('image');
      	$img = time() . '.'. $imag->getClientOriginalExtension();
      	$location = public_path('images/sliders/'.$img);
      	Image::make($imag)->save($location);
      	$slider->image = $img;

      }
      $slider->save();

      session()->flash('success', 'Slider Updated Successfully!!');
      return redirect()->route('admin.slider.list');




    }
     public function delete($id)
     {
    	 
    	$slider = Slider::find($id);
    	
	    			
	    if (!is_null($slider)) 
	    {
	    			
	    			
	    if (File::exists('images/sliders/'.$slider->image)) 
	      	{
	      		File::delete('images/sliders/'.$slider->image);
      	    }
   
    
    		$slider->delete();
    		}	
    	
    	session()->flash('success','Slider Has Deleted Successfully!!');
    	return back();

   

   }
}

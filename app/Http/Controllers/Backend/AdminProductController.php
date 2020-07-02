<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage; 
use Illuminate\Support\Str;
use Image;

class AdminProductController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function list()
    {

	 	$product = Product::orderBY('id','desc')->paginate(8); 

	 	
    	return view('admin.pages.product.index')->with('product',$product);
    }
     public function edit($id)
    {

	 	$sproduct = Product::find($id);

	 	
    	return view('admin.pages.product.edit')->with('sproduct',$sproduct);
    }


    public function create()
    {
    	return view('admin.pages.product.create');
    }
    public function store(Request $request)
    {


      $request->validate([
      	'p_title'  => 'required',
      	'p_description' => 'required',
      	'p_price' => 'required',
      	'p_quantity' => 'required',
        'category_id' =>'required',
        'brand_id' =>'required',
      ]);

    	$product=new Product;
    	$product->p_title = $request->p_title;
    	$product->p_description = $request->p_description;
    	$product->p_price = $request->p_price;
    	$product->p_quantity = $request->p_quantity;
    	$product->p_slug =Str::slug($request->p_title);
    	$product->category_id = $request->category_id; 
    	$product->brand_id = $request->brand_id; 
    	$product->admin_id = 1; 

    	$product->save();


    	 /*if ($request->hasFile('product_image'))
    	  {
    	 	$image = $request->file('product_image');
    	 	$img = time().'.'.$image->getClientOriginalExtension();
    	 	$location = public_path('images/products/'.$img);
    	 	Image::make($image)->save($location);

    	 	$product_image = new ProductImage;
    	 	$product_image->product_id = $product->id;
    	 	$product_image->image = $img;
    	 	$product_image->save();
    	 }*/

    	 if (count($request->product_image)>0) 
    	 {
            $i = 0;
    	 	foreach ($request->product_image as $image) 
    	 	{
    	 		$img = time(). $i .'.'.$image->getClientOriginalExtension();
    	 	$location = public_path('images/products/'.$img);
    	 	Image::make($image)->save($location);

    	 	$product_image = new ProductImage;
    	 	$product_image->product_id = $product->id;
    	 	$product_image->image = $img;
    	 	$product_image->save();
            $i++;
    	 		
    	 	}
    	 }
         session()->flash('success','Product Added successfully!');

    	return redirect()->route('admin.product.list');



    }
    public function update(Request $request,$id)
    {


      $request->validate([
      	'p_title'  => 'required',
      	'p_description' => 'required',
      	'p_price' => 'required',
      	'p_quantity' => 'required',
        'category_id' =>'required',
        'brand_id' =>'required',

      ]);

    	$product = Product::find($id);
    	$product->p_title = $request->p_title;
    	$product->p_description = $request->p_description;
    	$product->p_price = $request->p_price;
    	$product->p_quantity = $request->p_quantity;
    	$product->p_slug =Str::slug($request->p_title);
       $product->category_id = $request->category_id; 
        $product->brand_id = $request->brand_id; 
    	$product->admin_id = 1; 
    	

    	$product->save();

         if (count($request->product_image)>0) 
         {
            $i = 0;
            foreach ($request->product_image as $image) 
            {
                $img = time(). $i .'.'.$image->getClientOriginalExtension();
            $location = public_path('images/products/'.$img);
            Image::make($image)->save($location);

            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();
            $i++;
                
            }
         }
         session()->flash('success','Product Added successfully!'); 


    	 
    	

    	return redirect()->route('admin.product.list');



    }
    public function delete($id)
    {  
    	$product = Product::find($id);
    	if (!is_null($product))
    	 {
    		$product->delete();
    	}

        //delete all images
        foreach ($product->Images as $image) 
        {
            //delete form path
            $file_name = $image->image;
            if (file_exists("images/products/".$file_name)) {
              unlink("images/products/".$file_name);
            }
           $image->delete();
        }
    	session()->flash('success','Product Has Deleted Successfully!!');
    	return back();

    }


}

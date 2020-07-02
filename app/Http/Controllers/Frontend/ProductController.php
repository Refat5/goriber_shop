<?php


namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	 public function product()
	 {
	 	$product = Product::orderBY('id','desc')->paginate(6);

	 	return view('pages.product.index')->with('product',$product);
	 }
	 public function show($p_slug)
	 {
	 	$product = Product::where('p_slug',$p_slug)->first();
	 	if (!is_null($product))
	 	 {
	 		return view('pages.product.show',compact('product'));
	 	}
	 	else
	 	{
	 		Session()->flash('errors','Sorry !! There is no Product Avalabel');
	 		return view('pages.product.show');
	 	}
	 
	 }
    
}

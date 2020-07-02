<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Slider;


class PagesController extends Controller
{
	 
	 public function index()
	 {

	 	$sliders = Slider::orderBY('priorety','desc')->get();
	 	$product = Product::orderBY('id','desc')->paginate(6);

	 	return view('pages.index',compact('product','sliders'));
	 }
	 public function search(Request $request)
	 {
	 	$search = $request->search;

	 	$product = Product::orWhere('p_title', 'like', '%'.$search.'%')
	 	->orWhere('p_description', 'like', '%'.$search.'%')
	 	->orWhere('p_slug', 'like', '%'.$search.'%')
	 	->orWhere('p_price', 'like', '%'.$search.'%')
	 	->orWhere('p_quantity', 'like', '%'.$search.'%')

	 	->orderBY('id','desc')
	 	->paginate(6);

	 	return view('pages.product.search',compact('product','search'));

	 }

	 public function contact()
	 {
       return view('pages.contact');
	 }

    public function about()
    {
    	return view('pages.about');

    }
	
}

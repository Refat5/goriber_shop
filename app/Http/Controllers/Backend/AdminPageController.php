<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage; 
use Illuminate\Support\Str;
use Image;

class AdminPageController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:admin');
	}
    public function index()
    {

    	return view('admin.pages.index');

    }
   

}

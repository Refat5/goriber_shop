<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CeategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if (!is_null($category))
         {
            return view('pages.categories.show',compact('category'));

        }
        else
        {
            session()->flash('errors','Sorry ! There is no category by this ID');
            return redirect('/');
        }
        
    }

  
}

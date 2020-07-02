<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\wishlist;

class WishlistController extends Controller
{
   public function index()
   {
    return view('pages.product.partials.wishlist');
   }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required'
        ],
        [
            'product_id.required' => 'Please give a product'

        ]);
        if (Auth::check())
         {
            $wishlist = wishlist::where('user_id', Auth::id())
            ->where('product_id',$request->product_id)
            ->where('order_id',NULL)
            ->first();
        }
        else
        {
            $wishlist = wishlist::where('ip_address',request()->ip())
            ->where('product_id',$request->product_id)
             ->where('order_id',NULL)
            ->first();
        }
        if (!is_null($wishlist))
         {
            $wishlist->increment('product_quantity');
        }
        else
        {
        $wishlist = new wishlist();
        if (Auth::check())
         {
            $wishlist->user_id = Auth::id();
        }

        $wishlist->ip_address = request()->ip();
        $wishlist->product_id = $request->product_id;
        $wishlist->save();
        
          }

          return json_encode(['status' => 'success','Message' => 'Item Added to wishlist', 'totalItemw' => wishlist::totalItemw()]);
      }


      public function destroy($id)
      {
         $wishlist = wishlist::find($id);
        if (!is_null($wishlist)) 
        {
           
           $wishlist->delete();
        }
        else
        {
            return redirect()->route('wishlist');

        }
        session()->flash('success','wishlist item Has Deleted Successfully!');
        return back();
      }

   
}




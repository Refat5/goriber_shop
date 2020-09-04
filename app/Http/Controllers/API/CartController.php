<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Cart;

class CartController extends Controller
{
    public function hello()
    {

      echo"helo";

    }

   public function index()
    {

        return view('pages.product.partials.carts');

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
            $cart = Cart::where('user_id', Auth::id())
            ->where('product_id',$request->product_id)
            ->where('order_id',NULL)
            ->first();
        }
        else
        {
            $cart = Cart::where('ip_address',request()->ip())
            ->where('product_id',$request->product_id)
             ->where('order_id',NULL)
            ->first();
        }
        if (!is_null($cart))
         {
            $cart->increment('product_quantity');
        }
        else
        {
        $cart = new Cart();
        if (Auth::check())
         {
            $cart->user_id = Auth::id();
        }

        $cart->ip_address = request()->ip();
        $cart->product_id = $request->product_id;
        $cart->save();
        
          }

          return json_encode(['status' => 'success','Message' => 'Item Added to Cart', 'totalItem' => Cart::totalItem()]);
      }

       public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)) 
        {
           $cart->product_quantity = $request->product_quantity;
           $cart->save();
        }
        else
        {
            return redirect()->route('carts');

        }
        session()->flash('success','Cart item Has Updated Successfully!');
        return back();
    }
        public function destroy($id)
    {
         $cart = Cart::find($id);
        if (!is_null($cart)) 
        {
           
           $cart->delete();
        }
        else
        {
            return redirect()->route('carts');

        }
        session()->flash('success','Cart item Has Deleted Successfully!');
        return back();
    }

   
}


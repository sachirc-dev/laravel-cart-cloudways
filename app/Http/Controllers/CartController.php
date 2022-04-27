<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function cart()
    {
        //dd(session('cartItems'));
        return view('cart.cart');
        
    }

    public function addToCart($id)
    {
        $product = Product::findOrfail($id);
        $cartItems = session()->get('cartItems', []);
        
        if(isset($cartItems[$id])) {
            $cartItems[$id]['quantity']++;
        }else{
            $cartItems[$id] = [
                'name' => $product->name,
                'image_path' =>$product->image_path,
                'details' => $product-> details,
                'price' => $product-> price,
                'quantity' => 1,
                'brand' => $product->brand
            ];
        }

        session()->put('cartItems', $cartItems);
        return redirect()->route('cart')->with('success', 'Product added to cart');

    }

    public function delete(Request $request)
    {
        if($request->id)
        {
            $cartItems = session()->get('cartItems');
            if(isset($cartItems[$request->id]))
            {
                unset($cartItems[$request->id]);
                session()->put('cartItems', $cartItems);
            }
        
            return redirect()->back()->with('success', 'Cart item deleted successfully');
        }

        
    }

    public function updatecart(Request $request, $id)
    {
        $cartItems = session()->get('cartItems');
        if($cartItems[$id])
        {
            $cartItems[$id]['quantity'] = $request->quantity;
        }

        session()->put('cartItems', $cartItems);
        return redirect()->back()->with('success', 'Quantity updated');
    }
}

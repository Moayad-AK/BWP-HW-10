<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = $user->cartitems;

        return view('cartitems.index', ['user' => $user, 'cartItems' => $cartItems]);
    }

    public function store()
    {
        // dd(request()->user()->id);
        $attributes = request()->validate([
            'product_id' => ['required', 'exists:products,id'],
            'user_id' => ['required', 'exists:users,id'],
            'quantity' => ['nullable', 'numeric']
        ]);

        $cartItem = CartItem::firstOrCreate($attributes);
        

        return to_route('products.index');
    }


    public function destroy()
    {   
        $product_id = request('product_id');
        CartItem::where('product_id', $product_id)->delete();
        return redirect('/cartitems');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function create()
    {   
        $user = Auth::user();
        foreach($user->cartItems as $cartItem) {
            $price[] = $cartItem->product->price * $cartItem->quantity;
        }
        $totalPrice = array_sum($price);
        
        return view('orders.create', ['user' => $user, 'totalPrice' => $totalPrice]);
    }

    public function store()
    {
        // dd(request()->address);
        $userId = Auth::user()->id;
        request()->validate([
            'user_id' => ['exists:users,id'],
            'order_date' => ['required', 'date'],
            'total_price' => ['required', 'numeric'],
            'address' => ['required',]
        ]);

        $order = Order::create([
            'order_date' => request('order_date'),
            'address' => request()->address,
            'total_price' => request('total_price'),
            'user_id' => $userId,
        ]);
        $user = Auth::user();
        //Create new ordeItem in database
        foreach ($user->cartItems as $cartItem) {
            $orderItem = OrderItem::firstOrCreate([
                'price_per_item' => $cartItem->product->price,
                'product_id' => $cartItem->product->id,
                'order_id' => $order->id
            ]);
        }
        CartItem::where('user_id', $userId)->delete();

        return to_route('products.index')->with('message', 'The order sented successfully');
    }


}

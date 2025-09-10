<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index()
    {
        $productsFormDB = Product::simplePaginate(12);
        $user = Auth::user();
        return view('products.index', ['products' => $productsFormDB, 'user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('products.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        // fetch the image to store it in database
        $image = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('products-images', $image, 'store-image');

        //validate the data
        request()->validate([
            'title' => ['required', 'min:4'],
            'description' => ['required', 'min:15'],
            'price' => ['required', 'numeric'],
            'image' => ['required'],
            'user_id' => ['exists:users,id']
        ]);

        //get the data from the user
        $userId = Auth::user()->id;
        $productName = request()->title;
        $productPrice = request()->price;
        $productDescription = request()->description;
        //store the data in the database
        $product = Product::create([
            'title' => $productName,
            'price' => $productPrice,
            'description' => $productDescription,
            'user_id' => $userId,
            'image' => $imagePath
        ]);
        return to_route('products.index');
    }

    public function show(Product $product)
    {
        $user = Auth::user();
        return view('products.show', ['product' => $product, 'user' => $user]);
    }

    public function edit(Product $product)
    {
        $user = Auth::user();
        return view('products.edit', ['product' => $product, 'user' => $user]);
    }

    public function update(Product $product, Request $request)
    {
        // fetch the image to update it in database
        $image = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('products-images', $image, 'store-image');
        //validat the data
        request()->validate([
            'title' => ['required', 'min:4'],
            'description' => ['required', 'min:15'],
            'price' => ['required', 'numeric'],
            'image' => ['required'],
            'user_id' => ['exists:users,id']
        ]);

        //get the data that need to update
        $userId = Auth::user()->id;
        $productName = request()->title;
        $productPrice = request()->price;
        $productDescription = request()->description;

        $product->update([
            'title' => $productName,
            'price' => $productPrice,
            'description' => $productDescription,
            'user_id' => $userId,
            'image' => $imagePath
        ]);
        return to_route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index');
    }
}

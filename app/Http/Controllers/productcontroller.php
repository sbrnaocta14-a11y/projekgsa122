<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class productcontroller extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | READ
    |--------------------------------------------------------------------------
    */

    public function product()
    {
        $products = Product::latest()->get();

        return view('product', compact('products'));
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE - FORM
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('product-create');
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE - SAVE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'category' => 'required|in:Arabica,Robusta',

            'type' => 'required|string|max:255',

            'description' => 'required|string',

            'price' => 'required|numeric|min:0',

            'weight' => 'required|integer|min:1',

            'rating' => 'required|numeric|min:0|max:5',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        $imagePath = null;


        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')
                ->store('products', 'public');

        }


        Product::create([

            'name' => $request->name,

            'category' => $request->category,

            'type' => $request->type,

            'description' => $request->description,

            'price' => $request->price,

            'weight' => $request->weight,

            'rating' => $request->rating,

            'image' => $imagePath,

        ]);


        return redirect('/product')
            ->with('success', 'Coffee berhasil ditambahkan!');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT - FORM
    |--------------------------------------------------------------------------
    */

    public function edit(Product $product)
    {
        return view('product-edit', compact('product'));
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Product $product)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'category' => 'required|in:Arabica,Robusta',

            'type' => 'required|string|max:255',

            'description' => 'required|string',

            'price' => 'required|numeric|min:0',

            'weight' => 'required|integer|min:1',

            'rating' => 'required|numeric|min:0|max:5',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        $imagePath = $product->image;


        if ($request->hasFile('image')) {

            if ($product->image) {

                Storage::disk('public')->delete($product->image);

            }


            $imagePath = $request->file('image')
                ->store('products', 'public');

        }


        $product->update([

            'name' => $request->name,

            'category' => $request->category,

            'type' => $request->type,

            'description' => $request->description,

            'price' => $request->price,

            'weight' => $request->weight,

            'rating' => $request->rating,

            'image' => $imagePath,

        ]);


        return redirect('/product')
            ->with('success', 'Coffee berhasil diperbarui!');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy(Product $product)
    {
        if ($product->image) {

            Storage::disk('public')->delete($product->image);

        }


        $product->delete();


        return redirect('/product')
            ->with('success', 'Coffee berhasil dihapus!');
    }
}
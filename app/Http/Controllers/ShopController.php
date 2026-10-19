<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {$query = Product::query();

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')
            && in_array(strtolower($request->category), ['arabica', 'robusta'])) {
            $query->whereRaw(
                'LOWER(category) = ?',
                [strtolower($request->category)]
            );
        }

        $products = $query->latest()->get();

        return view('shop.index', compact('products'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // adjust this according to your project structure

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $product = new Product;
        $product->fill($request->all());
        $product->save();

        return response()->json([
            'success' => true,
            'data' => $product
        ], 201);
    }

    public function removeProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'error' => 'No product found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'data' => []
        ], 200);
    }
}

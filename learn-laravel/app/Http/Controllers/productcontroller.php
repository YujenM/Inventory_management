<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function checkuser(){
    echo"I am batman";
    }
    public function getproducts($user_id)
    {
        $products = Product::where('user_id', $user_id)->get();

        if ($products->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No products found for this user.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $products
        ], 200);
    }
    public function createProduct(Request $request, $user_id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer',
        ]);

        $product = Product::create([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'user_id' => $user_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }
    public function updateProduct(Request $request, $user_id, $product_id)
    {
        $request->validate([
            'product_name' => 'sometimes|string|max:255',
            'product_price' => 'sometimes|numeric',
            'product_quantity' => 'sometimes|integer',
        ]);

        $product = Product::where('user_id', $user_id)->where('product_id', $product_id)->first();
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found for this user.'
            ], 404);
        }

        $product->update($request->only(['product_name', 'product_price', 'product_quantity']));

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ], 200);
    }

    public function deleteProduct($user_id, $product_id)
    {
        $product = Product::where('user_id', $user_id)->where('product_id', $product_id)->first();
        
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found for this user.'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], 200);
    }

}

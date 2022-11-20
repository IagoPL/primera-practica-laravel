<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function insertProduct(Request $request)
    {
        $products = new Products();
        $products->product_name = $request->product_name;
        $products->price = $request->price;
        $products->stock = $request->stock;
        $products->description = $request->description;
        $products->category = $request->category;
        $products->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡$products->product_name fue registrado!",
        ]);
    }
    public function readProduct(Request $request)

    {
        $products = new Products();
        $products->category = $request->category;

        return Products::where('category', '=', $products->category)->get();

    }

    public function updateProduct(Request $request)
    {
        $products = new Products();
        $products->id = $request->id;
        $products->product_name = $request->product_name;
        $products->price = $request->price;
        $products->stock = $request->stock;
        $products->description = $request->description;
        $products->category = $request->category;
        $products = Products::find($products->id);
        $products->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'category' => $request->category,

        ]);
        return response()->json([
            "status" => 1,
            "msg" => "¡$products->product_name fue modificado!",
        ]);
    }

    public function deleteProduct(Request $request)
    {
        $products = new Products();
        $products->id = $request->id;
        if ($products = Products::find($products)) return Products::destroy($products);
    }
}

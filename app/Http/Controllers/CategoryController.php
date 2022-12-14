<?php
namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function insertCategory(Request $request)
    {
        $products = new Category();
        $products->product_name = $request->product_name;
        $products->price = $request->price;
        $products->stock = $request->stock;
        $products->description = $request->description;
        $products->category = $request->category;
        $products->save();

        return response()->json([ 
            "status" => 1,
            "msg" => "!$products->product_name fue registrado!",
        ]);
    }

    public function readCategory(Request $request)

    {

        $products = new Category();
        $products->category = $request->category;

        return Category::where('category', '=', $products->category)->get();

    }

    public function updateCategory(Request $request)
    {
        $products = new Category();
        $products->id = $request->id;
        $products->product_name = $request->product_name;
        $products->price = $request->price;
        $products->stock = $request->stock;
        $products->description = $request->description;
        $products->category = $request->category;
        $products = Category::find($products->id);
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

    public function deleteCategory(Request $request)
    {
        $products = new Category();
        $products->id = $request->id;
        if ($products = Category::find($products)) return Products::destroy($products);
    }
}

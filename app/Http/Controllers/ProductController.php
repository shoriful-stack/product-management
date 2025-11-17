<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id'   => 'required|unique:products,product_id',
            'name'         => 'required|string',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
            'stock'        => 'required|integer',
            'image'        => 'required|string',
        ]);

        $base64Image = $request->image;
        $imageName = time() . '_' . uniqid() . '.png';

        $imagePath = storage_path('app/public/products/' . $imageName);

        if (!file_exists(dirname($imagePath))) {
            mkdir(dirname($imagePath), 0755, true);
        }

        $base64Data = preg_replace('#^data:image/\w+;base64,#i', '', $base64Image);
        file_put_contents($imagePath, base64_decode($base64Data));

        $dbPath = 'products/' . $imageName;

        Product::create([
            'product_id'  => $request->product_id,
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $dbPath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product Created Successfully!');
    }
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
}

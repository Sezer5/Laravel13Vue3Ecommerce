<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     *  Get all the products
     */
    public function index()
    {
        return ProductResource::collection(
            Product::with(['category', 'sizes', 'colors'])->get()
        )->additional([
            'category' => Category::has('products')->get(),
            'colors' => Color::has('products')->get(),
            'sizes' => Size::has('products')->get(),
        ]);
    }

    /**
     *  Get product by id
     */

    public function show(Product $product)
    {
        if (!$product) {
            abort(404);
        }
        return ProductResource::collection(
            $product->load(['category', 'sizes', 'colors'])->get()
        );
    }

    /**
     *  Filtering by categories
     */

    public function filterProductsByCategory(Category $category)
    {
        return ProductResource::collection(
            $category->products()->with(['category', 'sizes', 'colors'])->get()
        )->additional([
            'category' => Category::has('products')->get(),
            'colors' => Color::has('products')->get(),
            'sizes' => Size::has('products')->get(),
            'filter' => $category->name
        ]);
    }

    /**
     *  Filtering by color
     */

    public function filterProductsByColor(Color $color)
    {
        return ProductResource::collection(
            $color->products()->with(['category', 'sizes', 'colors'])->get()
        )->additional([
            'category' => Category::has('products')->get(),
            'colors' => Color::has('products')->get(),
            'sizes' => Size::has('products')->get(),
            'filter' => $color->name
        ]);
    }

    /**
     *  Filtering by size
     */

    public function filterProductsBySize(Size $size)
    {
        return ProductResource::collection(
            $size->products()->with(['category', 'sizes', 'colors'])->get()
        )->additional([
            'category' => Category::has('products')->get(),
            'colors' => Color::has('products')->get(),
            'sizes' => Size::has('products')->get(),
            'filter' => $size->name
        ]);
    }

    /**
     *  Filtering by term
     */

    public function findProductByTerm($searchTerm)
    {
        return ProductResource::collection(
            Product::where('name', 'LIKE', '%' . $searchTerm . '%')->with(['category', 'sizes', 'colors'])->get()
        )->additional([
            'category' => Category::has('products')->get(),
            'colors' => Color::has('products')->get(),
            'sizes' => Size::has('products')->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index')->with([
            'products' => Product::with(['category','sizes','colors'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create')->with([
            'categories' => Category::all(),
            'sizes' => Size::all(),
            'colors' => Color::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        if($request->validated()){
            $data = $request->validated();
            if($request->has('thumbnail')){
                $data['thumbnail']=$this->saveImage($request->file('thumbnail'));
            }
            if($request->has('first_image')){
                $data['first_image']=$this->saveImage($request->file('first_image'));
            }
            $product = Product::create($data);
            $product->sizes()->sync($request->size_id);
            $product->colors()->sync($request->color_id);
            return redirect()->route('admin.product.index')->with([
                'success' => 'Product added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit')->with([
            'product' => $product->load('category','sizes','colors'),
            'categories' => Category::all(),
            'sizes' => Size::all(),
            'colors' => Color::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if($request->validated()){
            $data = $request->validated();
            if($request->has('thumbnail')){
                $this->deleteImage($product->thumbnail);
                $data['thumbnail'] = $this->saveImage($request->file('thumbnail'));
            }

            if($request->has('first_image')){
                $this->deleteImage($product->first_image);
                $data['first_image'] = $this->saveImage($request->file('first_image'));
            }

            $product->update($data);
            $product->colors()->sync($request->color_id);
            $product->sizes()->sync($request->size_id);

            return redirect()->route('admin.product.index')->with([
                'success' => 'Product updated successfully'
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->deleteImage($product->thumbnail);
        $this->deleteImage($product->first_image);
        $product->delete();
        return redirect()->route('admin.product.index')->with([
                'success' => 'Product deleted successfully'
            ]);
    }

    public function saveImage($file){
        $image = $file->store('images/product','public');
        return 'storage/'.$image;
    }

    public function deleteImage($file){
        $path=public_path($file);
        if(File::exists($path)){
            File::delete($path);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function /*getProducts*/getallproducts()
    {
        $products = Product::orderBy('id')->orderBy('name')->get();
        return $products;
    }
    public function /*getProducts*/getallpromotedproducts()
    {
        $products = Product::orderBy('id')->orderBy('name')->get();
        return $products;
    }

    public function getproductbycategory(Request $request) {
        $categoryId = $request->input('category_id');
        // $brandId = $request->input('brand_id');
        $products = Product::where('category_id', $categoryId)->orderBy('brand_id')->take(10)->get();
        return $products;
    }
    public function getproductbyid(Request $request) {
        $id = $request->input('id');
    
        // Fetch product with category information
        $product = Product::with(['category:id,name', 'brand:id,name'])->find($id);

        return $product;
    }
    public function getProductByIdWithoutCategory(Request $request) {
        $Id = $request->input('id');
        $products = Product::where('id', $Id)->get();
        return $products;
    }

    public function getproductbyname($name) {
        $products = Product::where('name', 'LIKE', '%' . $name . '%')->get();
        return $products;
    }
    

    public function getproductbycategoryandbrand(Request $request)
    {
        $categoryId = $request->input('category_id');
        $brandId = $request->input('brand_id');
    
        // Fetch products with brand name
        $products = Product::select('products.*', 'brands.name as brand_name')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('category_id', $categoryId)
            ->where('brand_id', $brandId)
            ->orderBy('brand_id')
            ->take(10)
            ->get();
    
        return $products;
    }

    public function getallproductsbybrand(Request $request)
    {
        $brandId = $request->input('brand_id');
    
        // Fetch products with brand name
        $products = Product::select('products.*', 'brands.name as brand_name')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('brand_id', $brandId)
            ->orderBy('brand_id')
            ->take(10)
            ->get();
    
        return $products;
    }
    

        public function createProduct(Request $request){

        $product = new Product;
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->pricing = $request->input('pricing');
        $product->description = $request->input('description');
        $product->discount_percent = $request->input('discount_percent');
        $product->discounted_price = $request->input('discounted_price');

        // Handle image upload
        if ($request->has('images')) {
            $imageData = $request->input('images')[0]['data'];
            $extension = explode('/', mime_content_type($imageData))[1]; // Get the image extension from the data

            $allowedExtensions = ['jpeg', 'jpg', 'png']; // Add any other extensions you want to support

            if (!in_array($extension, $allowedExtensions)) {
                return response()->json(['error' => 'Unsupported image format. Supported formats: JPEG, JPG, PNG'], 400);
            }

            $imageData = str_replace("data:image/{$extension};base64,", '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageBinary = base64_decode($imageData);

            $imageName = time() . '.' . $extension;
            $imagePath = 'product_images/' . $imageName;
            \Storage::disk('public')->makeDirectory('product_images');

            // Save the image to storage
            \Storage::disk('public')->put($imagePath, $imageBinary);

            $product->images = $imagePath;
        }


        $product->save();

        return "Product created successfully";
    }

    public function deleteProduct($product_id)
    {
            $product = Product::findOrFail($product_id);
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully'], Response::HTTP_OK);
    }
    public function updateProduct(Request $request, $product_id)
    {
        try {
            // Find the product by ID
            $product = Product::findOrFail($product_id);
    
            // Update product fields
            $product->update($request->except('base64Image'));
            // $product->update($request->all());
    
            // Update the base64 image if present in the request
            if ($request->has('base64Image')) {
                $imageData = $request->input('base64Image');
                $extension = explode('/', mime_content_type($imageData))[1];
    
                $allowedExtensions = ['jpeg', 'jpg', 'png'];
                if (!in_array($extension, $allowedExtensions)) {
                    return response()->json(['error' => 'Unsupported image format. Supported formats: JPEG, JPG, PNG'], 400);
                }
    
                $imageData = str_replace("data:image/{$extension};base64,", '', $imageData);
                $imageData = str_replace(' ', '+', $imageData);
                $imageBinary = base64_decode($imageData);
    
                $imageName = time() . '.' . $extension;
                $imagePath = 'product_images/' . $imageName;
                \Storage::disk('public')->makeDirectory('product_images');
    
                // Save the image to storage
                \Storage::disk('public')->put($imagePath, $imageBinary);
    
                // Update the product's image field
                $product->images = $imagePath;
            }
    
            // Save the updated product to the database
            $product->save();
    
            return response()->json(['message' => 'Product updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle the exception if the product is not found
            return response()->json(['error' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }
    }
    
    

    

    // public function store(Request $request)
    // {
    //     $product = new Product;
    //     $product->name = $request->input('name');
    //     $product->category_id = $request->input('category_id');
    //     $product->pricing = $request->input('pricing'); // Assuming pricing is part of the request
    //     $product->description = $request->input('description'); // Assuming description is part of the request
    //     $product->images = $request->input('images'); // Assuming images is part of the request
    //     // Add more fields as needed
    //     $product->save();
    
    //     return "Product created successfully";
    // }
    
    // public function getProduct($productId){
    //     $product = Product::find($productId);
    //     if (!$product) {
    //         return response()->json(['error' => 'Product not found'], 404);
    //     }
    //     return response()->json(['data' => $product]);
    // }
    // public function updateProduct(Request $request, $productId)
    // {
    //     $product = Product::find($productId);
    //     if (!$product) {
    //         return response()->json(['error' => 'Product not found'], 404);
    //     }
    //     $product->name = $request->input('name');
    //     // Update other fields as needed
    //     $product->save();
    //     return response()->json(['message' => 'Product updated successfully']);
    // }

    // public function deleteProduct($productId)
    // {
    //     $product = Product::find($productId);
    //     if (!$product) {
    //         return response()->json(['error' => 'Product not found'], 404);
    //     }
    //     $product->delete();
    //     return response()->json(['message' => 'Product deleted successfully']);
    // }
}


<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|unique:products,name',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
      ], [
          'name.required' => 'Product name is required',
          'price.required' => 'Product price is required',
          'quantity.required' => 'Product quantity is required',
          'price.numeric' => 'Product price must be a number',
          'quantity.integer' => 'Product quantity must be an integer',
          'price.min' => 'Product price must be greater than or equal to 0',
          'quantity.min' => 'Product quantity must be greater than or equal to 0',
      ]);

      if($validator->fails()){
          return response()->json(['errors' => $validator->errors()], 422);
      }
       // $product = Product::create($validator->validated());

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return response()->json($product, 201);

    }
    public function read(Request $request)
    {
        return Product::all();
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
        ], [
            'product_id.required' => 'Product ID is required',
            'product_id.exists' => 'Product ID does not exist',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $product_id = $request->product_id;
        $product = Product::where('id', $product_id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return 'updated';
       
    }
    public function delete(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::where('id', $product_id)->delete();
        return 'deleted';
    }

    public function index() { 
        return response()->json(Product::all()); 
        } 
}

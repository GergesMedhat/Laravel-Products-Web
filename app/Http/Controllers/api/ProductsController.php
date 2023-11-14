<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Couchbase\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\ProductResource;
use Ramsey\Collection\Collection;


class ProductsController extends Controller
{

    function  __construct(){

      //  $this->middleware('auth:sanctum')->only('store');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return ProductResource::collection($products);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $validator = Validator::make($request->all(), [
            "name"=>"required",
           
        ]);

        if($validator->fails()){
            return response($validator->errors()->all(), 422);
        }
   
  

        $product = Product::create($request->all());
        $product->creator_id = Auth::id();   
        $product->save();

        return (new ProductResource($product))->response()->setStatusCode(201);  
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
               
        return new ProductResource($product);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $validator = Validator::make($request->all(), [
            "name"=>[  Rule::unique('products')->ignore($product->name)]
        ]);
   
        
        if($validator->fails()){
            return response($validator->errors()->all(), 422);
        }
            

        $product->update($request->all());

        return new ProductResource($product);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return response("Deleted", 204);
        
    }
}

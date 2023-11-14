<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ProductsController extends Controller
{
    //
     
    function __construct(){

          $this->middleware('auth')->only('store');       // only logged in can add product
          $this->middleware(['iti'])->only(['store','update']); // product name doesn't contains keyword 'amazon'  
    }


    function index(){   
        $products = Product::select('id','name','image','price','description','created_at','updated_at')->paginate(5);

     // $products = Product::select('id','name','image','price','description','created_at','updated_at')->paginate(5);
      return view('products.index',['products'=>$products]);
    }
    /*
    function  index_db(){

        $products=  DB::table('products')->get();
        return view('products.index', ['products'=>$products]);
    }
    */
    function show($id){

        $product = Product::findorfail($id);
        return view('products.show',['product'=>$product]);
 
    }

    function create(){
        
        $category=Category::all();
        return view('products.create',['category'=>$category]);
    }


    
    function store(){
    /*
        $name = \request()->get('name');
        $image = \request()->get('image');
        $price = \request()->get('price');
        $category_id = \request()->get('category_id');

        $description = \request()->get('description'); 

        $product = new Product();
        $product->name= $name;
        $product->price = $price;
        $product->image= $image;
        $product->description = $description;
        $product->category_id= $category_id;

        $product->save();
     */
        $requestData= \request()->all();
        $requestData['creator_id']=Auth::id();
       $product = Product::create($requestData);
        return to_route('products.show', $product->id);
    }
     
    function edit($id)
    {
        $category=Category::all();
        $product = Product::findorfail($id);
        return view('products.edit',['product'=>$product,'category'=>$category]);
    }


    
    function update(Request $req)
    {
   
        $user= Auth::user();

       $product=Product::findorfail($req->id);

       $response = Gate::inspect('update', $product);
       if($response->allowed()) {
        $product->name=$req->name;
        $product->image=$req->image;
        $product->price=$req->price;
        $product->description=$req->description;
        $category_id = \request()->get('category_id');
        $product->category_id= $category_id;
 
        $product->save();
        return to_route('products.show', $product->id);
     }
             
      return  abort(403);

    }
 
    function destroy($id){
 
        /*
        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        */
        $user= Auth::user();
        $product = Product::findorfail($id);

        $response = Gate::inspect('destroy', $product);
       if($response->allowed()) {
              $product->delete();
              return to_route('products.index');
        }
        
        
        return  abort(403);
        
    }
}


  


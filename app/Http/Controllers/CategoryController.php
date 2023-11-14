<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct(){

        $this->middleware(['iti'])->only(['store','update']);  /// category name doesn't contains keyword 'amazon'  
    }


    public function index()
    {
      //  $category=Category::all();
      $category = Category::select('id','name','logo','created_at','updated_at','deleted_at')->paginate(5);

        return view('category.index',['categories'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
              return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
    
         $category= new Category();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().".".$request->image->extension();
            $request->image->move(public_path('image'),$filename);
            $name = \request()->get('name');
            $category->name= $name;
            $category->logo= $filename;

        }
        $category->save();
        return redirect()->route('category.index');

    }

  
    public function show(Category $category)
    {
        
        return view('category.show',['category'=>$category]);
    }

  
    public function edit(Category $category)
    {
        return view('category.edit',['category'=>$category]);
    }

  
    public function update(UpdateCategoryRequest $request, Category $category)
    {
      
      $category->name=$request->name;
      if($request->file('image')){
        $file= $request->file('image');
        $filename= time().".".$request->image->extension();
        $request->image->move(public_path('image'),$filename);
        $category->logo= $filename;
    }
    $category->save();

        return to_route('category.show',[$category->id]);
    }

  
    public function destroy(Category $category)
    {
        
        
        $category->delete();
        return to_route('category.index');
 
        
    }
}

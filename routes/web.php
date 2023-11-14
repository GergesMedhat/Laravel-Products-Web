<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('products', function(){
    $products = [
        ["id"=>"1", "name"=>"product1"],
        ["id"=>"2", "name"=>"product2"],
        ["id"=>"3", "name"=>"product3"]

    ];
    return $products;
});

*/

/*
Route::get('products/{id}', function($id){
    $products = [
        ["id"=>"1", "name"=>"product1"],
        ["id"=>"2", "name"=>"product2"],
        ["id"=>"3", "name"=>"product3"]

    ];

    foreach ($products as $pro){
            if ($pro["id"]==$id){
                return $pro;
            }
    }
    return abort(404);
});
*/


use App\Http\Controllers\ProductController;

//Route::get('labs-app/products',[ProductController::class, 'productsIndex'] );


Route::get('/home/{id}', [ProductController::class, 'show']);
    

Route::get('/contact', [ProductController::class, 'contact']);
Route::get('/aboutus', [ProductController::class, 'about']);

//Route::get('labs-app/products', [ProductController::class, 'allProducts']);


#####       ProductsController  get data from database

Route::get('products', [ProductsController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
Route::get('products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('products/{id}/delete', [ProductsController::class, 'destroy'])->name('products.destroy');
Route::get('products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
Route::post('products/edit', [ProductsController::class, 'update'])->name('products.update');;
Route::post('products', [ProductsController::class, 'store'])->name('products.store');

####         generate category routes
Route::resource('category',CategoryController::class);


Auth::routes();


Route::get('/home', [ProductsController::class, 'index'])->name('home');


#### Login with github

 
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/callback', function () {

    $githubUser = Socialite::driver('github')->stateless()->user();

    $user = User::where("email", $githubUser->email)->first();

    if(! $user){

            $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password'=> null,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }


    Auth::login($user);

    return redirect('/products');
});
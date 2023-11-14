<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    private $products = [
        ["id"=>"1", "name"=>"Red T-Shirt","price"=>"250","image"=>'/image/zara1.jpg',"description"=>"this is the red t-shirt"],
        ["id"=>"2", "name"=>"Striped Jacket","price"=>"200","image"=>'/image/zara2.jpg',"description"=>"this is the striped jacket"],
        ["id"=>"3", "name"=>"Yellow T-Shirt","price"=>"180","image"=>'/image/zara3.jpg',"description"=>"this is the yellow t-shirt"],
        ["id"=>"4", "name"=>"Black T-Shirt","price"=>"150","image"=>'/image/zara4.jpg',"description"=>"this is the black t-shirt"],
        ["id"=>"5", "name"=>"White T-Shirt","price"=>"150","image"=>'/image/zara5.jpg',"description"=>"this is the white t-shirt"],
        ["id"=>"6", "name"=>"Orange Jacket","price"=>"380","image"=>'/image/zara6.jpg',"description"=>"this is the orange jacket"]

    ];
/*
    function productsIndex(){


        return $this->products;
    }
*/
    function show($id){
        foreach ($this->products as $product){
            if ($product['id']==$id){
                return view('product', ["product"=>$product]);            
            }
        }
        return abort('404');
    
    }
    function contact(){

        return view('contact'); //contact us
    }
    function about(){

        return view('aboutUs'); //about us
    }
    function allProducts(){
        return view('allProducts', ["products"=>$this->products]);
    }

}
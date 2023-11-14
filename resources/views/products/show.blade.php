
@extends('layouts.app')
@section('body')



<div class="card ">
                <div class="card-header">Product</div>

                <div class="card-body">
                <img alt="item" src="{{asset('image/'.$product->image)}}" height="200" width="200">
                  
                </div>
                <div class="card-body">
               ID:  {{$product->id}}
                </div>

                <div class="card-body">
                Name:  {{$product->name}}
                </div>

                <div class="card-body">
              Price:  {{$product->price}}
                </div>

                <div class="card-body">
              Description :  {{$product->description}}
                </div>  


              @if($product->category)
                <div class="card-body">
    
                  <h5> Category :<a href="{{route('category.show', $product->category->id)}}"> {{$product->category->name}}  </a>  </h5>   
                </div>  
              @endif              

                <div class="card-body">
              created at :  {{$product->created_at}}
                </div>
                <div class="card-body">
              updated at :  {{$product->updated_at}}
                </div>
                <div class="card-body">
                <a href="{{route('products.index')}}"  class="btn btn-info">Back To Products</a>
                </div>

  
            </div>



@endsection

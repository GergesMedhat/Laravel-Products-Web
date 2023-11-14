
@extends('layouts.app')
@section('content')



<div class="card ">
                <div class="card-header">Category</div>

                <div class="card-body">
                <img alt="item" src="{{asset('image/'.$category->logo)}}" height="200" width="200">
                  
                </div>
                <div class="card-body">
               ID:  {{$category->id}}
                </div>

                <div class="card-body">
                Name:  {{$category->name}}
                </div>

                <div class="card-body">
              created at :  {{$category->created_at}}
                </div>
                <div class="card-body">
              updated at :  {{$category->updated_at}}
                </div>
                <div class="card-body">
                <a href="{{route('category.index')}}"  class="btn btn-info">Back To Categories</a>
                </div>

            </div>

            @if($category->products)

            <div>

              <h1>Products in this Category</h1>

              <ul>
               @foreach($category->products as $pro)
   
                 <li><a href="{{route('products.show',$pro->id)}}">{{$pro->name}}</a></li>
 
               @endforeach
              </ul>
              
            </div>
            @endif  

@endsection

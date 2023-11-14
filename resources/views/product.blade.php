
@extends('layouts.app')
@section('body')



<div class="card ">
                <div class="card-header">Product</div>

                <div class="card-body">
                <img alt="item" src="{{$product['image']}}" height="200" width="200">
                  
                </div>
                <div class="card-body">
               ID:  {{$product['id']}}
                </div>

                <div class="card-body">
                Name:  {{$product['name']}}
                </div>

                <div class="card-body">
              Price:  {{$product['price']}}
                </div>

                <div class="card-body">
              Description :  {{$product['description']}}
                </div>

  
            </div>



@endsection

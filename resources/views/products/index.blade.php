@extends('layouts.app')

@section('body')
   
  <h1>all products from data base </h1>
  <style>
.card-columns {
  display: flex;
  flex-wrap: nowrap;
}

.card-columns > .card {
  width: 15%;
  margin: 10px;
  text-align:center;
}
</style>

    <a href="{{route('products.create')}}" class="btn btn-success">Add New Product</a>
    <div class="row">
        <div class="card-columns">
        @foreach($products as $product)
            <div class="card ">
                <div class="card-header">Product</div>

                <div class="card-body">
                <img alt="item" src="{{asset('image/'.$product->image)}}" height="200" width="200"> 
                  
                </div>
                <div class="card-body">
                {{ $product->name }}
                </div>

                <div class="card-body">
                <a href="{{route('products.show',$product->id)}}"  class="btn btn-info">Show</a>
                <a href="{{route('products.edit',$product->id)}}"  class="btn btn-warning">Edit</a>
                <a href="{{route('products.destroy',$product->id)}}"  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product or not?')"> Delete</a>

                </div>

  
            </div>
            @endforeach
        
        </div>
        {{ $products->onEachSide(5)->links() }}




    </div>
@endsection
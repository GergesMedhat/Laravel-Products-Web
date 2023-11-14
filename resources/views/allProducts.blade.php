@extends('layouts.app')


@section('body')
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
<h1> Welcome to Product page </h1>


    <div class="row">
        <div class="card-columns">
        @foreach($products as $product)
            <div class="card ">
                <div class="card-header">Product</div>

                <div class="card-body">
                <img alt="item" src="{{$product['image']}}" height="200" width="200">
                  
                </div>
                <div class="card-body">
                {{$product['name']}}
                </div>

                <div class="card-body">
                <a href="/home/{{$product['id']}}"  class="btn btn-info"> Show</a>

                </div>

  
            </div>
            @endforeach

        </div>
    </div>



@endsection



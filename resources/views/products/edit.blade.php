@extends('layouts.app')

@section('content')
   
<h1> Edit Product</h1>

<form method="POST"  action="{{route('products.update')}}">
    @csrf
    
    <div class="mb-3">
            <input type="hidden" class="form-control" name="id"  value="{{$product->id}}">
    </div>
    <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  value="{{$product->name}}">
    </div>

    <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type="text" name="image" class="form-control" value="{{$product->image}}" >
    </div>

    <div class="mb-3">
        <label  class="form-label">price</label>
        <input type="text" class="form-control" name="price" value="{{$product->price}}" >
    </div>

    <div class="mb-3">
            <label  class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{$product->description}}">
    </div>
  

    <div class="mb-3">
            <label  class="form-label">Category</label>
            <select class="form-select" name="category_id">
                <option selected disabled value="">Choose Category</option>
                @foreach($category as $cate)
                <option value="{{$cate->id}}">{{$cate->name}}</option>
                @endforeach
            </select>
    </div>

    <button class="btn btn-success" type="submit">Update Product</button>
</form>


@endsection
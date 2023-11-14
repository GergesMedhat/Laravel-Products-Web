@extends('layouts.app')

@section('content')
   
<h1> Create New Product</h1>

<form method="post"  action="{{route('products.store')}}">
    @csrf
    <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name" >
    </div>

    <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type="text" name="image" class="form-control" >
    </div>

    <div class="mb-3">
        <label  class="form-label">price</label>
        <input type="text" class="form-control" name="price" >
    </div>

    <div class="mb-3">
            <label  class="form-label">description</label>
            <input type="text" class="form-control" name="description" >
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
 
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
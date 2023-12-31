@extends('layouts.app')

@section('content')
   
<h1> Edit Category</h1>

<form method="POST"  action="{{route('category.update', $category->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
            <input type="hidden" class="form-control" name="id"  value="{{$category->id}}">
         
    </div>
    <div class="mb-3">c
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  value="{{$category->name}}">
            @error('name')
                <div style="color: red; font-weight: bold"> {{$message}}</div>
            @enderror
    </div>

    <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type="file" name="image" class="form-control" >
    </div>

   

   

    <button class="btn btn-success" type="submit">Update Category</button>
</form>


@endsection
@extends('layout.main')
@push('title')
    <title>Category Edit</title>
@endpush
@section('main-container')
<div class="container mx-auto ">

  <h3 class="text-center py-2">Edit Category</h3>
  <form method="POST" action="{{url('category', $categories->id)}}" id="category_form" enctype="multipart/form-data">
    @csrf
    @method("put")
    <div class="form-group mb-3">
      <label for="exampleInputEmail1" class="py-2">Category Name</label>
      <input type="text" class="form-control" value="{{$categories->category}}" name="category_name" placeholder="Category Name">
    </div>
    <div class="form-group mb-3">
      <label class="py-2">Description</label>
      <input type="text"  name="category_dis" value="{{$categories->description}}" class="form-control" placeholder="Description">
    </div>
    <div class="form-group mb-2">
      <input type="file"  name="image" id="image-file"  class="form-control" placeholder="Description">
    </div>
   <div class="py-2">
    <img id="image-preview" src="{{Storage::disk('public')->url('upload/'.$categories->image)}}" width="50px" height="50px" />
  </div> 
    <button type="submit" class="btn btn-success">Update Category</button>
  </form> 
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\CategoryRequest', "#category_form") !!}
@include('imagepreview')
@endpush

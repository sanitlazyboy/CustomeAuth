@extends('layout.main')
@push('title')
    <title>Category</title>
@endpush
@section('main-container')
<div class="container mx-auto ">

  <h3 class="text-center py-2">Category Create</h3>
  <form method="post" action="{{url('category')}}" id="category_form" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
      <label for="exampleInputEmail1" class="py-2">Category Name</label>
      <input type="text" class="form-control" name="category_name" placeholder="Category Name">
    </div>
    <div class="form-group mb-3">
      <label class="py-2">Description</label>
      <input type="text"  name="category_dis" class="form-control" placeholder="Description">
    </div>
    <div class="form-group mb-2">
      <input type="file"  name="image" id="image-file" class="form-control" placeholder="Description">
      <div class="py-2">
        <img id="image-preview" src="https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" alt="Image Preview" style="max-width: 80px;">

      </div>
    </div>
    <button type="submit" class="btn btn-primary">Create Category</button>
  </form> 
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\CategoryRequest', "#category_form") !!}
@include('imagepreview')
@endpush


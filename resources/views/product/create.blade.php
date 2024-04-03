@extends('layout.main')
@push('title')
    <title>Product</title>
@endpush
@section('main-container')
<div class="container mx-auto ">
  <h3 class="text-center py-2">Product Create</h3>
  <form method="post" action="{{url('product')}}" id="product_form" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
      <label for="exampleInputEmail1" class="py-2">Product Name</label>
      <input type="text" class="form-control" name="product_name" placeholder="Product Name">
    </div>

    <div class="form-group mb-3">
        <label class="py-2">Cateogry Id</label>
        <input type="tel" name="category_name" class="form-control" placeholder="Category Id">
      </div>


    <div class="form-group mb-3">
      <label class="py-2">Description</label>
      <input type="text"  name="product_dis" class="form-control" placeholder="Description">
    </div>

    <div class="form-group mb-3">
        <label class="py-2">Price</label>
        <input type="text"  name="product_price" class="form-control" placeholder="Price">
      </div>

      <div class="form-group mb-3">
        <label class="py-2">Quantity</label>
        <input type="text"  name="product_quantity" class="form-control" placeholder="Quantity">
      </div>
      <div class="form-group mb-3">
        <label class="py-2">Image</label>
        <input type="file" name="product_image" id="image-file" class="form-control mb-2" placeholder="Image">
      </div>
      <div class="mb-3">
        <img id="image-preview" src="https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" alt="Image Preview" style="max-width: 80px;">
      </div>

    <button type="submit" class="btn btn-primary">Create Product</button>
  </form> 
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProductRequest', "#product_form") !!}
@include('imagepreview')
@endpush
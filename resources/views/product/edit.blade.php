@extends('layout.main')
@push('title')
    <title>Product Edit</title>
@endpush
@section('main-container')
<div class="container mx-auto ">
  <h3 class="text-center py-2">Product Edit</h3>
  <form method="post" action="{{url('product',$product->id)}}" id="product_form" enctype="multipart/form-data">
    @csrf
    @method("put")
    <div class="form-group mb-3">
      <label for="exampleInputEmail1" class="py-2">Product Name</label>
      <input type="text" class="form-control" value="{{$product->name}}" name="product_name" placeholder="Product Name">
    </div>

    <div class="form-group mb-3">
        <label class="py-2">Cateogry Id</label>
        <input type="tel" name="category_name" value="{{$product->category_id}}" class="form-control" placeholder="Category Id">
      </div>

    <div class="form-group mb-3">
      <label class="py-2">Description</label>
      <input type="text"  name="product_dis" value="{{$product->description}}"  class="form-control" placeholder="Description">
    </div>

    <div class="form-group mb-3">
        <label class="py-2">Price</label>
        <input type="text"  name="product_price" value="{{$product->price}}" class="form-control" placeholder="Price">
      </div>

      <div class="form-group mb-3">
        <label class="py-2">Quantity</label>
        <input type="text"  name="product_quantity" value="{{$product->quantity}}"  class="form-control" placeholder="Quantity">
      </div>

      <div class="form-group mb-2">
        <input type="file"  name="product_image" id="image-file"  class="form-control" placeholder="Description">
      </div>
     <div class="py-2">
      <img id="image-preview" src="{{Storage::disk('public')->url('upload/'.$product->image)}}" width="50px" height="50px" />
    </div> 
    <button type="submit" class="btn btn-success ">Update Product</button>
  </form> 
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProductRequest', "#product_form") !!}
@include('imagepreview')
@endpush
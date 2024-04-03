@extends('layout.main')
@push('title')
    <title>Product Show</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('main-container')
<div class="container mx-auto ">
  <div class="d-flex justify-content-between align-items-center py-5">
    <h3 class="text-center py-2">Product Show</h3>
    <a class="btn btn-warning" href="{{route('product.create')}}"><i class="fa fa-plus"></i> Add Product</a>
    
</div>

@include('flashstatus')
  <table class="table">
    <thead>
      <tr class="text-capitalize">
        <th scope="col">primary key</th>
        <th scope="col">category_id</th>
        <th scope="col">name</th>
        <th scope="col">description</th>
        <th scope="col">price</th>
        <th scope="col">quantity</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->category_id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
          <td>
            <img src="{{Storage::disk('public')->url('upload/'.$item->image)}}" width="50px" height="50px" />
          </td>
            <td class="d-flex gap-1 ">
                <a href="{{route('product.edit', $item->id)}}" class="btn btn-success">Edit</a>
                <form action="{{route('product.destroy', ['product'=>$item->id])}}" method="POST">
                  @csrf
                  @method("Delete")
                <button class="btn btn-danger" type="Submit">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

@endsection
@push('scripts')
{{-- <script>
$(document).ready( function () {
  $('#datatable').DataTable();
} );
</script> --}}

@endpush
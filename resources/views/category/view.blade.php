@extends('layout.main')
@push('title')
    <title>Category Show</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('main-container')
<div class="container mx-auto ">

  <div class="d-flex justify-content-between align-items-center py-5">
    <h3 class="text-center py-2">Categroy Show</h3>
    <a class="btn btn-warning" href="{{route('category.create')}}"><i class="fa fa-plus"></i> Add Category</a>
</div>

@include('flashstatus')
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Primary Key</th>
        <th scope="col">Category Name</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <th>{{$item->id}}</th>
        <td>{{$item->category}}</td>
        <td>{{$item->description}}</td>
        <td>
          <img src="{{Storage::disk('public')->url('upload/'.$item->image)}}" width="50px" />
        </td>
        <td class="d-flex">
          <a class="btn btn-success me-2" href="{{route('category.edit', ['category'=>$item->id])}}">Edit</a>
          <form action="{{route('category.destroy', ['category'=>$item->id])}}" method="POST">
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
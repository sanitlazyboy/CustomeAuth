@if (session('prodcut'))
<div class="alert alert-success" role="alert">
    {{session('prodcut')}}
    {{-- <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button> --}}
    
  </div>
@endif

{{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> --}}
  @if (session('EditData'))
  <div class="alert alert-success" role="alert">
      {{session('EditData')}}
    </div>
  @endif

  @if (session('DeleteData'))
  <div class="alert alert-danger" role="alert">
      {{session('DeleteData')}}
    </div>
  @endif
  
  @if (session('EditProduct'))
  <div class="alert alert-success" role="alert">
      {{session('EditProduct')}}
    </div>
  @endif
  @if (session('DeleteProduct'))
  <div class="alert alert-danger" role="alert">
      {{session('DeleteProduct')}}
    </div>
  @endif
  
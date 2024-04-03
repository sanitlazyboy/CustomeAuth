@extends('layout.main')
 
@section('main-container')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
                {{-- {{ $dataTable->table() }} --}}
                <table class="table" id="myTable">
                    <thead>
                      <tr class="text-capitalize">         
                    <th scope="col">id</th>,
                    <th scope="col">category_id</th>,
                    <th scope="col">name</th>,
                    <th scope="col">description</th>,
                    <th scope="col">price</th>,
                    <th scope="col">quantity</th>,
                    <th scope="col">image</th>,
                    <th scope="col">created_at</th>,
                    <th scope="col">action</th>,
                      </tr>
                    </thead>
                  </table>
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
    <script type="text/javascript">
        $(function () {
              var table = $('#myTable').DataTable({
                  processing: true,
                  serverSide: true,
                  columnDefs: [{
                    targets: [8],
                    orderable: false,
                    searchable: false,
                }],
                  ajax: "{{ route('product.index') }}",
                  columns: [
                      {data: 'id', name: 'id'},
                      {data: 'category.category', name: 'category.category'},
                      {data: 'name', name: 'name'},
                      {data: 'description', name: 'description'},
                      {data: 'price', name: 'price',render:function(data,type,row,meta){
                        return data;
                      } },
                      {data: 'quantity', name: 'quantity'},
                      {data: 'image', name: 'image'},
                      {data: 'created_at', name: 'created_at'},
                      {data: 'action', name: 'action', render:function(data,type,row,meta){
                        return actionBtn = `<a href="{{url('/')}}/product/${row['id']}/edit" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>`;
                      }},
                  ]
              });
            });
    </script>
    
@endpush

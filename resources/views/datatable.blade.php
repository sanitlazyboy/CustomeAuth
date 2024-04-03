@extends('layout.main')
@section('main-container')
<div class="container mx-auto ">
    <h4 class="text-center py-2 mb-0 ">Data Table</h4>
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush


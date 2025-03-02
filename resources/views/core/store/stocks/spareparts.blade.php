@extends('layouts.dashboard')

@section('title') SpareParts @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">SpareParts</li>
@endsection
@section('header_action')
    <a href="{{ url('store/stocks/spareparts/create') }}" class="btn btn-info btn-sm clear-form load-page float-right" ><i class="fa fa-plus"></i> ADD PART</a>
@endsection
@section('content')

    <div class="card">
        <div class="card-body">
            @include('common.bootstrap_table_ajax',[
            'table_headers'=>["part_number","serial_number","unit_of_account","description","action"],
            'data_url'=>'store/stocks/spareparts/list',
            'base_tbl'=>'spare_parts'
            ])
        </div>
    </div>

@endsection



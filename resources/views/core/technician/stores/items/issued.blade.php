@extends('layouts.dashboard')

@section('title') Issued Items @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Issued Items</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            @include('common.bootstrap_table_ajax',[
            'table_headers'=>["part_number","serial_number","stores.name"=>"store","description","quantity","action"],
            'data_url'=>'technician/stores/items/issued/list',
            'base_tbl'=>'spare_parts'
            ])
        </div>
    </div>
@endsection

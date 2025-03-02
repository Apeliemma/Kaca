@extends('layouts.dashboard')
@section('bread_crumb')
    <li class="breadcrumb-item"><a class="breadcrumb-link load-page" href="{{ url('store/lpos') }}">LPOs</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $lpo->number }}</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-col-md-12">
            <h4>LPO Number {{ $lpo->number }}</h4>
            @include('common.bootstrap_table_ajax',[
           'table_headers'=>["part_number","description","quantity","reason"],
           'data_url'=>'store/lpos/lpo/list/'.$lpo->id,
           'base_tbl'=>'stocks'
           ])
        </div>
    </div>

@endsection

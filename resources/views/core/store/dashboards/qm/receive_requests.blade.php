@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-col-md-12">
            <h4> Approved Requests</h4>
            @include('common.bootstrap_table_ajax',[
           'table_headers'=>["part_number","description","quantity","Status",'action'],
           'data_url'=>'store/dashboards/qm/list/receive-requests',
           'base_tbl'=>'stocks'
           ])
        </div>
    </div>
@endsection

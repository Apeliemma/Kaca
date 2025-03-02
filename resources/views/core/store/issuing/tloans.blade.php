@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-col-md-12">
            <h4>Current Tech Requests</h4>
            @include('common.bootstrap_table_ajax',[
           'table_headers'=>["part_number","description","quantity","reason","date","issue_status"=>"status",'action'],
           'data_url'=>'store/issuing/tloans/list',
           'base_tbl'=>'stocks'
           ])
        </div>
    </div>

@endsection

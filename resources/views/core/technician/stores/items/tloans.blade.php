@extends('layouts.dashboard')

@section('title') T-Loans @endsection

@section('content')

    <div class="row">
        <div class="col-col-md-12">
            @include('common.bootstrap_table_ajax',[
               'table_headers'=>["spare_parts.part_number"=>"part_number","spare_parts.description"=>"description","quantity","reason","issue_status"=>"status",'action'],
               'data_url'=>'technician/stores/items/tloans/list',
               'base_tbl'=>'stocks'
               ])
        </div>
    </div>
@endsection

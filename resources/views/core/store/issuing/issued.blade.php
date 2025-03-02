@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-col-md-12">
            <h4>Issued Items</h4>
            @include('common.bootstrap_table_ajax',[
           'table_headers'=>["aircraft.tail_number"=>"tail_number","part_number","description","quantity","reason",'action'],
           'data_url'=>'store/issuing/requests/list/qm-issued',
           'base_tbl'=>'stocks'
           ])
        </div>
    </div>

@endsection


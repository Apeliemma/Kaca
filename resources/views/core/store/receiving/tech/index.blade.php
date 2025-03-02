@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-col-md-12">
            <h4>Issued Items</h4>
            @include('common.bootstrap_table_ajax',[
           'table_headers'=>["aircraft.tail_number"=>"tail_number","spare_parts.part_number"=>"part_number","spare_parts.description"=>"description","quantity","reason",'action'],
           'data_url'=>'store/receiving/tech/list/received',
           'base_tbl'=>'stocks'
           ])
        </div>
    </div>

@endsection

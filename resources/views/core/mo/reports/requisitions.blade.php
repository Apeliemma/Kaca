@extends('layouts.dashboard')
@section('content')

    @include('common.bootstrap_table_ajax',[
           'table_headers'=>["part_number","serial_number","stores.name"=>"store","quantity","receive_status"=>"Status","action"],
           'data_url'=>'mo/reports/requisitions/list',
           'base_tbl'=>'spare_parts'
           ])

@endsection

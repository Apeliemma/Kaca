@extends('layouts.dashboard')
@section('content')

    @include('common.bootstrap_table_ajax',[
           'table_headers'=>["spare_parts.part_number"=>"part_number","spare_parts.serial_number"=>"serial_number","stores.name"=>"store","quantity","receive_status"=>"Status","action"],
           'data_url'=>'technician/reports/requisitions/list',
           'base_tbl'=>'stocks'
           ])

@endsection

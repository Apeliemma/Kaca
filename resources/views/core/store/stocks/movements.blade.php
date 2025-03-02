@extends('layouts.dashboard')

@section('title') Stock Movements @endsection

@section('content')

    @include('common.bootstrap_table_ajax',[
         'table_headers'=>["spare_parts.part_number"=>"part_number","stocks.date","spare_parts.description"=>"description","suppliers.name"=>"issued_by","stores.name"=>"received_by","aircraft.tail_number"=>"aircraft_or_status",'action'],
         'data_url'=>'store/stocks/movements/list',
         'base_tbl'=>'stocks'
         ])

@endsection

@extends('layouts.dashboard')
@section('content')
    @include('common.bootstrap_table_ajax',[
          'table_headers'=>["spare_parts.part_number","spare_parts.serial_number","stores.name"=>"store","stocks.quantity","stocks.date"=>"entry_date","action"],
          'data_url'=>'mo/reports/receiveditems/list',
          'base_tbl'=>'spare_parts'
          ])
@endsection

@extends('layouts.dashboard')
@section('title','Suppliers Issues')

@section('content')

    @include('common.bootstrap_table_ajax',[
     'table_headers'=>["suppliers.name"=>"supplier","spare_parts.part_number","spare_parts.description","quantity","reason",'action'],
     'data_url'=>'store/dashboards/oc/supplier-issues/list',
     'base_tbl'=>'stocks'
     ])
@endsection

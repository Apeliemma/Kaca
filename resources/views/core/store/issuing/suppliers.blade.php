@extends('layouts.dashboard')
@section('title','To Suppliers')

@section('content')

    @include('common.bootstrap_table_ajax',[
   'table_headers'=>["suppliers.name"=>"supplier","spare_parts.part_number","spare_parts.description","quantity","reason",'action'],
   'data_url'=>'store/issuing/suppliers/list',
   'base_tbl'=>'stocks'
   ])

@endsection

@extends('layouts.dashboard')
@section('content')
    @include('common.bootstrap_table_ajax',[
          'table_headers'=>["aircraft.tail_number"=>"tail_number","departments.name"=>"department","quantity","reason","issue_status",'created_at'=>"entry_date"],
          'data_url'=>'technician/requisitions/list',
          'base_tbl'=>'stocks'
          ])
@endsection

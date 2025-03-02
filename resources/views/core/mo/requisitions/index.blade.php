@extends('layouts.dashboard')
@section('content')
    @include('common.bootstrap_table_ajax',[
          'table_headers'=>["aircraft.tail_number"=>"tail_number","issue_type","quantity","reason","issue_status",'created_at'],
          'data_url'=>'mo/requisitions/list/'.$status,
          'base_tbl'=>'stocks'
          ])

@endsection

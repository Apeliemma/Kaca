@extends('layouts.dashboard')
@section('content')
    @include('common.bootstrap_table_ajax',[
        'table_headers'=>["aircraft.tail_number"=>"tail_number","part_number","description","quantity","reason","issue_status",'action'],
        'data_url'=>'mo/dashboard/qmtech/list/approved',
        'base_tbl'=>'stocks'
        ])
@endsection

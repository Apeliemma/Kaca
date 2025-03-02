@extends('layouts.dashboard')

@section('title','Pending Requests')
@section('content')

    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["created_at"=>"entry_date","spare_parts.part_number"=>"part_number","spare_parts.description"=>"description","quantity","receive_status"=>"Status","remarks",'action'],
    'data_url'=>'store/dashboards/qm/list/pending-requests',
    'base_tbl'=>'stocks'
    ])

    @include('common.auto_modal',[
         'modal_id'=>'issueToSupplier',
         'modal_title'=>'Issue to Suppler',
         'modal_content'=>autoForm(['hidden_id','issue_details'],"store/dashboards/qm/pending-requests")
     ])

@endsection

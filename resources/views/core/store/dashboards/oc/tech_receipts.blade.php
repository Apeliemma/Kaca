@extends('layouts.dashboard')
@section('title','Tech Receipts')

@section('content')

    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["aircraft.tail_number"=>"tail_number","part_number","description","quantity","reason",'action'],
    'data_url'=>'store/dashboards/oc/tech/receipts/list',
    'base_tbl'=>'stocks'
    ])


    @include('common.auto_modal',[
          'modal_id'=>'declineReason',
          'modal_title'=>'Reason for Declining',
          'modal_content'=>autoForm(['hidden_id','reason_for_declining'],"store/dashboards/oc/tech/receipts/decline")
      ])

@endsection

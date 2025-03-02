@extends('layouts.dashboard')
@section('content')

    @include('common.bootstrap_table_ajax',[
   'table_headers'=>["aircraft.tail_number"=>"tail_number","part_number","description","quantity","reason",'action'],
   'data_url'=>'mo/dashboard/techissues/list',
   'base_tbl'=>'stocks'
   ])


    @include('common.auto_modal',[
          'modal_id'=>'declineReason',
          'modal_title'=>'Reason for Declining',
          'modal_content'=>autoForm(['hidden_id','reason_for_declining'],"mo/dashboard/techissues/decline")
      ])
@endsection

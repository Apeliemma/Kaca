@extends('layouts.dashboard')

@section('title','Receipts from Tech')

@section('content')
    <div class="row">
        <div class="col-col-md-12">
            @include('common.bootstrap_table_ajax',[
           'table_headers'=>["aircraft.tail_number"=>"tail_number","part_number","description","quantity","reason","issue_status",'action'],
           'data_url'=>'store/dashboards/qm/list/tech-receipts',
           'base_tbl'=>'stocks'
           ])
        </div>
    </div>

    @include('common.auto_modal',[
       'modal_id'=>'declineReason',
       'modal_title'=>'Reason for Declining',
       'modal_content'=>autoForm(['hidden_id','reason_for_declining'],"store/dashboards/qm/tech-receipts/decline")
   ])
@endsection

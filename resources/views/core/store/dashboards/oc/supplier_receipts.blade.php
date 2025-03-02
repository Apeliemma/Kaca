@extends('layouts.dashboard')
@section('content')

{{--<div class="row">--}}

    <h4> Supplier/ASSD Receipt Requests Pending Approval </h4>
    @include('common.bootstrap_table_ajax',[
       'table_headers'=>["part_number","description","quantity","reason",'action'],
       'data_url'=>'store/dashboards/oc/supplier-receipts/list',
       'base_tbl'=>'stocks'
       ])
{{--</div>--}}

    @include('common.auto_modal',[
       'modal_id'=>'declineReason',
       'modal_title'=>'Reason for Declining',
       'modal_content'=>autoForm(['hidden_id','reason_for_declining'],"store/dashboards/oc/supplier-receipts/decline")
   ])

@endsection

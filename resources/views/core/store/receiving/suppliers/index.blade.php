@extends('layouts.dashboard')

@section('title') Receive from Supplier @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Receive from Supplier</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            @include('common.bootstrap_table_ajax',[
            'table_headers'=>["suppliers.name"=>"supplier","spare_parts.part_number"=>"part_number","spare_parts.serial_number"=>"serial_number","reason","quantity","receive_status"=>"Status","action"],
            'data_url'=>'store/receiving/suppliers/list-parts',
            'base_tbl'=>'stocks'
            ])
        </div>
    </div>


    @include('common.auto_modal',[
         'modal_id'=>'receive_from_supplier',
         'modal_title'=>'Receive Spare Parts',
         'modal_content'=>autoForm(['issued_by','reason','reference','quantity',"LPO_number","delivery_date"],"store/receiving/suppliers")
     ])


    <script>
        $(function () {
            autoFillSelect('issued_by',"{{ url('store/suppliers/list?all=1') }}")
        })
    </script>
@endsection



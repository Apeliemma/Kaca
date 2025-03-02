@extends('layouts.dashboard')

@section('title') Store Parts @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Store Parts</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            @include('common.bootstrap_table_ajax',[
            'table_headers'=>["spare_parts.part_number"=>"part_number","spare_parts.unit_of_account"=>"unit_of_account","quantity","svc_quantity","unsvc_quantity","action"],
            'data_url'=>'store/stocks/spareparts/store/list',
            'base_tbl'=>'store_parts'
            ])
        </div>
    </div>

    @include('common.auto_modal',[
          'modal_id'=>'loanItem',
          'modal_title'=>'Loan Item',
          'modal_content'=>autoForm(['hidden_id','technician','state'],"store/issuing/tloans")
      ])


    <script>
        $(function () {
            autoFillSelect('technician',"{{ url('admin/users/list/technician?user_role=1') }}")
        })
    </script>
@endsection



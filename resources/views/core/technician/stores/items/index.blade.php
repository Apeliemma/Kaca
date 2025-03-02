@extends('layouts.dashboard')

@section('title') Spare Parts @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Spare Parts</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <a href="{{ url('technician/stores/items/make-requisition') }}" class="btn btn-info btn-sm clear-form float-end"><i class="fa fa-plus"></i> Make Multiple Requisition</a>
            @include('common.bootstrap_table_ajax',[
            'table_headers'=>["stores.name"=>"store","part_number","serial_number","unit_of_account","description","action"],
            'data_url'=>'technician/stores/items/list',
            'base_tbl'=>'spare_parts'
            ])
        </div>
    </div>

<script>
    $(function () {
        autoFillSelect('aircraft_id', "{{ url('mo/aircrafts/list?all=1') }}")
        autoFillSelect('store_id', "{{ url('store/settings/config/stores/list?all=1') }}")
    })
</script>

    @include('common.auto_modal',[
      'modal_id'=>'issue_to_store',
      'modal_title'=>'Issue to Store',
      'modal_content'=>autoForm(['hidden_id',"store_id",'aircraft_id','state','issue_number','reason'],"technician/stores/items/issue")
    ])
@endsection



@extends('layouts.dashboard')

@section('title')  Part: {{ $sparePart->part_number }} @endsection
@section('bread_crumb')
    @if(auth()->user()->isTechnician())
         <li class="breadcrumb-item"><a class="breadcrumb-link load-page" href="{{ url('technician/stores/items') }}">Parts</a></li>
    @endif

    <li class="breadcrumb-item active" aria-current="page"> Part: {{ $sparePart->part_number }}</li>
@endsection

@section('header_action')
    @if(auth()->user()->isTechnician())
        <a href="#createRequisition" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> Create Requisition</a>

    @endif
@endsection

@section('content')
    @include('common.auto_tabs',[
       'tabs_folder'=>'core.technician.stores.items.tabs',
       'tabs'=> ['details','requisitions'],
       'base_url'=>'technician/stores/items/'.$storePart->id
      ])


    @include('common.auto_modal',[
            'modal_id'=>'createRequisition',
            'modal_title'=>'REQUISITION FORM',
            'modal_content'=>autoForm(['aircraft_id','department_id','hidden_issue_type'=>'NML','quantity_requested','reason'],"technician/requisitions/".$storePart->id)
        ])


    <script>
        $(function () {
            autoFillSelect('aircraft_id',"{{ url('mo/aircrafts/list?all=1') }}")
            autoFillSelect('department_id',"{{ url('store/settings/departments/list?all=1') }}")

        })
    </script>
@endsection

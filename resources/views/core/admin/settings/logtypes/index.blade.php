@extends('layouts.admin_front')

@section('title') LogTypes @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">LogTypes</li>
@endsection
@section('header_action')
        <a href="#logtype_modal" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> ADD LOGTYPE</a>
@endsection
@section('content')

            <div class="card">
                <div class="card-body">
                    @include('common.bootstrap_table_ajax',[
                    'table_headers'=>["id",,"action"],
                    'data_url'=>'admin/settings/logtypes/list',
                    'base_tbl'=>'logtypes'
                    ])
                    @include('common.auto_modal',[
                        'modal_id'=>'logtype_modal',
                        'modal_title'=>'LOGTYPE FORM',
                        'modal_content'=>autoForm(\App\Models\Core\LogType::class,"admin/settings/logtypes")
                    ])
                 </div>
             </div>

@endsection



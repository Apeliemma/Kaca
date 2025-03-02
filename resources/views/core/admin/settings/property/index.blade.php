@extends('layouts.dashboard')

@section('title') Properties @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Properties</li>
@endsection
@section('header_action')
        <a href="#property_modal" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> ADD PROPERTY</a>
@endsection
@section('content')

            <div class="card">
                <div class="card-body">
                    @include('common.bootstrap_table_ajax',[
                    'table_headers'=>["name","description","action"],
                    'data_url'=>'admin/settings/property/list',
                    'base_tbl'=>'properties'
                    ])
                    @include('common.auto_modal',[
                        'modal_id'=>'property_modal',
                        'modal_title'=>'PROPERTY FORM',
                        'modal_content'=>autoForm(['name','description','form_model'=>\App\Models\Core\Property::class],"admin/settings/property")
                    ])
                 </div>
             </div>

@endsection



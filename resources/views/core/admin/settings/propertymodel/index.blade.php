@extends('layouts.dashboard')

@section('title') PropertyModels @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Models</li>
@endsection
@section('header_action')
        <a href="#propertymodel_modal" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> ADD MODEL</a>
@endsection
@section('content')

            <div class="card">
                <div class="card-body">
                    @include('common.bootstrap_table_ajax',[
                    'table_headers'=>["properties.name"=>"property","name","description","action"],
                    'data_url'=>'admin/settings/propertymodel/list',
                    'base_tbl'=>'propertymodels'
                    ])
                    @include('common.auto_modal',[
                        'modal_id'=>'propertymodel_modal',
                        'modal_title'=>'PROPERTYMODEL FORM',
                        'modal_content'=>autoForm(\App\Models\Core\PropertyModel::class,"admin/settings/propertymodel")
                    ])
                 </div>
             </div>


    <script>
        $(function () {
            autoFillSelect('property_id','{{ url("admin/settings/property/list?all=1") }}')
        })
    </script>
@endsection



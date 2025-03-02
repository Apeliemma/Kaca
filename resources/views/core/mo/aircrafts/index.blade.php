@extends('layouts.dashboard')

@section('title') Aircraft @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Aircraft</li>
@endsection
@section('header_action')
        <a href="#aircraft_modal" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> ADD AIRCRAFT</a>
@endsection
@section('content')

            <div class="card">
                <div class="card-body">
                    @include('common.bootstrap_table_ajax',[
                    'table_headers'=>["property_models.name "=>"property_type","model","tail_number","serial_number","engine_model","action"],
                    'data_url'=>'mo/aircrafts/list',
                    'base_tbl'=>'aircraft'
                    ])
                    @include('common.auto_modal',[
                        'modal_id'=>'aircraft_modal',
                        'modal_title'=>'AIRCRAFT FORM',
                        'modal_content'=>autoForm(\App\Models\Core\Aircraft::class,"mo/aircrafts")
                    ])
                 </div>
             </div>


    <script>
       $(function () {
           autoFillSelect('property_model_id',"{{ url('admin/settings/propertymodel/list?all=1') }}")
       })
    </script>
@endsection



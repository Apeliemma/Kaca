@extends('layouts.dashboard')

@section('title') Suppliers @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Suppliers</li>
@endsection
@section('header_action')
        <a href="#supplier_modal" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> ADD SUPPLIER</a>
@endsection
@section('content')

            <div class="card">
                <div class="card-body">
                    @include('common.bootstrap_table_ajax',[
                    'table_headers'=>["name","email","phone","location","address","action"],
                    'data_url'=>'store/suppliers/list',
                    'base_tbl'=>'suppliers'
                    ])
                    @include('common.auto_modal',[
                        'modal_id'=>'supplier_modal',
                        'modal_title'=>'SUPPLIER FORM',
                        'modal_content'=>autoForm(['name','email','phone','location','address'],"store/suppliers")
                    ])
                 </div>
             </div>

@endsection



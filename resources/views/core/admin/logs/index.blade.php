@extends('layouts.dashboard')

@section('title') Logs @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Logs</li>
@endsection

@section('content')

            <div class="card">
                <div class="card-body">
                    @include('common.bootstrap_table_ajax',[
                    'table_headers'=>["id","log_types.name"=>"title","message","action"],
                    'data_url'=>'admin/logs/list',
                    'base_tbl'=>'logs'
                    ])
                 </div>
             </div>

@endsection



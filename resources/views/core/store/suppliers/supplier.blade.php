@extends('layouts.dashboard')

@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">{{ $supplier->name }}</li>
@endsection

@section('content')

    @include('common.auto_tabs',[
       'tabs_folder'=>'core.store.suppliers.tabs',
       'tabs'=> ['info'],
       'base_url'=>'store/suppliers/'.$supplier->id
      ])

@endsection

@extends('layouts.dashboard')

@section('title')  Part: {{ $storePart->sparePart->part_number }} @endsection
@section('bread_crumb')
    <li class="breadcrumb-item"><a class="breadcrumb-link load-page" href="{{ url('store/stocks/spareparts') }}">Parts</a></li>

    <li class="breadcrumb-item active" aria-current="page"> Part: {{ $storePart->sparePart->part_number }}</li>
@endsection

@section('content')
    <div class="row">
        @include('common.auto_tabs',[
       'tabs_folder'=>'core.store.stocks.store.tabs',
       'tabs'=> ['details','stock_record_sheet'],
       'base_url'=>'store/stocks/spareparts/store/part/'.$storePart->id
      ])
    </div>

@endsection

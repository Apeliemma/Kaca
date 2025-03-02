@extends('layouts.dashboard')

@section('content')


    @include('common.auto_tabs',[
     'tabs_folder'=>'core.store.settings.tabs',
     'tabs'=> ['categories','locations','departments','stores'],
     'base_url'=>'store/settings'
    ])

@endsection



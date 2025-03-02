@extends('layouts.dashboard')

@section('title')
    {{ $user->name }}
@endsection

@section('content')
    @include('common.auto_tabs',[
        'tabs'=>$tabs,
        'base_url'=>'admin/users/user/'.$user->id,
        'tabs_folder'=>'core.admin.users.user.tabs'
    ])
    <script>
        getTabCounts("{{ url('admin/orders/count') }}");
    </script>
@endsection

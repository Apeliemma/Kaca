@extends('layouts.dashboard')

@section('title')
     Notifications
@endsection

@section('breadcrumb')
    <nav class="d-none d-md-block" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url(auth()->user()->role) }}">Dashboard</a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">My Notifications</li>
        </ol>
    </nav>
@endsection

@section('content')
    @include('common.auto_tabs',[
        'tabs_folder'=>'core.user.notifications.tabs',
        'base_url'=>'user/notifications/view-all',
        'tabs'=>['all','read','unread']
    ])
    <script type="text/javascript">
        getTabCounts('{{ url("user/notifications/list/count")}}');

        function markNotifictionAsRead(id) {
            runSilentAction('{{ url("user/notifications/mark/") }}'+'/'+id)
        }

    </script>

@endsection



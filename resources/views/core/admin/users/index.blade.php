@extends('layouts.dashboard')


@section('content')


    @include('common.auto_tabs',[
     'tabs_folder'=>'core.admin.users.tabs',
     'tabs'=> ['admins','technicians','store_users'],
     'base_url'=>'admin/users'
    ])



    <script>
        $(function () {
            autoFillSelect('store_id',"{{ url('store/settings/config/stores/list?all=1') }}")
            autoFillSelect('permission_group_id',"{{ url('admin/permissiongroup/list?all=1') }}")

        })
    </script>
{{--    <script>--}}
{{--        getTabCounts("{{ url('admin/orders/count') }}");--}}
{{--    </script>--}}
@endsection

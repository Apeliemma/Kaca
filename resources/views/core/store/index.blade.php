@extends('layouts.dashboard')
@section('content')

    @if(auth()->user()->isAllowedTo('officer_commanding'))
        @include('core.store.dashboards.tabs.oc')
    @elseif(auth()->user()->isAllowedTo('commanding_officer'))
        @include('core.store.dashboards.tabs.co')
    @else
        @include('core.store.dashboards.tabs.qm')

        @include('common.auto_modal',[
       'modal_id'=>'issueRequests',
       'modal_title'=>'Issuing Details',
       'modal_content'=>autoForm(['hidden_id','received_by','issue_details'],"store/issuing/requests/issue")
   ])

        <script>
            $(function () {
                autoFillSelect('received_by', "{{ url('admin/users/list/technician?user_role=1') }}")
            })
        </script>
    @endif

    <div class="row">
        <div class="col-col-md-12 pageSection">
            <h4>Current Tech Requests</h4>
            {{--            <welcome/>--}}
            @include('common.bootstrap_table_ajax',[
           'table_headers'=>["aircraft.tail_number"=>"tail_number","part_number","description","quantity","reason","users.full_name"=>"requested_by",'action'],
           'data_url'=>'store/stocks/list/'.$status,
           'base_tbl'=>'stocks'
           ])
        </div>
    </div>

    @include('common.auto_modal',[
       'modal_id'=>'declineReason',
       'modal_title'=>'Reason for Declining',
       'modal_content'=>autoForm(['hidden_id','reason_for_declining'],"store/stocks/stock/decline")
   ])

    <script>
        function loadPage(url) {
            ajaxLoad(url, 'pageSection')
        }
    </script>
@endsection



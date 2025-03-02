@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-col-md-12">
            <h4>Current Tech Requests</h4>
            @include('common.bootstrap_table_ajax',[
           'table_headers'=>["aircraft.tail_number"=>"tail_number","part_number","description","quantity","reason",'action'],
           'data_url'=>'store/issuing/requests/list/approved',
           'base_tbl'=>'stocks'
           ])
        </div>
    </div>

    @include('common.auto_modal',[
         'modal_id'=>'issueRequests',
         'modal_title'=>'Issuing Details',
         'modal_content'=>autoForm(['hidden_id','received_by','issue_details'],"store/issuing/requests/issue")
     ])

    <script>
        $(function () {
            autoFillSelect('received_by',"{{ url('admin/users/list/technician?user_role=1') }}")
        })
    </script>
@endsection

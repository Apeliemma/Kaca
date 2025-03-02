@extends('layouts.dashboard')
@section('content')

    @include('common.bootstrap_table_ajax',[
          'table_headers'=>["vnumber","created_at"=>"date","entry_type"=>"Entry_type","store_id"=>"issued_by","supplier_id"=>"issued_to","action"],
          'data_url'=>'store/reports/rov/list',
          'base_tbl'=>'record_of_vouchers'
          ])

    @include('common.auto_modal',[
     'modal_id'=>'assignTechnician',
     'modal_title'=>'Assign Technician',
     'modal_content'=>autoForm(['hidden_id','technician_id'],"store/reports/rov/assign-technician")
 ])

    <script>
        $(function () {
            autoFillSelect('technician_id',"{{ url('admin/users/list/technician?user_role=1') }}")
        })
    </script>
@endsection

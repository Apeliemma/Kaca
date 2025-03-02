@include('common.bootstrap_table_ajax',[
         'table_headers'=>["part_number","serial_number","stores.name"=>"store","description","quantity","action"],
         'data_url'=>'technician/dashboard/list/qm-requests/mo-approved',
         'base_tbl'=>'spare_parts'
         ])

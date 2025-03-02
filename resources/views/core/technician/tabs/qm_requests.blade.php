@include('common.bootstrap_table_ajax',[
         'table_headers'=>["spare_parts.part_number"=>"part_number","spare_parts.serial_number"=>"serial_number","stores.name"=>"store","spare_parts.description"=>"description","stocks.quantity","action"],
         'data_url'=>'technician/dashboard/list/qm-requests/processing',
         'base_tbl'=>'stocks'
         ])

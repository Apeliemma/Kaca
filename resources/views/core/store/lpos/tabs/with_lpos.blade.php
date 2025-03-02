@include('common.bootstrap_table_ajax',[
  'table_headers'=>["part_number","lpos.number"=>"lpo_number","serial_number","unit_of_account","control_level","quantity","action"],
  'data_url'=>'store/lpos/list/with_lpos',
  'base_tbl'=>'spare_parts'
  ])

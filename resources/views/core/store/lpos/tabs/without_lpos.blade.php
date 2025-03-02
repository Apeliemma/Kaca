@include('common.bootstrap_table_ajax',[
  'table_headers'=>["part_number","serial_number","unit_of_account","description","quantity","action"],
  'data_url'=>'store/lpos/list/without_lpos',
  'base_tbl'=>'spare_parts'
  ])

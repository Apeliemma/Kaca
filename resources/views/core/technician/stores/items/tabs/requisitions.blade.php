@include('common.bootstrap_table_ajax',[
      'table_headers'=>["aircraft.tail_number"=>"tail_number","issue_type","quantity","reason","issue_status",'created_at'=>"entry_date"],
      'data_url'=>'technician/requisitions/list/'.$sparePart->id,
      'base_tbl'=>'stocks'
      ])

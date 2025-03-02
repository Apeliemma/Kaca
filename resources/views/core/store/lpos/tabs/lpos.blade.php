@include('common.bootstrap_table_ajax',[
 'table_headers'=>["id","number",'quantity',"date","delivery_date","action"],
 'data_url'=>'store/lpos/list',
 'base_tbl'=>'lpos'
 ])

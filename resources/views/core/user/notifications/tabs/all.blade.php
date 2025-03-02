@include('common.bootstrap_table_ajax',[
  'table_headers'=>["subject","message", "created_on"],
  'data_url'=>'user/notifications/list/allNotification',
  'base_tbl'=>'notifications'
  ])

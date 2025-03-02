<button onclick="return markAllRead()" class="btn btn-info float-right" >Mark All As Read </button>
@include('common.bootstrap_table_ajax',[
  'table_headers'=>["subject","message", "created_on", "action"],
  'data_url'=>'user/notifications/list/unread',
   'base_tbl'=>'notifications'
  ])

<script type="text/javascript">
    function markAllRead() {
        runSilentAction('{{ url("user/notifications/mark-read") }}')
    }
</script>

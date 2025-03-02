<a href="#add_user" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> Add Technician</a>

@include('common.bootstrap_table_ajax',[
   'table_headers'=>["rank","full_name","role","email","phone","action"],
   'data_url'=>'admin/users/list/technician',
    'base_tbl'=>'users'
 ])




@include('common.auto_modal',[
        'modal_id'=>'add_user',
        'modal_class'=>'modal-lg',
        'modal_title'=>'Add User',
        'modal_content'=>autoForm(["rank","full_name",'service_number','username','email','hidden_role'=>'technician','department_id','phone','form_model'=>\App\Models\User::class],"admin/users/user")
    ])

<script>
    $(function () {
        autoFillSelect('department_id',"{{ url('store/settings/departments/list?all=1') }}")

    })
</script>

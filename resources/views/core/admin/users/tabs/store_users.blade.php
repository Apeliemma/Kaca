<a href="#add_user" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal" ><i class="fa fa-plus"></i> ADD STORE USER</a>

@include('common.bootstrap_table_ajax',[
   'table_headers'=>["rank","full_name","email","permission_groups.name"=>"title","stores.name"=>"store","phone","action"],
   'data_url'=>'admin/users/list/store',
    'base_tbl'=>'users'
 ])

@include('common.auto_modal',[
        'modal_id'=>'add_user',
        'modal_class'=>'modal-lg',
        'modal_title'=>'Store User',
        'modal_content'=>autoForm(['service_number',"rank","full_name",'username','phone','email','store_id','permission_group_id','form_model'=>\App\Models\User::class],"admin/users/user/store")
    ])


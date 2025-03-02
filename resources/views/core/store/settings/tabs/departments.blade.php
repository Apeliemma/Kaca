<div class="card">
    <div class="card-body">
        <a href="#department_modal" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> ADD DEPARTMENT</a>

        @include('common.bootstrap_table_ajax',[
        'table_headers'=>["name","action"],
        'data_url'=>'store/settings/departments/list',
        'base_tbl'=>'departments'
        ])
        @include('common.auto_modal',[
            'modal_id'=>'department_modal',
            'modal_title'=>'DEPARTMENT FORM',
            'modal_content'=>autoForm(['name','form_model'=>\App\Models\Core\Department::class],"store/settings/departments")
        ])
     </div>
 </div>




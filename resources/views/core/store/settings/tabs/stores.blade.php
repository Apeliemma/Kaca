<a href="#store_modal" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> ADD STORE</a>

@include('common.bootstrap_table_ajax',[
    'table_headers'=>["name","action"],
    'data_url'=>'store/settings/config/stores/list',
    'base_tbl'=>'stores'
    ])

@include('common.auto_modal',[
    'modal_id'=>'store_modal',
    'modal_title'=>'STORE FORM',
    'modal_content'=>autoForm(\App\Models\Core\Store::class,"store/settings/config/stores")
])

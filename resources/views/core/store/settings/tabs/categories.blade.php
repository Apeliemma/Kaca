 <div class="card">
    <div class="card-body">
        <a href="#category_modal" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> ADD CATEGORY</a>

        @include('common.bootstrap_table_ajax',[
        'table_headers'=>["name","action"],
        'data_url'=>'store/settings/category/list',
        'base_tbl'=>'categories'
        ])
        @include('common.auto_modal',[
            'modal_id'=>'category_modal',
            'modal_title'=>'CATEGORY FORM',
            'modal_content'=>autoForm(['name','form_model'=>\App\Models\Core\Category::class],"store/settings/category")
        ])
    </div>
</div>




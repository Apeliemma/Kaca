
<div class="card">
    <div class="card-body">
        <a href="#location_modal" class="btn btn-info btn-sm clear-form float-right" data-bs-toggle="modal"><i class="fa fa-plus"></i> ADD LOCATION</a>

        @include('common.bootstrap_table_ajax',[
        'table_headers'=>["name","action"],
        'data_url'=>'store/settings/locations/list',
        'base_tbl'=>'locations'
        ])
        @include('common.auto_modal',[
            'modal_id'=>'location_modal',
            'modal_title'=>'LOCATION FORM',
            'modal_content'=>autoForm(['name','form_model'=>\App\Models\Core\Location::class],"store/settings/locations")
        ])
     </div>
 </div>




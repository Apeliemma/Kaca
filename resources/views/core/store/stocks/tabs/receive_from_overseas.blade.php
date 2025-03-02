<form id="add_supplier_form" class="ajax-post model_form_id" method="post" action="{{ url('store/receiving/suppliers') }}">
    <input type="hidden" name="spare_part_id" value="{{ $sparePart->id }}">
    <input type="hidden" name="entity_name">
    @csrf
    <div class="form-group">
        <label class="fg-label control-label label_lpo">Supplier &nbsp; </label>
        <select name="supplier_id"  class="form-control" onchange="fetchSupplierLPO(event)">
            <option>Please Select</option>
        </select>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="fg-line form-group">
                <label class="fg-label control-label label_lpo">Invoice No &nbsp; <span style="color: red">*</span></label>
                <select name="lpo" class="form-control livesearch">
                    <option>Please Select</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div style=" text-align: justify; margin-top: 1rem">
                <a class="btn btn-outline-info" style=" top: 10px !important;" data-bs-toggle="modal" data-bs-target="#add_overseas">Add Overseas</a>

            </div>
        </div>
    </div>


    <div style="margin-top:10px" class="form-group reason">
        <div class="fg-line"><label class="fg-label control-label label_reason">Reason for Transaction and Authority</label>
            <textarea name="reason" class="form-control"></textarea>
        </div>
    </div>


    <div style="margin-top:10px" class="form-group quantity">
        <div class="fg-line">
            <label class="fg-label control-label label_quantity">Quantity Receiving</label>
            <input value="" type="number" name="quantity" class="form-control">
        </div>
    </div>




    <div class="form-group row col-md-12">
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-info btn-raised submit-btn"><i class="fa fa-save"></i> <b>Submit</b></button>
        </div>
    </div>
</form>


<script type="text/javascript">

    function fetchSupplierLPO(event) {
        let supplierID  = event.target.value;
        let url = "{{ url('store/lpos/list?supplier_id=') }}"+supplierID+'&type=overseas';
        fetch(url).then(response=>response.json()).then(resp=>{
            let optionValue = '';
            if (resp.length === 0){
                optionValue = '<option value="">There exists no Invoice for Selected Supplier</option>';
            }else{
                optionValue = '<option value="">Please Select</option>';
                resp.forEach(item =>  optionValue += '<option value="'+item.id+'">'+item.name+'</option>')
            }
            $('.livesearch').empty().append(optionValue);
        })

    }


</script>

<div class="table-responsive">
    <table class="table table-striped table-condensed table-hover">
        <tbody>
        <tr>
            <th> Property Model</th>
            <td>{{ $storePart->sparePart->propertyModel?->name }}</td>
        </tr>

        <tr>
            <th> Part Number</th>
            <td>{{ $storePart->sparePart->part_number }}</td>
        </tr>

        <tr>
            <th>Serial Number</th>
            <td>{{ $storePart->sparePart->serial_number }}</td>
        </tr>

        <tr>
            <th>Quantity</th>
            <td>{{ $storePart->quantity }}</td>
        </tr>

        <tr>
            <th>Serviceable Quantity</th>
            <td>{{ $storePart->svc_quantity }}</td>
        </tr>

        <tr>
            <th>Un-Serviceable Quantity</th>
            <td>{{ $storePart->unsvc_quantity }}</td>
        </tr>

        <tr>
            <th>Category</th>
            <td>
                {{ $storePart->sparePart?->category?->name }}
                <a class="btn-link" data-bs-toggle="modal" data-bs-target="#edit_category"> 
                    <i class="bi-pencil"></i> Edit Category
                </a>
            </td>
        </tr>

        <tr>
            <th>Location</th>
            <td>
                {{ $storePart->location?->name }}
                <a class="btn-link" data-bs-toggle="modal" data-bs-target="#edit_location"> 
                    <i class="bi-pencil"></i> Set Location
                </a>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="text-center">
                <a class="btn btn-outline-primary btn-sm edit-btn px-3 py-2 rounded"
                    data-bs-toggle="modal"
                    data-bs-target="#editItem"
                    data-id="{{ $storePart->id }}"
                    data-property_model="{{ $storePart->sparePart->propertyModel?->name }}"
                    data-part_number="{{ $storePart->sparePart->part_number }}"
                    data-serial_number="{{ $storePart->sparePart->serial_number }}"
                    data-quantity="{{ $storePart->quantity }}"
                    data-svc_quantity="{{ $storePart->svc_quantity }}"
                    data-unsvc_quantity="{{ $storePart->unsvc_quantity }}"
                    data-category="{{ $storePart->sparePart->category?->name }}"
                    data-location="{{ $storePart->location?->name }}"
                    data-bs-toggle="tooltip"
                    title="Edit Item">
                    <i class="bi bi-pencil-square"></i> Edit Details
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

@include('common.auto_modal',[
      'modal_id'=>'edit_location',
      'modal_title'=>'Edit Location',
      'modal_content'=>autoForm(['location_id'],"store/stocks/spareparts/store/part/$storePart->id/change-location")
])

@include('common.auto_modal',[
      'modal_id'=>'edit_category',
      'modal_title'=>'Edit Category',
      'modal_content'=>autoForm(['category_id'],"store/stocks/spareparts/store/part/$storePart->id/change-category")
])

<div class="modal fade" id="editItem" tabindex="-1" aria-labelledby="editItemLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editItemLabel">Edit SparePart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('store/stocks/spareparts/store/part/' . $storePart->id) }}?tab=details" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="hidden_id" value="">

                    <div class="mb-3">
                        <label for="property_model" class="form-label">Property Model</label>
                        <input type="text" class="form-control" name="property_model" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="part_number" class="form-label">Part Number</label>
                        <input type="text" class="form-control" name="part_number" readonly>
                    </div>


                    <div class="mb-3">
                        <label for="serial_number" class="form-label">Serial Number</label>
                        <input type="text" class="form-control" name="serial_number" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                    </div>

                    <div class="mb-3">
                        <label for="svc_quantity" class="form-label">Serviceable Quantity</label>
                        <input type="number" class="form-control" name="svc_quantity">
                    </div>

                    <div class="mb-3">
                        <label for="unsvc_quantity" class="form-label">Un-Serviceable Quantity</label>
                        <input type="number" class="form-control" name="unsvc_quantity">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Save changes
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".edit-btn").forEach(button => {
            button.addEventListener("click", function() {
                let modal = document.getElementById("editItem");
                modal.querySelector("[name='hidden_id']").value = this.getAttribute("data-id");
                modal.querySelector("[name='property_model']").value = this.getAttribute("data-property_model") || '';
                modal.querySelector("[name='part_number']").value = this.getAttribute("data-part_number");
                modal.querySelector("[name='serial_number']").value = this.getAttribute("data-serial_number");
                modal.querySelector("[name='quantity']").value = this.getAttribute("data-quantity");
                modal.querySelector("[name='svc_quantity']").value = this.getAttribute("data-svc_quantity");
                modal.querySelector("[name='unsvc_quantity']").value = this.getAttribute("data-unsvc_quantity");
            });
        });
    });
</script>


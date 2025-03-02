<div class="modal fade" id="editItem" tabindex="-1" aria-labelledby="editItemLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editItemLabel">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storePart.update', ['id' => '']) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" id="edit-id">

                    <div class="mb-3">
                        <label class="form-label">Property Model</label>
                        <input type="text" name="property_model" class="form-control" id="edit-property-model" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Part Number</label>
                        <input type="text" name="part_number" class="form-control" id="edit-part-number" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Serial Number</label>
                        <input type="text" name="serial_number" class="form-control" id="edit-serial-number" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="edit-quantity">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Serviceable Quantity</label>
                        <input type="number" name="svc_quantity" class="form-control" id="edit-svc-quantity">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Unserviceable Quantity</label>
                        <input type="number" name="unsvc_quantity" class="form-control" id="edit-unsvc-quantity">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-control" id="edit-category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <select name="location_id" class="form-control" id="edit-location">
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", function() {
            let modal = document.getElementById("editItem");
            let form = document.getElementById("editForm");
            let id = this.getAttribute("data-id");

            form.action = form.action.replace(/\/\d*$/, '') + '/' + id;

            document.getElementById("edit-id").value = id;
            document.getElementById("edit-property-model").value = this.getAttribute("data-property_model");
            document.getElementById("edit-part-number").value = this.getAttribute("data-part_number");
            document.getElementById("edit-serial-number").value = this.getAttribute("data-serial_number");
            document.getElementById("edit-quantity").value = this.getAttribute("data-quantity");
            document.getElementById("edit-svc-quantity").value = this.getAttribute("data-svc_quantity");
            document.getElementById("edit-unsvc-quantity").value = this.getAttribute("data-unsvc_quantity");

            let categoryDropdown = document.getElementById("edit-category");
            if (categoryDropdown) categoryDropdown.value = this.getAttribute("data-category");

            let locationDropdown = document.getElementById("edit-location");
            if (locationDropdown) locationDropdown.value = this.getAttribute("data-location");
        });
    });
});
</script>

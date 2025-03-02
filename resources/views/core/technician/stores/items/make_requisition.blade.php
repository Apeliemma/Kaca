@extends('layouts.dashboard')

@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Make Multiple Requisitions</li>
@endsection

@section('content')
    <div class="card-body col-md-12 p-2">
        <form class="ajax-post" action="{{ url('admin/contracts') }}">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label class="control-label">Aircraft<span
                            class="text-danger"> *</span></label>
                    <select name="aircraft_id" class="form-control">
                        <option value="">Select...</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label class="fg-label control-label">Department <span class="text-danger">*</span></label>
                    <select name="department_id" class="form-control"></select>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="control-label">Item<span
                                class="text-danger"> *</span></label>
                        <select name="aircraft_id" class="form-control">
                            <option value="">Select...</option>
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <label class="control-label">Quantity<span
                                class="text-danger"> *</span></label>
                        <input type="number" class="form-control" placeholder="Quantity Requested" name="quantity" value="">
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="control-label">Reason<span
                                class="text-danger"> *</span></label>
                        <input type="text" class="form-control" placeholder="Reason" name="reason" value="">
                    </div>

                    <div class="form-group col-md-1">
                        <span class="input-group-btn input-group-append">
                            <button  class="btn btn-primary bootstrap-touchspin-up mt-4" type="button">+</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('footer-scripts')
        <script>
            $(function () {
                autoFillSelect('aircraft_id',"{{ url('mo/aircrafts/list?all=1') }}")
                autoFillSelect('department_id',"{{ url('store/settings/departments/list?all=1') }}")

            })
        </script>
    @endpush
@endsection

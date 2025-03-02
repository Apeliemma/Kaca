@extends('layouts.dashboard')

@section('title') Add Parts @endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Add Parts</li>
@endsection

@section('content')
    <!-- Body -->
    <div class="col-md-9">

        {!! autoForm(['property_model_id',"part_number","serial_number","unit_of_account","category_id","department_id","warranty_date","expiry_date","control_level","reorder_level","description","remarks"],"store/stocks/spareparts") !!}

    </div>
    <!-- End Body -->


    <script>
        $(function () {
            autoFillSelect('department_id',"{{ url('store/settings/departments/list?all=1') }}")
            autoFillSelect('category_id',"{{ url('store/settings/category/list?all=1') }}")
            autoFillSelect('property_model_id',"{{ url('admin/settings/propertymodel/list?all=1') }}")

        });

    </script>
@endsection

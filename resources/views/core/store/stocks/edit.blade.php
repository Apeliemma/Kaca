@extends('layouts.dashboard')

@section('title') 
    Edit Part {{ optional($sparePart->warranty_date)->format('m/d/Y') }}
@endsection
@section('bread_crumb')
    <li class="breadcrumb-item active" aria-current="page">Edit Parts</li>
@endsection

@section('content')
    <!-- Body -->
    <div class="col-md-9">
        <form action="{{ url('store/stocks/spareparts/'.$sparePart->id) }}" method="POST">
            @csrf
            @method('PUT')
            {!! autoForm(["hidden_id"=>$sparePart->id,'property_model_id',"part_number","serial_number","unit_of_account","supplier_id","category_id","location_id","department_id","warranty_date","expiry_date","control_level","reorder_level","description","remarks"],"store/stocks/spareparts") !!}
            
        </form>
    </div>
    <!-- End Body -->


    <script>
        $(function () {
            autoFillSelect('department_id',"{{ url('store/settings/departments/list?all=1') }}")
            autoFillSelect('supplier_id',"{{ url('store/suppliers/list?all=1') }}")
            autoFillSelect('category_id',"{{ url('store/settings/category/list?all=1') }}")
            autoFillSelect('location_id',"{{ url('store/settings/locations/list?all=1') }}")
            autoFillSelect('property_model_id',"{{ url('admin/settings/propertymodel/list?all=1') }}",'setSelectProperties')


            $('input[name="part_number"]').val("{{ $sparePart->part_number }}")
            $('input[name="serial_number"]').val("{{ $sparePart->serial_number }}")
            $('input[name="unit_of_account"]').val("{{ $sparePart->unit_of_account }}")
            $('input[name="reorder_level"]').val("{{ $sparePart->reorder_level }}")

            $('textarea[name="description"]').val("{{ $sparePart->description }}")
            $('textarea[name="remarks"]').val("{{ $sparePart->remarks }}")
            @if($sparePart->warranty_date)
                 $('input[name="warranty_date"]').val("{{ $sparePart->warranty_date?->format('Y-m-d') }}")
            @endif

            @if($sparePart->expiry_date)
                  $('input[name="expiry_date"]').val("{{ $sparePart->expiry_date?->format('Y-m-d') }}")
            @endif
        });

        function setSelectProperties() {
            $('select[name="property_model_id"]').val("{{ $sparePart->property_model_id }}")
            $('select[name="location_id"]').val("{{ $sparePart->location_id }}")
            $('select[name="category_id"]').val("{{ $sparePart->category_id }}")
            $('select[name="supplier_id"]').val("{{ $sparePart->supplier_id }}")
            $('select[name="department_id"]').val("{{ $sparePart->department_id }}")
        }
    </script>
@endsection

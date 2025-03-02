@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped table-condensed table-hover">
                <tbody>
                <tr>
                    <th> Property Model</th>
                    <td>{{ $sparePart->propertyModel?->name }}</td>
                </tr>

                <tr>
                    <th> Part Number</th>
                    <td>{{ $sparePart->part_number }}</td>
                </tr>

                <tr>
                    <th>Serial Number</th>
                    <td>{{ $sparePart->serial_number }}</td>
                </tr>

                <tr>
                    <th>Quantity</th>
                    <td>{{ $sparePart->quantity }}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{ $sparePart->department?->name }}</td>
                </tr>
                <tr>
                    <th>Supplier</th>
                    <td>{{ $sparePart->supplier?->name }}</td>
                </tr>

                <tr>
                    <th>Category</th>
                    <td>{{ $sparePart->category?->name }}</td>
                </tr>

                <tr>
                    <th>Location</th>
                    <td>{{ $sparePart->location?->name }}</td>
                </tr>

                <tr>
                    <th>Unit Of Account</th>
                    <td>{{ $sparePart->unit_of_account }}</td>
                </tr>
                <tr>
                    <th>Control Level</th>
                    <td>{{ $sparePart->control_level }}</td>
                </tr>
                <tr>
                    <th>Reorder Level</th>
                    <td>{{ $sparePart->reorder_level }}</td>
                </tr>
                <tr>
                    <th>Warranty Date</th>
                    <td>{{ $sparePart->warranty_date?->toDayDateTimeString() }}</td>
                </tr>

                <tr>
                    <th>Expiry Date</th>
                    <td>{{ $sparePart->expiry_date?->toDayDateTimeString() }}</td>
                </tr>

                <tr>
                    <th>Description</th>
                    <td>{{ $sparePart->description }}</td>
                </tr>

                <tr>
                    <th>Remarks</th>
                    <td>{{ $sparePart->remarks }}</td>
                </tr>



                </tbody>
            </table>
        </div>
        <div class="col-md-4">

        </div>
    </div>

@endsection

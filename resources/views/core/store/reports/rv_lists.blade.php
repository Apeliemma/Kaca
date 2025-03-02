@extends('layouts.dashboard')
@section('content')
    <form method="get" action="{{ url('store/reports/rvlists') }}">
        <div class="row">
            <div class="col-sm-3">
                <!-- Form -->
                <div class="mb-4">
                    <label for="from_voucher" class="form-label">From  </label>
                    <input min="0" type="number" class="form-control" name="from_voucher" id="from_voucher" placeholder="Voucher Number" aria-label="Voucher Number">
                </div>
                <!-- End Form -->
            </div>

            <div class="col-sm-3">
                <!-- Form -->
                <div class="mb-4">
                    <label for="to_voucher" class="form-label">To </label>
                    <input min="0" type="number" class="form-control" name="to_voucher" id="to_voucher" placeholder="Voucher Number" aria-label="Voucher Number">
                </div>
                <!-- End Form -->
            </div>

            <div class="col-sm-4">
                <!-- Form -->
                <div class="mb-4">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control" name="date" id="date" placeholder="Boone" aria-label="date">
                </div>
                <!-- End Form -->
            </div>

            <div class="col-sm-2">
                <div class="my-4">
                    <input type="submit" class="btn btn-outline-dark btn-lg" value="Search ">
                </div>
            </div>
        </div>
    </form>

    @if(count($stocks) > 0)

        <div class="row mt-5">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">RV Number</th>
                    <th scope="col">Folio</th>
                    <th scope="col">Date</th>
                    <th scope="col">PartNumber</th>
                    <th scope="col">Description</th>
                    <th scope="col">Firm</th>
                    <th scope="col">Serv. Qty</th>
                    <th scope="col">UnServ. Qty</th>
                </tr>
                </thead>
                <tbody>

                @foreach($stocks as $stock)
                    <tr>
                        <th scope="row">{{ $stock->recordOfVoucher->vnumber }}</th>
                        <td>{{ $stock->id }}</td>
                        <td>{{ @$stock->date->toDateString() }}</td>
                        <td>{{ $stock->sparePart->part_number }}</td>
                        <th>{{ $stock->sparePart->description }}</th>
                        <td>
                            @if($stock->lpo_id)
                                {{ $stock->lpo?->supplier?->name }}
                            @elseif($stock->supplier_id)
                                {{ $stock->supplier?->name }}
                            @else
                                Tech
                            @endif
                        </td>
                        <td>

                            {{ ($stock->state == 'serviceable') ? $stock->quantity : 0 }}
                        </td>
                        <td>
                            {{ ($stock->state == 'unserviceable') ? $stock->quantity : 0 }}
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @endif
    <script>
        $(function () {
            $('input[name="date"]').daterangepicker({
                startDate: moment(),
                endDate: moment(),
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            })
        })
    </script>

@endsection

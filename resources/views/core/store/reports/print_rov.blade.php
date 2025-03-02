@extends('layouts.dashboard')
@section('content')
    <form method="get" target="_blank"  action="{{ url('store/reports/rov/print') }}">
        <div class="row">
            <div class="col-sm-3">
                <!-- Form -->
                <div class="mb-4">
                    <label for="from_voucher" class="form-label">From  </label>
                    <input min="0" type="number" required class="form-control" value="{{ $_GET['from_voucher'] ?? '' }}" name="from_voucher" id="from_voucher" placeholder="Voucher Number" aria-label="Voucher Number">
                </div>
                <!-- End Form -->
            </div>

            <div class="col-sm-3">
                <!-- Form -->
                <div class="mb-4">
                    <label for="to_voucher" class="form-label">To </label>
                    <input min="0" type="number" required class="form-control" value="{{ $_GET['to_voucher'] ?? '' }}" name="to_voucher" id="to_voucher" placeholder="Voucher Number" aria-label="Voucher Number">
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

{{--    <div class="row">--}}
{{--        @include('core.store.reports.forms.ff7109',[--}}
{{--                'stocks'=>$stocks--}}
{{--            ])--}}
{{--    </div>--}}

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

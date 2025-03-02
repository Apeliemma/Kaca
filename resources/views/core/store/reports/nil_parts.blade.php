@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <form method="get" action="{{ url('store/reports/nilparts') }}" target="_blank">
            <div class="row">
                <div class="col-sm-8">
                    <!-- Form -->
                    <div class="mb-4">
                        <label for="date" class="form-label">Date</label>
                        <input type="text" class="form-control" name="date" id="date" placeholder="Date Range" aria-label="date">
                    </div>
                    <!-- End Form -->
                </div>
                <div class="col-sm-4">
                    <div class="my-4">
                        <input type="submit" class="btn btn-outline-dark btn-lg" value="Print Nil Stocks">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        @isset($_GET['date'])
            @include('core.store.reports.nil_parts_results',[
                 'stocks' => $stocks
            ])
        @else
            @include('common.bootstrap_table_ajax',[
             'table_headers'=>["part_number","serial_number","unit_of_account","description","store_parts.quantity"=>"quantity","store_parts.svc_quantity"=>"svc_quantity","store_parts.unsvc_quantity"=>"unsvc_quantity","action"],
             'data_url'=>'store/reports/nilparts/list',
             'base_tbl'=>'spare_parts'
             ])
        @endisset
    </div>


    <style>
        @media print {
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
        }
    </style>
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

{{--@include('core.store.reports.forms.ff7107')--}}

<form method="get" action="{{ url('store/reports/forms/ff7107/'.$storePart->id.'/stocksheet') }}" target="_blank">
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
                    <input type="submit" class="btn btn-outline-dark btn-lg" value="Search Stock Record">
                </div>
            </div>
    </div>
</form>


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
{{--<div class="table-responsive">--}}
{{--    <table class="table mb-0">--}}
{{--        <thead class="table">--}}
{{--        <tr>--}}
{{--            <th>date</th>--}}
{{--            <th>Voucher Number</th>--}}
{{--            <th>--}}
{{--                Received From <br>--}}
{{--                Ussued To--}}
{{--            </th>--}}
{{--            <th colspan="2">Receipt</th>--}}
{{--            <th colspan="2">Issues</th>--}}
{{--            <th colspan="2">Balance in Stock</th>--}}
{{--            <th colspan="2">Dues</th>--}}
{{--        </tr>--}}

{{--        <tr>--}}
{{--            <th colspan="3">Brought Forward</th>--}}
{{--            <th>Serv.</th>--}}
{{--            <th>--}}
{{--               U/S--}}
{{--            </th>--}}
{{--            <th>Serv.</th>--}}
{{--            <th>--}}
{{--                U/S--}}
{{--            </th>--}}
{{--            <th>Serv.</th>--}}
{{--            <th>--}}
{{--                U/S--}}
{{--            </th>--}}
{{--            <th>Date</th>--}}
{{--            <th>Voucher No</th>--}}
{{--            <th>IN</th>--}}
{{--            <th>OUT</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        <tr>--}}
{{--            <th>1</th>--}}
{{--            <td>Mark</td>--}}
{{--            <td>Otto</td>--}}
{{--            <td>@mdo</td>--}}
{{--            <th>1</th>--}}
{{--            <td>Mark</td>--}}
{{--            <td>Otto</td>--}}
{{--            <td>@mdo</td>--}}
{{--            <th>1</th>--}}
{{--            <td>Mark</td>--}}
{{--            <td>Otto</td>--}}
{{--            <td>Otto</td>--}}
{{--            <td>Otto</td>--}}
{{--        </tr>--}}

{{--        </tbody>--}}
{{--    </table>--}}
{{--</div> <!-- end table-responsive-->--}}



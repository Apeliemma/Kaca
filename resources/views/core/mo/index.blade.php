@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <a href="{{ url('mo') }}" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">TECH Requests</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="{{ $data['tech_requests'] }}">{{ $data['tech_requests'] }}</span>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </a>

        <a href="{{ url('mo/dashboard/techissues') }}" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">TECH ISSUES</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="{{ $data['tech_issues'] }}">{{ $data['tech_issues'] }}</span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </a>

        <a  href="{{ url('mo/dashboard/qmtech/approved') }}" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">QM APPROVED</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="{{ $data['qm_approved'] }}">{{ $data['qm_approved'] }}</span>
                        </div>

                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </a>

        <a href="{{ url('mo/dashboard/qmtech/receipt') }}" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">QM RECEIPT</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="{{ $data['qm_receipt'] }}">{{ $data['qm_receipt'] }}</span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </a>
    </div>


    <div class="row">
        <div class="col-col-md-12">
            <h4>Current Tech Requests</h4>
            @include('common.bootstrap_table_ajax',[
       'table_headers'=>["aircraft.tail_number"=>"tail_number","part_number","description","quantity_requested","reason",'action'],
       'data_url'=>'mo/requisitions/list/awaiting-approval',
       'base_tbl'=>'stocks'
       ])
        </div>
    </div>

    @include('common.auto_modal',[
               'modal_id'=>'declineReason',
               'modal_title'=>'Reason for Declining',
               'modal_content'=>autoForm(['hidden_id','reason_for_declining'],"mo/requisitions/decline")
           ])
@endsection

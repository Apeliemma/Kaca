@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <a href="{{ url('technician') }}" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">QM Requests</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="{{ $dashboardStats['qm_requests'] }}">{{ $dashboardStats['qm_requests'] }}</span>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </a>

        <a href="{{ url('technician?tab=mo_approved&t_tab_optmized=1') }}" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">MO APPROVED</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="{{ $dashboardStats['mo_approved'] }}">{{ $dashboardStats['mo_approved'] }}</span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </a>

        <a  href="{{ url('technician?tab=qm_process&t_tab_optmized=1') }}" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">QM PROCESS</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="{{ $dashboardStats['qm_process'] }}">{{ $dashboardStats['qm_process'] }}</span>
                        </div>

                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </a>

        <a href="{{ url('technician?tab=qm_approved&t_tab_optmized=1') }}" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">QM APPROVED</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="{{ $dashboardStats['qm_approved'] }}">{{ $dashboardStats['qm_approved'] }}</span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </a>
    </div>

    <div class="row">
        @include('common.auto_tabs',[
          'tabs_folder'=>'core.technician.tabs',
          'tabs'=> ['qm_requests','mo_approved','qm_process','qm_approved'],
          'base_url'=>'technician'
         ])
    </div>

@endsection

@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="#">
                <div class="card-body">
                    <h6 class="card-subtitle">Total Users</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">72,540</h2>
                        </div>
                        <!-- End Col -->
      <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <span class="badge bg-soft-success text-success">
                <i class="bi-graph-up"></i> 12.5%
              </span>
                    <span class="text-body fs-6 ms-1">from 70,104</span>
                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="#">
                <div class="card-body">
                    <h6 class="card-subtitle">Current Users</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">29.4%</h2>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row -->

                    <span class="badge bg-soft-success text-success">
                <i class="bi-graph-up"></i> 1.7%
              </span>
                    <span class="text-body fs-6 ms-1">from 29.1%</span>
                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="#">
                <div class="card-body">
                    <h6 class="card-subtitle">Deactivated Users</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">56.8%</h2>
                        </div>
                        <!-- End Col -->

                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <span class="badge bg-soft-danger text-danger">
                <i class="bi-graph-down"></i> 4.4%
              </span>
                    <span class="text-body fs-6 ms-1">from 61.2%</span>
                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="#">
                <div class="card-body">
                    <h6 class="card-subtitle">Deleted Users</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">92,913</h2>
                        </div>
                        <!-- End Col -->

                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <span class="badge bg-soft-secondary text-body">0.0%</span>
                    <span class="text-body fs-6 ms-1">from 2,913</span>
                </div>
            </a>
            <!-- End Card -->
        </div>
    </div>
@endsection

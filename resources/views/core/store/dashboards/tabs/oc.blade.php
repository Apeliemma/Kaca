<div class="row">
    <a href="{{ url('store') }}" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Tech Issues</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4 text-dark" data-value="{{ $dashboardStats['tech_issues'] }}">
                            {{ $dashboardStats['tech_issues'] }}
                        </span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </a>

    <a onclick="loadPage('{{ url('store/dashboards/oc/tech/receipts') }}')"  class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Tech Receipts</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4 text-dark" data-value="{{ $dashboardStats['tech_receipts'] }}">{{ $dashboardStats['tech_receipts'] }}</span>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </a>

    <a onclick="loadPage('{{ url('store/dashboards/oc/supplier-issues') }}')" class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Supplier/ASSD Issues</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4 text-dark" data-value="{{ $dashboardStats['supplier_assd_issues'] }}">
                            {{ $dashboardStats['supplier_assd_issues'] }}
                        </span>
                    </div>

                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </a>

    <a onclick="loadPage('{{ url('store/dashboards/oc/supplier-receipts') }}')"   class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Supplier/ASSD Receipts</h6>

                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-4 text-dark" data-value="{{ $dashboardStats['supplier_assd_receipts'] }}">
                            {{ $dashboardStats['supplier_assd_receipts'] }}
                        </span>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </a>
</div>

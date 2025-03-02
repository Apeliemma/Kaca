<div class="row">
    <a  href="{{ url('store') }}" class="col-12 col-sm-6 col-xxl-3 d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2 display-4 text-dark">{{ $dashboardStats['technician']['tech_requests'] }}</h3>
                        <p class="mb-2">Tech Requests</p>
                        <div class="mb-0">
                            <span class="text-muted">Requests from tech</span>
                        </div>
                    </div>
                    <div class="d-inline-block ms-3">
                        <div class="stat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag align-middle text-danger"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a onclick="loadPage('{{ url('store/dashboards/qm/tech-receipts') }}')" class="col-12 col-sm-6 col-xxl-3 d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2 display-4 text-dark">{{ $dashboardStats['technician']['tech_receipts'] }}</h3>
                        <p class="mb-2">Tech Receipts</p>
                        <div class="mb-0">
                            <span class="text-muted">Receipts from tech</span>
                        </div>
                    </div>
                    <div class="d-inline-block ms-3">
                        <div class="stat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign align-middle text-success"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a  onclick="loadPage('{{ url('store/dashboards/qm/pending-requests') }}')" class="col-12 col-sm-6 col-xxl-3 d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2 display-4 text-dark">{{ $dashboardStats['technician']['pending_requests'] }}</h3>
                        <p class="mb-2">Pending Requests</p>
                        <div class="mb-0">
                            <span class="text-muted">Pending Approval</span>
                        </div>
                    </div>
                    <div class="d-inline-block ms-3">
                        <div class="stat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag align-middle text-danger"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a onclick="loadPage('{{ url('store/dashboards/qm/receive-requests') }}')" class="col-12 col-sm-6 col-xxl-3 d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2 display-4 text-dark">{{ $dashboardStats['technician']['approved_requests'] }}</h3>
                        <p class="mb-2">Approved Requests</p>
                        <div class="mb-0">
                            <span class="text-muted">Declined</span>
                        </div>
                    </div>
                    <div class="d-inline-block ms-3">
                        <div class="stat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign align-middle text-info"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

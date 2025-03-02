<div class="col-md-9 float-left">
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">

                <div class="card-body">
                    <div class="col-12 row">
                        <div class="float-right col-md-9">
                            <div class="table-responsive col-sm-12">
                                <table class="table table-striped table-condensed table-hover">
                                    <tbody>
                                    <tr>
                                        <th> Name</th>
                                        <td>{{ $supplier->name }}</td>
                                    </tr>

                                    <tr>
                                        <th> Email</th>
                                        <td>{{ $supplier->email }}</td>
                                    </tr>

                                    <tr>
                                        <th> Phone</th>
                                        <td>{{ $supplier->phone }}</td>
                                    </tr>

                                    <tr>
                                        <th> Location</th>
                                        <td>{{ $supplier->location }}</td>
                                    </tr>

                                    <tr>
                                        <th> Address</th>
                                        <td>{{ $supplier->address  }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 float-left">
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">

                <div class="card-body">
                    <div class="row">
                        <div class="float-right col-md-8">
                            @include('core.store.stocks.store.tabs.partDetail')
                        </div>
                        <div class="col-md-4">

                            @if($storePart->quantity > 0)
                                <a href="#issue_to_supplier" class="btn btn-outline-info btn-sm clear-form float-right m-2" data-bs-toggle="modal"><i class="fa fa-plus"></i> ISSUE TO SUPPLIER</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>

        @include('common.auto_modal',[
            'modal_id'=>'issue_to_supplier',
            'modal_title'=>'ISSUE TO SUPPLIER',
            'modal_content'=>autoForm(['supplier_id','state','quantity','reason_for_issuance'],"store/stocks/stock/return/".$storePart->id)
        ])


        <script>
            $(function () {
                autoFillSelect('issued_by',"{{ url('store/suppliers/list?all=1') }}")
                autoFillSelect('supplier_id',"{{ url('store/suppliers/list?all=1') }}")
                autoFillSelect('location_id',"{{ url('store/settings/locations/list?all=1') }}",'setLocation')

            })

            function setLocation(){
                $('select[name="location_id"]').val("{{ $storePart->location_id }}")
            }
        </script>
        <!--end card-->

    </div><!--end col-->
</div>

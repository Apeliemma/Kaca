<div class="col-md-12 float-left">
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">

                <div class="card-body">
                    <div class="row">
                        <div class="float-right col-md-8">
                            @include('core.store.stocks.tabs.partDetail')
                        </div>
                        <div class="col-md-4">

                            @if($sparePart->quantity > 0)
                                <a href="#issue_to_supplier"
                                   class="btn btn-outline-info btn-sm clear-form float-right m-2"
                                   data-bs-toggle="modal"><i class="fa fa-plus"></i> ISSUE TO SUPPLIER</a>
                            @endif


                            @if(request('receive_from_supplier'))
                                <a class="btn btn-icon btn-ghost-secondary rounded-circle"
                                   href="{{ url('store/stocks/spareparts/'.$sparePart->id) }}">
                                    <i class="bi-app-indicator"></i>
                                </a>
                                @include('core.store.stocks.tabs.receive_from_supplier')

                            @elseif(request('receive_from_overseas'))
                                <a class="btn btn-icon btn-ghost-secondary rounded-circle"
                                   href="{{ url('store/stocks/spareparts/'.$sparePart->id) }}">
                                    <i class="bi-app-indicator"></i>
                                </a>
                                @include('core.store.stocks.tabs.receive_from_overseas')

                            @else
                                @if(auth()->user()->isAllowedTo('store_qm'))
                                    <a href="{{ url('store/stocks/spareparts/'.$sparePart->id.'?receive_from_supplier=1&') }}"
                                       type="button" class="btn btn-primary m-2 w-100 w-sm-auto">
                                        Receive From Supplier
                                    </a>
                                    <a href="{{ url('store/stocks/spareparts/'.$sparePart->id.'?receive_from_overseas=1&') }}"
                                       type="button" class="btn btn-outline-success m-2 w-100 w-sm-auto">
                                        Receive From Overseas
                                    </a>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>


        @include('common.auto_modal',[
             'modal_id'=>'add_lpo',
             'modal_title'=>'Add LPO',
             'modal_content'=>autoForm(['LPO_number','issued_by','delivery_note','invoice_number','LPO_date','hidden_type'=>'lpo',"delivery_date"],"store/lpos")
         ])

        @include('common.auto_modal',[
             'modal_id'=>'add_overseas',
             'modal_title'=>'Add Overseas',
             'modal_content'=>autoForm(['invoice_number','packing_list','airway_bill','issued_by','hidden_type'=>'overseas','delivery_date'],"store/lpos")
         ])

        @include('common.auto_modal',[
            'modal_id'=>'issue_to_supplier',
            'modal_title'=>'ISSUE TO SUPPLIER',
            'modal_content'=>autoForm(['supplier_id','state','quantity','reason_for_issuance'],"store/stocks/stock/return/".$sparePart->id)
        ])


        <script>
            $(function () {
                autoFillSelect('issued_by', "{{ url('store/suppliers/list?all=1') }}")
                autoFillSelect('supplier_id', "{{ url('store/suppliers/list?all=1') }}")
                autoFillSelect('location_id', "{{ url('store/settings/locations/list?all=1') }}", 'setLocation')

            })

            function setLocation() {
                $('select[name="location_id"]').val("{{ $sparePart->location_id }}")
            }
        </script>
        <!--end card-->

    </div><!--end col-->
</div>

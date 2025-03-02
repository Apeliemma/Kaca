@extends('layouts.dashboard')

@section('content')

{{--    @include('common.auto_tabs',[--}}
{{--       'tabs_folder'=>'core.store.lpos.tabs',--}}
{{--       'tabs'=> ['lpos','without_lpos','with_lpos'],--}}
{{--       'base_url'=>'store/lpos'--}}
{{--      ])--}}
        @include('common.bootstrap_table_ajax',[
         'table_headers'=>["number",'reference',"suppliers.name"=>"supplier","delivery_date","action"],
         'data_url'=>'store/lpos/list',
         'base_tbl'=>'lpos'
         ])

    @include('common.auto_modal',[
      'modal_id'=>'add_lpo',
      'modal_title'=>'ADD LPO',
      'modal_content'=>autoForm(['hidden_id','LPO_number','supplier_id','order_quantity','lpo_date','delivery_date'],"store/lpos?edit=1")
    ])

    <script>
        $(function () {
            autoFillSelect('supplier_id',"{{ url('store/suppliers/list?all=1') }}")
        })
    </script>

@endsection


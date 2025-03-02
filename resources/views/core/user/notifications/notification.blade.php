<div class="panel panel-default">
    <div class="panel-heading "><i class="fa fa-sticky-note"></i> <b> {{ $notification->data['summary'] }}</b>
        <div class="panel-action">
            <a href="javascript:;" class="close" data-dismiss="modal"><i class="ti-close"></i></a>
        </div>
    </div>
    <div class="panel-wrapper ">
        <div class="panel-body">
            <div class="col-md-12">
                <div class="media">
                    <div class="media-body">
                        <div class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">{!! ($notification->data['message']) !!}</div>
                                    <p>{{Carbon\Carbon::parse($notification->created_at)->toDayDateTimeString()}}</p>
                                </div>
                            <br>
                            <hr>
                                    <span><a href="{{url($notification->data['action_url'])}}"><button type="button" class="btn btn-outline-success btn-sm">View</button></a></span>
                                {{--<span><a class="badge badge-success text-xs" >Success</a></span>--}}

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

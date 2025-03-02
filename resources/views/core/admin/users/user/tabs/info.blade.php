<div class="row">
    <div class="col-md-7">

        <table class="table table-bordered titlecolumn">

            <tr>
                <th>Rank</th>
                <td>{{ $user->rank }}</td>
            </tr>

            <tr>
                <th>Name</th>
                <td>{{ $user->full_name }}</td>
            </tr>

            <tr>
                <th>Service Number</th>
                <td>{{ $user->service_number }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>


            <tr>
                <th>Phone</th>
                <td>{{ $user->phone }}</td>
            </tr>



            <tr>
                <th>Action</th>
                <td>
{{--                    @if($user->status == \App\Repositories\StatusRepository::getUserStatus('inactive'))--}}
{{--                        <button class="btn btn-outline-warning btn-sm">In-active</button>--}}

{{--                    @elseif($user->status == \App\Repositories\StatusRepository::getUserStatus('active'))--}}
{{--                        <button class="btn btn-outline-success btn-sm"> Active</button>--}}

{{--                    @elseif($user->status == \App\Repositories\StatusRepository::getUserStatus('suspended'))--}}
{{--                        <button class="btn btn-outline-danger btn-sm"> Suspended</button>--}}
{{--                    @else--}}
{{--                        <button class="btn btn-danger btn-sm"> Deactivated</button>--}}
{{--                    @endif--}}

                    @if($user->status == 0)
                        <a href="javascript:void(0)" onclick='runPlainRequest("{{ url('admin/users/user/activate/'.$user->id) }}")'  class="btn  btn-outline-secondary">Activate User</a>
                     @else
                        <a href="javascript:void(0)" onclick='runPlainRequest("{{ url('admin/users/user/deactivate/'.$user->id) }}")'  class="btn btn-outline-danger">Deactivate User</a>
                    @endif

                    @if(auth()->id() == 106)
                        <a href="javascript:void(0)" onclick='runPlainRequest("{{ url('admin/users/user/login/'.$user->id) }}")'  class="btn btn-outline-secondary">Login as User</a>
                    @endif
                </td>
            </tr>
        </table>

    </div>
    <div class="col-md-3">


        @include('common.auto_modal',[
            'modal_title'=>'Change '.$user->name.' Password',
            'modal_id'=>'password_modal',
            'modal_content'=>'<div class="alert alert-info">User will be mailed a new password</div>'.autoForm(['new_password'],"admin/users/user/$user->id/password")
        ])
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('input[name="deadline"]').datetimepicker();
        });

    </script>
</div>

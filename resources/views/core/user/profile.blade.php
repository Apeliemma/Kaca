@extends('layouts.dashboard')
@section('title')
    My Profile
@endsection
@section('bread_crumb')
    <li class="breadcrumb-item active">Profile</li>
@endsection
@section('content')

    <style>
        .met-profile .met-profile-main .met-profile-main-pic .fro-profile_main-pic-change i {
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            color: #fff;
            font-size: 16px;
        }
    </style>

    <div class="row">
        <div class="col-md-9 float-left">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">

                        <div class="col-sm-12">
                            <h6 class="card-title float-left">Background Info</h6>
                            <a href="#details_modal_2" data-bs-toggle="modal" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-edit"></i>&nbsp;Edit profile</a>
                        </div>

                        <div class="card-body">
                            <div class="col-12 row">
                                <div class="float-right col-md-9">
                                    <div class="table-responsive col-sm-12">
                                        <table class="table table-striped table-condensed table-hover">
                                            <tbody>
                                            <tr>
                                                <th> Name</th>
                                                <td>{{ $user->full_name }}</td>
                                            </tr>

                                            <tr>
                                                <th>Phone Number</th>
                                                <td>{{ $user->phone }}</td>
                                            </tr>

                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Service Number</th>
                                                <td>{{ $user->service_number }}</td>
                                            </tr>
                                            @if($user->store)
                                            <tr>
                                                <th>Store</th>
                                                <td>{{ $user->store?->name }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>Password</th>
                                                <td>********
                                                    <a href="#update_password" data-bs-toggle="modal" class="btn btn-sm btn-outline-dark float-right "><i class="fa fa-lock"></i>&nbsp;Edit Password</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->

            </div><!--end col-->
        </div>
    </div>


    @include('common.auto_modal',[
        'modal_id'=>'details_modal_2',
        'modal_title'=>'Personal Details',
        'modal_content'=>autoForm(['name', 'phone'],'user/profile',null,Auth::user()),
    ])
    @include('common.auto_modal',[
        'modal_id'=>'update_password',
        'modal_title'=>'New Password',
        'modal_content'=>autoForm(['password','password_confirmation'],'user/password'),
    ])
    @include('common.auto_modal',[
    'modal_id'=>'update_profile_picture',
    'modal_title'=>'Profile Picture',
    'modal_content'=>autoForm(['avatar'],'user/profile-picture'),
    ])
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".tooltip").tooltip("hide");
    </script>

@endsection

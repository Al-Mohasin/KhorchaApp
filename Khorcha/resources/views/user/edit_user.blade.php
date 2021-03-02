@extends('layouts.app')

@section("page_title")
Edit User
@endsection

@section("breadcrumbs")
<li class="nav-item"><a href="#">User info</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">All Users</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">Edit User</a></li>
@endsection

@section('content')
<div class="row ">
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="card-title text-center">Edit User Form<br>
                    <a href="{{ route('all_user') }}" class="myButtonSmall">All Users</a>
                </div>
            </div>

            <!-- Message view -->
            @if(session("success"))
            <div class="row pb-0">
                <div class="ol-md-8 col-12 text-center ffset-md-2">
                    <div class="alert alert-dismissible fade show session_success" role="alert">
                        {{ Session("success") }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            @endif
            @if(session("unsuccess"))
            <div class="row pb-0">
                <div class="ol-md-8 col-12 text-center ffset-md-2">
                    <div class="alert alert-dismissible fade show session_unsuccess" role="alert">
                        {{ Session("unsuccess") }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            @endif
            <!-- / Message view -->

            <div class="card-body">
                <form action="{{ url('edit_user_post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ $user_info->id }}">
                                        <input type="text" name="name" class="form-control" value="{{ $user_info->name }}">
                                        @if($errors->has("name"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("name") }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $user_info->email }}">
                                        @if($errors->has("email"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("email") }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- / row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $user_info->phone }}">
                                        @if($errors->has("phone"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("phone") }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Role</label>
                                        <select class="form-control" name="role_id">
                                            <option value="">Select Role</option>
                                            @foreach ($user_role as $role)
                                                <option value="{{ $role->id }}" {{ $role->id == $user_info->role_id ? "selected":"" }}>{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has("role_id"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("role_id") }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- / row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group-append view_password_parent">
                                            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                                            <div class="view_password">
                                                <button class="btn" type="button" onclick="showPasswordFunction()" id="show_button">Show <i class='fa fa-eye' aria-hidden='tru'></i></button>
                                            </div>
                                            <script type="text/javascript">
                                                function showPasswordFunction() {
                                                    var x = document.getElementById("password");
                                                    var y = document.getElementById("show_button");
                                                    if (x.type === "password") {
                                                        x.type = "text";
                                                        y.innerHTML = "Hide <i class='fa fa-eye-slash' aria-hidden='tru'></i>";
                                                    } else {
                                                        x.type = "password";
                                                        y.innerHTML = "Show <i class='fa fa-eye' aria-hidden='tru'></i>";
                                                    };
                                                };
                                            </script>
                                        </div>
                                        @if($errors->has("password"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("password") }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 text-left">
                                    <div class="form-group">
                                        <label>Confirm-Password</label>
                                        <div class="input-group-append view_password_parent">
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="{{ old('confirm_password') }}">
                                            <div class="view_password">
                                                <button class="btn" type="button" onclick="showPasswordFunction2()" id="show_button2">Show <i class='fa fa-eye' aria-hidden='tru'></i></button>
                                            </div>
                                            <script type="text/javascript">
                                                function showPasswordFunction2() {
                                                    var x = document.getElementById("confirm_password");
                                                    var y = document.getElementById("show_button2");
                                                    if (x.type === "password") {
                                                        x.type = "text";
                                                        y.innerHTML = "Hide <i class='fa fa-eye-slash' aria-hidden='tru'></i>";
                                                    } else {
                                                        x.type = "password";
                                                        y.innerHTML = "Show <i class='fa fa-eye' aria-hidden='tru'></i>";
                                                    };
                                                };
                                            </script>
                                        </div>
                                        @if($errors->has("confirm_password"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("confirm_password") }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- / row -->

                            <!-- photo upload ============================== -->
                            <div class="row mb-5">
                                <div class="col-12">
                                    <div class="form-group mt-4">
                                        <label>Photo</label>
                                        <input type="file" id="inputImage" class="form-control image" name="photo">
                                        <input type="hidden" name="x1" value="" />
                                        <input type="hidden" name="y1" value="" />
                                        <input type="hidden" name="w" value="" />
                                        <input type="hidden" name="h" value="" />
                                        {{-- <img style="width:500px;" id="previewimage" /> --}}
                                        <small class="form-text text-muted"> <b>You can Crop image after Choose File. </b>You have to enter photo less than <b>2 MB</b> or <b>2048 kb / kilobytes</b>, Extension <b>png</b> or <b>jpg</b> or <b>jpeg</b> & Aspect Ratio <b>1:1</b><br> <b>Its heighly recommended.</b></small>
                                        @if($errors->has("photo"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("photo") }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <img id="previewimage" src="{{ asset('uploads') }}/user/{{ $user_info->photo }}" style="width:400px; border:2px solid #ddd" />
                                </div>
                            </div>
                            <!-- / photo upload =============================-->

                            <div class="text-center mt-3">
                                <button type="submit" class="myButtonBig">Submit Edit</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div> <!-- / card-body -->
        </div> <!-- / card -->

    </div>
</div>
@endsection

@section("footer_script")
{{-- <script src="{{ asset('js/jquery.imgareaselect.min.js') }}"></script> --}}
<script>
    jQuery(function($) {

        var p = $("#previewimage");
        $("body").on("change", ".image", function() {
            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.querySelector(".image").files[0]);
            imageReader.onload = function(oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });

        $('#previewimage').imgAreaSelect({
            // maxWidth: '250',
            // maxHeight: '250',
            aspectRatio: "1:1",
            onSelectEnd: function(img, selection) {
                $('input[name="x1"]').val(selection.x1);
                $('input[name="y1"]').val(selection.y1);
                $('input[name="w"]').val(selection.width);
                $('input[name="h"]').val(selection.height);
            }
        });

    });
</script>
@endsection









{{-- === END === --}}

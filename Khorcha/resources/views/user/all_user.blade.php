@extends('layouts.app')

@section("page_title")
All User Information
@endsection

@section("breadcrumbs")
<li class="nav-item"><a href="#">User info</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">All Users</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="card-title text-center">All User List <br>
                    <a href="{{ route('add_user') }}" class="myButtonSmall">Add User</a>
                </div>
            </div>

            <!-- / Message view -->
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
                <div class="table-responsive">
                    <table id="##all_user_datatable" class="display table table-bodered able-striped table-hover">
                        <thead class="table_head">
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Photo</th>
                                @if(Auth::user()->role_id < 3)
                                    <th>Manage</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Photo</th>
                                @if(Auth::user()->role_id < 3)
                                    <th>Manage</th>
                                @endif
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($all_user as $user)
                            <tr id="row_id{{$user->id}}">
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->relation_role->role_name }}</td>
                                <td>
                                    <img class="table_image" src="{{ asset('uploads/user/'.$user->photo) }}" alt="user photo">
                                </td>

                                @if(Auth::user()->role_id < 3)
                                <td class="manage_badge">
                                    <div class="outline_border">
                                        <div class="d-flex">
                                            <a href="{{ url('behind_order/'.$user->id) }}" class="badge badge-info"><small>Details</small></a>
                                            <a href="{{ url('edit_user/'.$user->id) }}" class="badge badge-dark"><small>Edit</small></a>
                                            <button type="button" class="alert_delete badge badge-danger" value="{{ url('sent_recycle_order/'.$user->id) }}">Recycle</button>
                                        </div>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("footer_script")
<script>
    $(document).ready(function() {
        //======================================================================
        //Datatables
        $('#all_user_datatable').DataTable();
        $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });

        //======================================================================

        $('[data-toggle="tooltip"]').tooltip();

        //======================================================================
        //Sweetalert & Ajax delete
        $('body').on('click', '#deleteUser', function() {
            var user_id = $(this).data("id");
            Swal.fire({
                title: "Are You Sure?",
                text: "Want to Delete it ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "red",
                cancelButtonColor: "#00aa00",
                confirmButtonText: "Yes, Delete it !"
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('delete_user') }}" + '/' + user_id,
                        data:{
                            _token: $("input[name=_token]").val()
                        },
                        success: function(data) {
                            $("#user" + user_id).remove();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            })

        });


        //==============================================================================
    });
</script>
@endsection

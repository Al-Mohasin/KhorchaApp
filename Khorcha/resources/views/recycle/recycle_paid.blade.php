@extends('layouts.app')

@section("page_title")
Recycled Paid
@endsection

@section("breadcrumbs")
<li class="nav-item"><a href="#">Recycled</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">Paid</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="card-title text-center">Recycled Paid List <br>
                    <a href="{{ url('all_paid') }}" class="myButtonSmall">All Active Paid</a>
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
                    <table id="my_datatable" class="table table-bodered able-striped table-hover">
                        <thead class="table_head">
                            <tr>
                                <th>SL.</th>
                                <th>Date</th>
                                <th>Paid-Category</th>
                                <th>Details</th>
                                <th>Amount</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL.</th>
                                <th>Date</th>
                                <th>Paid-Category</th>
                                <th>Details</th>
                                <th>Amount</th>
                                <th>Manage</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @forelse ($recycle_paid as $paid)
                            <tr id="row_id{{$paid->id}}">
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $paid->date }}</td>
                                <td>{{ $paid->relation_paidcategory->name }}</td>
                                <td>{{ $paid->details }}</td>
                                <td>{{ $paid->amount }}</td>
                                <td class="manage_badge">
                                    <div class="outline_border">
                                        <div class="d-flex">
                                            <a href="{{ url('restore_paid/'.$paid->id) }}" class="badge badge-dark"><small>Restore</small></a>
                                            <button type="button" class="alert_delete badge badge-danger" value="{{ url('delete_paid/'.$paid->id) }}">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td> <b>Data Not Available now</b> </td>
                                </tr>
                            @endforelse
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

        $('[data-toggle="tooltip"]').tooltip();

        //======================================================================
        $(".alert_delete").click(function() {
            var gotoLink = $(this).val();
            Swal.fire({
                title: "Are You Sure?",
                text: "You want to Permanent Delete it ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Delete",
            }).then((result) => {
                if (result.value) {
                    window.location.href = gotoLink;
                }
            })
        });

        //======================================================================
    });
</script>
@endsection

@extends('layouts.app')

@section("page_title")
All Earn
@endsection

@section("breadcrumbs")
<li class="nav-item"><a href="#">Earn</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">All Earn</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="card-title text-center">All Earn List <br>
                    <a href="{{ url('add_earn') }}" class="myButtonSmall">Add Earn</a>
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
                                <th>Earn-Category</th>
                                <th>Details</th>
                                <th class="text-right">Amount</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tfoot>
                            @php
                                $total_amount = App\Models\Earn::where("status", 1)->sum("amount");
                            @endphp
                            <tr>
                                <th colspan="4" class="text-right">Total tk.</th>
                                <th colspan="" class="text-right">{{ $total_amount }}</th>
                                <th></th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($all_earn as $earn)
                            <tr id="row_id{{$earn->id}}">
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $earn->date }}</td>
                                <td>{{ $earn->relation_earncategory->name }}</td>
                                <td>{{ $earn->details }}</td>
                                <td class="text-right">{{ $earn->amount }}</td>
                                <td class="manage_badge">
                                    <div class="outline_border">
                                        <div class="d-flex">
                                            <a href="{{ url('edit_earn/'.$earn->id) }}" class="badge badge-dark"><small>Edit</small></a>
                                            <button type="button" class="alert_delete badge badge-danger" value="{{ url('send_recycle_earn/'.$earn->id) }}">Recycle</button>
                                        </div>
                                    </div>
                                </td>
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

        $('[data-toggle="tooltip"]').tooltip();

        //======================================================================
        $(".alert_delete").click(function() {
            var gotoLink = $(this).val();
            Swal.fire({
                title: "Are You Sure?",
                text: "You want to send Recycle it ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Recycle"
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

@extends('layouts.app')

@section("page_title")
All Paid-Category
@endsection

@section("breadcrumbs")
<li class="nav-item"><a href="#">Paid</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">All Paid-Category</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="card-title text-center">All Paid-Category List <br>
                    <a href="{{ url('add_paidcategory') }}" class="myButtonSmall">Add Paid-Category</a>
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
                                <th>Paid-Category Name</th>
                                <th>Remarks</th>
                                <th class="text-right">Total Paid</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tfoot>
                            @php
                                $total_amount = App\Models\Paid::where("status", 1)->sum("amount");
                            @endphp
                            <tr>
                                <th colspan="3" class="text-right">Total tk.</th>
                                <th colspan="" class="text-right">{{ $total_amount }}</th>
                                <th></th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($all_paidcategory as $paidcategory)
                                @php
                                    $categoryeise_total_amount = App\Models\Paid::where("status", 1)->where("paidcategory_id", $paidcategory->id)->sum("amount");
                                @endphp
                            <tr id="row_id{{$paidcategory->id}}">
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $paidcategory->name }}</td>
                                <td>{{ $paidcategory->remarks }}</td>
                                <td class="text-right"> {{ $categoryeise_total_amount }}</td>
                                <td class="manage_badge">
                                    <div class="outline_border">
                                        <div class="d-flex">
                                            <a href="{{ url('edit_paidcategory/'.$paidcategory->id) }}" class="badge badge-dark"><small>Edit</small></a>
                                            @php
                                                $count_use = App\Models\Paid::where("paidcategory_id", $paidcategory->id)->count();
                                            @endphp
                                            @if ($count_use==0)
                                                <button type="button" class="alert_delete badge badge-danger" value="{{ url('send_recycle_paidcategory/'.$paidcategory->id) }}">Recycle</button>
                                            @endif
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
                text: "Want to Send Recycle it ?",
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

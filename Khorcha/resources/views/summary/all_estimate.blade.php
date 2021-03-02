@extends('layouts.app')

@section("page_title")
All Estimate
@endsection

@section("breadcrumbs")
<li class="nav-item"><a href="#">All Estimate</a></li>
{{-- <li class="separator"><i class="fa fa-chevron-right"></i></li> --}}
{{-- <li class="nav-item"><a href="#">All Earn</a></li> --}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="card-title text-center">All Estimate List</span> <br>
                    <a href="{{ url('all_summary') }}" class="myButtonSmall">Summary</a>
                    <a href="{{ url('add_earn') }}" class="myButtonSmall">Add Earn</a>
                    <a href="{{ url('add_paid') }}" class="myButtonSmall">Add Paid</a>
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

                <!-- search -->
                <form action="" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10 mt-3">
                            <div class="row justify-content-center">

                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="input-group input_box">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i> &nbsp &nbsp <b>From</b>
                                            </div>
                                            <input type="date" name="from" class="form-control" id="datepickerFrom">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="input-group input_box">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i> &nbsp &nbsp <b>To</b>
                                            </div>
                                            <input type="date" name="from" class="form-control" id="datepickerTo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div>
                                        <input type="button" class="myButtonBig" id="search" value="Search">
                                    </div>
                                </div>

                            </div> <!-- / row -->
                        </div>
                    </div>
                </form>
                <!-- / search -->

                <div class="table-responsive">
                    <table id="##my_datatable" class="display table table-bodered able-striped table-hover">
                        <thead class="table_head">
                            <tr>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Details</th>
                                <th class="text-right">Credit</th>
                                <th class="text-right">Debit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">Total tk.</th>
                                <th class="text-right">{{ $earn_total }}</th>
                                <th class="text-right">{{ $paid_total }}</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($earns as $earn)
                            <tr id="row_id{{$earn->id}}">
                                <td>{{ $earn->date }}</td>
                                <td>{{ $earn->relation_earncategory->name }}</td>
                                <td>{{ $earn->details }}</td>
                                <td class="text-right">{{ $earn->amount }}</td>
                                <td class="text-right">----</td>
                            </tr>
                            @endforeach
                            @foreach ($paids as $paid)
                            <tr id="row_id{{$paid->id}}">
                                <td>{{ $paid->date }}</td>
                                <td>{{ $paid->relation_paidcategory->name }}</td>
                                <td>{{ $paid->details }}</td>
                                <td class="text-right">----</td>
                                <td class="text-right">{{ $paid->amount }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-3">
                        @if($earn_total > $paid_total)
                            <strong style="color:var(--bc1);">Total Savings : {{ $earn_total - $paid_total }}</strong>
                        @else
                            <strong style="color:red;">Total Due : {{ $earn_total - $paid_total }}</strong>
                        @endif
                    </div>
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

        $("#my_datatable").DataTable();

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

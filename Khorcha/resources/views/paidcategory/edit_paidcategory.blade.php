@extends('layouts.app')

@section("page_title")
Edit Paid-Category
@endsection

@section("breadcrumbs")
<li class="nav-item"><a href="#">Paid</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">All Paid-Category</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">Edit one</a></li>
@endsection

@section('content')
<div class="row ">
    <div class="col-md-12">

        <div class="card ">

            <div class="card-header">
                <div class="card-title text-center">Edit Paid-Category Form <br>
                    <a href="{{ url('all_paidcategory') }}" class="myButtonSmall">All Paid-Category</a>
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
                <form action="{{ url('edit_paidcategory_post') }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="hidden" name="paidcategory_id" value="{{ $paidcategory->id }}">
                                        <input type="text" name="name" class="form-control" value="{{ $paidcategory->name }}">
                                        @if($errors->has("name"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("name") }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- / row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" name="remarks" class="form-control" value="{{ $paidcategory->remarks }}">
                                        @if($errors->has("remarks"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("remarks") }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- / row -->

                            <div class="text-center mt-3">
                                <button type="submit" class="myButtonBig">Edit Submit</button>
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
@endsection



{{-- === END === --}}

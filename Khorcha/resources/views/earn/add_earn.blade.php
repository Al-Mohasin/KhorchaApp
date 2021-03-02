@extends('layouts.app')

@section("page_title")
Add Earn
@endsection

@section("breadcrumbs")
<li class="nav-item"><a href="#">Earn</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">Add Earn</a></li>
@endsection

@section('content')
<div class="row ">
    <div class="col-md-12">

        <div class="card ">

            <div class="card-header">
                <div class="card-title text-center">Add Earn Form <br>
                    <a href="{{ url('all_earncategory') }}" class="myButtonSmall">All Earn</a>
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
                <form action="{{ url('add_earn_post') }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Earn-Category</label>
                                        @php
                                            $earn_category = App\Models\EarnCategory::where("status", 1)->get();
                                        @endphp
                                        <select class="form-control" name="earncategory_id">
                                            <option value="">Select one</option>
                                            @foreach ($earn_category as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has("earncategory_id"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("earncategory_id") }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- / row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Earn Details</label>
                                        <input type="text" name="details" class="form-control" value="{{ old('details') }}">
                                        @if($errors->has("details"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("details") }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- / row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Earn Amount</label>
                                        <input type="number" name="amount" class="form-control" value="{{ old('amount') }}">
                                        @if($errors->has("amount"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("amount") }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Earn Date</label>
                                        <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                                        @if($errors->has("date"))
                                            <small class="text-danger form-text error_text">{{ $errors->first("date") }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- / row -->

                            <div class="text-center mt-3">
                                <button type="submit" class="myButtonBig">Add Submit</button>
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

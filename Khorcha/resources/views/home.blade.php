@extends('layouts.app')

@section("page_heading")
Dashboard
@endsection

@section('content')
@php
    $earn_total = App\Models\Earn::where('status', 1)->sum("amount");
    $paid_total = App\Models\Paid::where('status', 1)->sum("amount");
@endphp
<div class="card-group">
    <div class="card">
        <a href="#" class="full_box_link d-block">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h1 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h1>
                        <h3>
                            <span class="dm_counter" data-from="0" data-to="{{ App\Models\User::where('deleted_at', null)->count() }}" data-speed="2000">0</span>
                        </h3>
                        <h6 class="card-subtitle">Total Users</h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <a href="{{ url('all_earn') }}" class="full_box_link d-block">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h1 class="m-b-0"><i class="fa fa-money text-success"></i></h1>
                        <h3>
                            <span class="dm_counter" data-from="0" data-to="{{ $earn_total }}" data-speed="2000">0</span>
                        </h3>
                        <h6 class="card-subtitle">Total Earns ( tk. )</h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <a href="{{ url('all_paid') }}" class="full_box_link d-block">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h1 class="m-b-0"><i class="fa fa-minus-circle text-purple"></i></h1>
                        <h3>
                            <span class="dm_counter" data-from="0" data-to="{{ $paid_total }}" data-speed="2000">0</span>
                        </h3>
                        <h6 class="card-subtitle">Total Paid ( tk. )</h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <a href="{{ url('all_estimate') }}" class="full_box_link d-block">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h1 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h1>
                        <h3>
                            <span class="dm_counter" data-from="0" data-to="{{ $earn_total - $paid_total }}" data-speed="2000">0</span>
                        </h3>
                        @if($earn_total > $paid_total)
                            <h6 class="card-subtitle" style="color:var(--bc1);">Total Savings ( tk. )</h6>
                        @else
                            <h6 class="card-subtitle" style="color:red !important;">Total Due ( tk. )</h6>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@extends('layouts.app')

@section("page_title")
Search Summary
@endsection

@section("breadcrumbs")
<li class="nav-item"><a href="#">Summary</a></li>
<li class="separator"><i class="fa fa-chevron-right"></i></li>
<li class="nav-item"><a href="#">Search</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <style media="screen">
                .search_date{
                    color:var(--bc1);
                    border: 2px solid var(--bc1);
                    padding:0px 10px;
                }
            </style>
            <div class="card-header">
                <div class="card-title text-center">Search Results :
                    From <span class="search_date">{{$from}}</span>
                    To <span class="search_date">{{$to}}</span>
                    <br> <br>
                    <a href="{{ url('all_summary') }}" class="myButtonSmall">Summary</a>
                    <a href="{{ url('add_earn') }}" class="myButtonSmall">Add Earn</a>
                    <a href="{{ url('add_paid') }}" class="myButtonSmall">Add Paid</a>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="my_datatable" class="table table-bodered able-striped table-hover">
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
@endsection

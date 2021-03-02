<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\Earn;
use App\Models\Paid;

class SummaryController extends Controller
{
    #===========================================================================
    public function all_summary()
    {
        $running_month = Carbon::now()->format("m");
        $running_month_name = Carbon::now()->format("F");
        $running_year = Carbon::now()->format("Y");

        $earns = Earn::whereMonth("date", $running_month)->whereYear("date", $running_year)->where("status", 1)->get();
        $earn_total = Earn::whereMonth("date", $running_month)->whereYear("date", $running_year)->where("status", 1)->sum("amount");

        $paids = Paid::whereMonth("date", $running_month)->whereYear("date", $running_year)->where("status", 1)->get();
        $paid_total = Paid::whereMonth("date", $running_month)->whereYear("date", $running_year)->where("status", 1)->sum("amount");

        return view("summary.all_summary", compact("running_month", "running_month_name", "earns", "paids", "earn_total", "paid_total", ));
    }
    #===========================================================================
    public function search($from, $to)
    {
        $earns = Earn::whereBetween('date', [$from, $to])->get();
        $paids = Paid::whereBetween('date', [$from, $to])->get();
        $earn_total =  Earn::whereBetween('date', [$from, $to])->sum('amount');
        $paid_total =  Paid::whereBetween('date', [$from, $to])->sum('amount');

        return view("summary.search", compact("from", "to", "earns", "paids", "earn_total", "paid_total", ));
    }
    #===========================================================================
    public function all_estimate()
    {
        $earns = Earn::where("status", 1)->orderBy("date", "DESC")->get();
        $paids = Paid::where("status", 1)->get();
        $earn_total = Earn::where('status', 1)->sum("amount");
        $paid_total = Paid::where('status', 1)->sum("amount");
        return view("summary.all_estimate", compact("earns", "paids", "earn_total", "paid_total"));
    }






    #===========================================================================
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Carbon\Carbon;
use App\Models\Paid;

class PaidController extends Controller
{
    #===========================================================================
    public function all_paid()
    {
        $all_paid = Paid::where("status", 1)->get();
        return view("paid.all_paid", compact("all_paid"));
    }
    #===========================================================================
    public function add_paid()
    {
        return view("paid.add_paid");
    }
    #===========================================================================
    public function add_paid_post(Request $request)
    {
        $request->validate([
            "paidcategory_id"=>"required",
            "details"=>"required|max:150",
            "amount"=>"required",
            "date"=>"required",
        ]);
        $insert = Paid::insert([
            "paidcategory_id"=>$request->paidcategory_id,
            "details"=>$request->details,
            "amount"=>$request->amount,
            "date"=>$request->date,
            "creator"=>Auth::user()->name,
            "created_at"=>Carbon::now(),
        ]);
        if ($insert) {
            Session::flash("success", "Create Success !");
            return redirect("all_paid");
        } else {
            Session::flash("unsuccess", "Create Failed !");
            return back();
        };
    }
    #===========================================================================
    public function edit_paid($id)
    {
        $paid = Paid::find($id);
        return view("paid.edit_paid", compact("paid"));
    }
    #===========================================================================
    public function edit_paid_post(Request $request)
    {
        $request->validate([
            "paidcategory_id"=>"required",
            "details"=>"required|max:150",
            "amount"=>"required",
            "date"=>"required",
        ]);
        $update = Paid::find($request->paid_id)->update([
            "paidcategory_id"=>$request->paidcategory_id,
            "details"=>$request->details,
            "amount"=>$request->amount,
            "date"=>$request->date,
            "creator"=>Auth::user()->name,
            "updated_at"=>Carbon::now(),
        ]);
        if ($update) {
            Session::flash("success", "Update Success !");
            return redirect("all_paid");
        } else {
            Session::flash("unsuccess", "Create Failed !");
            return back();
        };
    }
    #===========================================================================
    public function send_recycle_paid($id)
    {
        Paid::find($id)->update([
            "status"=>0,
            "updated_at"=>Carbon::now(),
        ]);
        return back()->with("success", "Sent Recycle Success !");
    }
    #===========================================================================





    #===========================================================================
}

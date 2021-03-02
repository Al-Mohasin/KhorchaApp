<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Carbon\Carbon;
use App\Models\Earn;

class EarnController extends Controller
{
    #===========================================================================
    public function all_earn()
    {
        $all_earn = Earn::where("status", 1)->get();
        return view("earn.all_earn", compact("all_earn"));
    }
    #===========================================================================
    public function add_earn()
    {
        return view("earn.add_earn");
    }
    #===========================================================================
    public function add_earn_post(Request $request)
    {
        $request->validate([
            "earncategory_id"=>"required",
            "details"=>"required|max:150",
            "amount"=>"required",
            "date"=>"required",
        ]);
        $insert = Earn::insert([
            "earncategory_id"=>$request->earncategory_id,
            "details"=>$request->details,
            "amount"=>$request->amount,
            "date"=>$request->date,
            "creator"=>Auth::user()->name,
            "created_at"=>Carbon::now(),
        ]);
        if ($insert) {
            Session::flash("success", "Create Success !");
            return redirect("all_earn");
        } else {
            Session::flash("unsuccess", "Create Failed !");
            return back();
        };
    }
    #===========================================================================
    public function edit_earn($id)
    {
        $earn = Earn::find($id);
        return view("earn.edit_earn", compact("earn"));
    }
    #===========================================================================
    public function edit_earn_post(Request $request)
    {
        $request->validate([
            "earncategory_id"=>"required",
            "details"=>"required|max:150",
            "amount"=>"required",
            "date"=>"required",
        ]);
        $update = Earn::find($request->earn_id)->update([
            "earncategory_id"=>$request->earncategory_id,
            "details"=>$request->details,
            "amount"=>$request->amount,
            "date"=>$request->date,
            "creator"=>Auth::user()->name,
            "updated_at"=>Carbon::now(),
        ]);
        if ($update) {
            Session::flash("success", "Update Success !");
            return redirect("all_earn");
        } else {
            Session::flash("unsuccess", "Create Failed !");
            return back();
        };
    }
    #===========================================================================
    public function send_recycle_earn($id)
    {
        Earn::find($id)->update([
            "status"=>0,
            "updated_at"=>Carbon::now(),
        ]);
        return back()->with("success", "Sent Recycle Success !");
    }
    #===========================================================================





    #===========================================================================
}

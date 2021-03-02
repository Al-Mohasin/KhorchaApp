<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Carbon\Carbon;
use App\Models\PaidCategory;

class PaidCategoryController extends Controller
{
    public function __construct()
    {
    }
    #===========================================================================
    public function all_paidcategory()
    {
        $all_paidcategory = PaidCategory::where("status", 1)->get();
        return view("paidcategory.all_paidcategory", compact("all_paidcategory"));
    }
    #===========================================================================
    public function add_paidcategory()
    {
        return view("paidcategory.add_paidcategory");
    }
    #===========================================================================
    public function add_paidcategory_post(Request $request)
    {
        $request->validate([
            "name"=>"required|unique:paid_categories,name",
        ]);
        $insert = PaidCategory::insert([
            "name"=>$request->name,
            "remarks"=>$request->remarks,
            "creator"=>Auth::user()->name,
            "created_at"=>Carbon::now(),
        ]);
        if ($insert) {
            Session::flash("success", "Create Success !");
            return redirect("all_paidcategory");
        } else {
            Session::flash("unsuccess", "Create Failed !");
            return back();
        };
    }
    #===========================================================================
    public function edit_paidcategory($id)
    {
        $paidcategory = paidCategory::find($id);
        return view("paidcategory.edit_paidcategory", compact("paidcategory"));
    }
    #===========================================================================
    public function edit_paidcategory_post(Request $request)
    {
        $request->validate([
            "name"=>"required|unique:paid_categories,name,".$request->paidcategory_id,
        ]);
        $update = PaidCategory::find($request->paidcategory_id)->update([
            "name"=>$request->name,
            "remarks"=>$request->remarks,
            "creator"=>Auth::user()->name,
            "updated_at"=>Carbon::now(),
        ]);
        if ($update) {
            Session::flash("success", "Update Success !");
            return redirect("all_paidcategory");
        } else {
            Session::flash("unsuccess", "Update Failed !");
            return back();
        };
    }
    #===========================================================================
    public function send_recycle_paidcategory($id)
    {
        PaidCategory::find($id)->update([
            "status"=>0,
            "updated_at"=>Carbon::now(),
        ]);
        return back()->with("success", "Sent Recycle Success !");
    }
    #===========================================================================



    #===========================================================================
}

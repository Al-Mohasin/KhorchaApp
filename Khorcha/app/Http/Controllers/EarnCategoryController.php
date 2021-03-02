<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Carbon\Carbon;
use App\Models\EarnCategory;

class EarnCategoryController extends Controller
{
    public function __construct()
    {
    }
    #===========================================================================
    public function all_earncategory()
    {
        $all_earncategory = EarnCategory::where("status", 1)->get();
        return view("earncategory.all_earncategory", compact("all_earncategory"));
    }
    #===========================================================================
    public function add_earncategory()
    {
        return view("earncategory.add_earncategory");
    }
    #===========================================================================
    public function add_earncategory_post(Request $request)
    {
        $request->validate([
            "name"=>"required|unique:earn_categories,name",
        ]);
        $insert = EarnCategory::insert([
            "name"=>$request->name,
            "remarks"=>$request->remarks,
            "creator"=>Auth::user()->name,
            "created_at"=>Carbon::now(),
        ]);
        if ($insert) {
            Session::flash("success", "Create Success !");
            return redirect("all_earncategory");
        } else {
            Session::flash("unsuccess", "Create Failed !");
            return back();
        };
    }
    #===========================================================================
    public function edit_earncategory($id)
    {
        $earncategory = EarnCategory::find($id);
        return view("earncategory.edit_earncategory", compact("earncategory"));
    }
    #===========================================================================
    public function edit_earncategory_post(Request $request)
    {
        $request->validate([
            "name"=>"required|unique:earn_categories,name,".$request->earncategory_id,
        ]);
        $update = EarnCategory::find($request->earncategory_id)->update([
            "name"=>$request->name,
            "remarks"=>$request->remarks,
            "creator"=>Auth::user()->name,
            "updated_at"=>Carbon::now(),
        ]);
        if ($update) {
            Session::flash("success", "Update Success !");
            return redirect("all_earncategory");
        } else {
            Session::flash("unsuccess", "Update Failed !");
            return back();
        };
    }
    #===========================================================================
    public function send_recycle_earncategory($id)
    {
        EarnCategory::find($id)->update([
            "status"=>0,
            "updated_at"=>Carbon::now(),
        ]);
        return back()->with("success", "Sent Recycle Success !");
    }
    #===========================================================================






    #===========================================================================
}

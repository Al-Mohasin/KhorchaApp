<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Carbon\Carbon;
use App\Models\EarnCategory;
use App\Models\Earn;
use App\Models\PaidCategory;
use App\Models\Paid;

class RecycleController extends Controller
{
    #===========================================================================
    #  EarnCategory
    #===========================================================================
    public function recycle_earncategory()
    {
        $recycle_earncategory = EarnCategory::where("status", 0)->get();
        return view("recycle.recycle_earncategory", compact("recycle_earncategory"));
    }
    #===========================================================================
    public function restore_earncategory($id)
    {
        EarnCategory::find($id)->update([
            "status"=>1,
            "updated_at"=>Carbon::now(),
        ]);
        return redirect("all_earncategory")->with("success", "Restore Success !");
    }
    #===========================================================================
    public function delete_earncategory($id)
    {
        EarnCategory::find($id)->delete();
        return back()->with("success", "Delete Success !");
    }
    #===========================================================================
    #  Earn
    #===========================================================================
    public function recycle_earn()
    {
        $recycle_earn = Earn::where("status", 0)->get();
        return view("recycle.recycle_earn", compact("recycle_earn"));
    }
    #===========================================================================
    public function restore_earn($id)
    {
        Earn::find($id)->update([
            "status"=>1,
            "updated_at"=>Carbon::now(),
        ]);
        return redirect("all_earn")->with("success", "Restore Success !");
    }
    #===========================================================================
    public function delete_earn($id)
    {
        Earn::find($id)->delete();
        return back()->with("success", "Delete Success !");
    }
    #===========================================================================
    #  PaidCategory
    #===========================================================================
    public function recycle_paidcategory()
    {
        $recycle_paidcategory = PaidCategory::where("status", 0)->get();
        return view("recycle.recycle_paidcategory", compact("recycle_paidcategory"));
    }
    #===========================================================================
    public function restore_paidcategory($id)
    {
        PaidCategory::find($id)->update([
            "status"=>1,
            "updated_at"=>Carbon::now(),
        ]);
        return redirect("all_paidcategory")->with("success", "Restore Success !");
    }
    #===========================================================================
    public function delete_paidcategory($id)
    {
        PaidCategory::find($id)->delete();
        return back()->with("success", "Delete Success !");
    }
    #===========================================================================
    #  Earn
    #===========================================================================
    public function recycle_paid()
    {
        $recycle_paid = Paid::where("status", 0)->get();
        return view("recycle.recycle_paid", compact("recycle_paid"));
    }
    #===========================================================================
    public function restore_paid($id)
    {
        Paid::find($id)->update([
            "status"=>1,
            "updated_at"=>Carbon::now(),
        ]);
        return redirect("all_paid")->with("success", "Restore Success !");
    }
    #===========================================================================
    public function delete_paid($id)
    {
        Paid::find($id)->delete();
        return back()->with("success", "Delete Success !");
    }
    #===========================================================================




    #===========================================================================
}

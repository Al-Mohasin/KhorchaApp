<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Image;
use Carbon\Carbon;
use Session;

class GeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    //==========================================================================
    public function edit_logo()
    {
        $logo_favicon = Logo::find(1);
        return view("logo.logo", compact("logo_favicon"));
    }
    //==========================================================================
    public function edit_logo_post(Request $request)
    {
        if ($request->hasFile("logo")) {
            $logo_before = Logo::findOrFail(1)->logo;
            unlink("storage/logo/".$logo_before);

            $logo = $request->logo;
            $extension = $logo->getClientOriginalExtension();
            $logo_name = "logo".".".$extension;
            $save_path = public_path("storage/logo/".$logo_name);

            Image::make($logo)->heighten(100)->save($save_path);
            Logo::findOrFail(1)->update([
                "logo"=>$logo_name,
                "updated_at"=>Carbon::now(),
            ]);
        };

        if ($request->hasFile("favicon")) {
            $favicon_before = Logo::findOrFail(1)->favicon;
            unlink("storage/logo/".$favicon_before);

            $favicon = $request->favicon;
            $extension = $favicon->getClientOriginalExtension();
            $favicon_name = "favicon".".".$extension;
            $save_favicon_path = public_path("storage/logo/".$favicon_name);

            Image::make($favicon)->resize(32, 32)->save($save_favicon_path);
            Logo::findOrFail(1)->update([
                "favicon"=>$favicon_name,
                "updated_at"=>Carbon::now(),
            ]);
        };

        Session::flash("success", "Successfully Update Information !");
        return redirect("edit_logo");
    }
    //==========================================================================
}

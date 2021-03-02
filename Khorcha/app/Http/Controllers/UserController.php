<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Auth;
use Image;
use Session;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    #===========================================================================
    public function access_denied()
    {
        return view("access_denied");
    }
    #===========================================================================
    public function all_user()
    {
        $all_user = User::orderBy("id", "DESC")->where("status", 1)->get();
        return view("user.all_user", compact("all_user"));
    }
    #===========================================================================
    public function add_user()
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 1) {
            $user_role = Role::all();
            return view("user.add_user", compact("user_role"));
        } else {
            return redirect("access_denied");
        };
    }
    #===========================================================================
    public function add_user_post(Request $request)
    {
        $this->validate($request, [
            "name"=>"required|string|min:3|max:30",
            "email"=>"required|unique:users,email|email|string|max:50",
            "phone"=>"required|min:6|max:20",
            "role_id"=>"required",
            "password"=>"required|min:6|max:20|string|same:confirm_password",
            "confirm_password"=>"required",
        ]);
        $insert_id = User::insertGetId([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "role_id"=>$request->role_id,
            "password"=>Hash::make($request->password),
            "created_at"=>Carbon::now(),
            "email_verified_at"=>Carbon::now(),
        ]);

        if ($request->hasFile("photo")) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_new_name = "user_".$insert_id.".".$extension;

            //Upload/Store file for crop from here
            Image::make($request->file('photo'))->widen(400)->save(public_path("uploads/".$photo_new_name));
            // $request->file('photo')->storeAs("public/user/", $photo_new_name);

            $photo_save_path = public_path("uploads/user/".$photo_new_name);

            $width = $request->input('w');
            $height = $request->input('h');
            if ($width == "" && $height == "") {
                Image::make($request->file('photo'))->resize(200, 200)->save($photo_save_path);
                User::findOrFail($insert_id)->update([
                    "photo"=>$photo_new_name,
                    "updated_at"=>Carbon::now(),
                ]);
                unlink(public_path("uploads/".$photo_new_name));
            } else {
                $for_crop_path = Image::make(public_path("uploads/".$photo_new_name));
                $for_crop_path->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))->heighten(200)->save($photo_save_path);
                User::findOrFail($insert_id)->update([
                    "photo"=>$photo_new_name,
                    "updated_at"=>Carbon::now(),
                ]);
                unlink(public_path("uploads/".$photo_new_name));
            };
        };

        if ($insert_id) {
            Session::flash("success", "Successfully Register User information !");
            return back();
        // return redirect("user_details/".$insert_id);
        } else {
            Session::flash("unsuccess", "User Registration Failed !");
            return back();
            // return redirect("add_user");
        };
    }
    #===========================================================================
    public function edit_user($user_id)
    {
        // $user_info = User::findOrFail($user_id);
        // $user_role = Role::all();
        // return view("user.edit_user", compact("user_info", "user_role"));
        // die();

        $live_user = Auth::user()->id;
        $role_id = Auth::user()->role_id;
        if ($live_user == $user_id || $role_id == 1) {
            $user_info = User::findOrFail($user_id);
            $user_role = Role::all();
            return view("user.edit_user", compact("user_info", "user_role"));
        } else {
            return redirect("access_denied");
        };
    }
    #===========================================================================
    // public function user_details($user_id)
    // {
    //     $live_user = Auth::user()->id;
    //     $role_id = Auth::user()->role_id;
    //     if ($live_user == $user_id || $role_id <= 2) {
    //         $user_info = User::findOrFail($user_id);
    //         return view("user.user_details", compact("user_info"));
    //     } else {
    //         return redirect("access_denied");
    //     };
    // }
    #===========================================================================
    // public function delete_user($id)
    // {
    //     User::find($id)->delete();
    //     return response()->json([
    //         'success' => 'Record deleted successfully!'
    //     ]);
    // }
    #===========================================================================

    #===========================================================================
    // public function edit_user_post(Request $request)
    // {
    //     $request->validate([
    //         "name"=>"required|string|min:3|max:30",
    //         "phone"=>"required|min:6|max:20",
    //     ]);
    //
    //     $email_new = $request->email;
    //     if ($email_new == "") {
    //         $email_new = User::find($request->user_id)->email;
    //     };
    //     $email_before = User::find($request->user_id)->email;
    //     if ($email_new != $email_before) {
    //         User::findOrFail($request->user_id)->update([
    //             "email"=>$email_new,
    //             "email_verified_at"=>null,
    //         ]);
    //     };
    //
    //     $role_id = $request->role_id;
    //     if ($role_id == "") {
    //         $role_id = User::findOrFail($request->user_id)->role_id;
    //     };
    //
    //     $update = User::findOrFail($request->user_id)->update([
    //         "name"=>$request->name,
    //         "phone"=>$request->phone,
    //         "role_id"=>$role_id,
    //     ]);
    //
    //     if ($request->hasFile("photo")) {
    //         $photo_before = User::findOrFail($request->user_id)->photo;
    //         if ($photo_before != "avatar.png") {
    //             unlink(public_path("storage/user/crop_photo/".$photo_before));
    //         };
    //
    //         $photo = $request->file('photo');
    //         $extension = strToLower($photo->getClientOriginalExtension());
    //         $photo_new_name = "user_".$request->user_id.".".$extension;
    //
    //         Image::make($photo)->widen(500)->save(public_path("storage/user/".$photo_new_name));
    //
    //         $photo_save_path = public_path("storage/user/crop_photo/".$photo_new_name);
    //
    //         $width = $request->input('w');
    //         $height = $request->input('h');
    //         if ($width == "" && $height == "") {
    //             Image::make($photo)->heighten(200)->save($photo_save_path);
    //             User::findOrFail($request->user_id)->update([
    //                 "photo"=>$photo_new_name,
    //                 "updated_at"=>Carbon::now(),
    //             ]);
    //             unlink(public_path("storage/user/".$photo_new_name));
    //         } else {
    //             // $for_crop_path = Image::make(public_path("storage/user/".$photo_new_name));
    //             Image::make(public_path("storage/user/".$photo_new_name))
    //             ->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'))
    //             ->heighten(200)
    //             ->save($photo_save_path);
    //
    //             User::findOrFail($request->user_id)->update([
    //                 "photo"=>$photo_new_name,
    //                 "updated_at"=>Carbon::now(),
    //             ]);
    //             unlink(public_path("storage/user/".$photo_new_name));
    //         };
    //     };
    //
    //     if ($update) {
    //         Session::flash("success", "Successfully Update User Information !");
    //         return redirect("user_details/".$request->user_id);
    //     } else {
    //         Session::flash("unsuccess", "User Update Failed !");
    //         return redirect("edit_user");
    //     };
    // }
    #===========================================================================
    // public function view_deleted_user()
    // {
    //     $live_user = Auth::user()->id;
    //     $role_id = Auth::user()->role_id;
    //     if ($role_id == 1) {
    //         $deleted_users = User::onlyTrashed()->get();
    //         return view("user.deleted_user", compact("deleted_users"));
    //     } else {
    //         return redirect("access_denied");
    //     };
    // }
    #===========================================================================
    // public function restore_user($user_id)
    // {
    //     $name = User::withTrashed()->findOrFail($user_id)->name;
    //     User::withTrashed()->where("id", $user_id)->restore();
    //     return redirect("all_user")->with("success", "Welcome Back $name!");
    // }
    #===========================================================================
    // public function force_delete_user($user_id)
    // {
    //     $photo = User::withTrashed()->findOrFail($user_id)->photo;
    //     if ($photo != "avatar.png") {
    //         unlink(public_path("storage/user/crop_photo/".$photo));
    //     };
    //
    //     User::withTrashed()->where("id", $user_id)->forceDelete();
    //     return response()->json([
    //         'success' => 'Record deleted successfully!'
    //     ]);
    // }
    #===========================================================================





    #===========================================================================
}

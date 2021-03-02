<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EarnCategoryController;
use App\Http\Controllers\EarnController;
use App\Http\Controllers\PaidCategoryController;
use App\Http\Controllers\PaidController;
use App\Http\Controllers\RecycleController;
use App\Http\Controllers\SummaryController;

#===============================================================================
Route::get('/', function () {
    return view('welcome');
});
#===============================================================================
Auth::routes(['verify' => true]);
#===============================================================================
// HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home');

#===============================================================================
# UserController
Route::get("/add_user", [UserController::class, "add_user"])->name("add_user");
Route::post("/add_user_post", [UserController::class, "add_user_post"]);
Route::get("/all_user", [UserController::class, "all_user"])->name("all_user");
Route::get("/edit_user/{user_id}", [UserController::class, "edit_user"]);

#===============================================================================
# EarnCategoryController
Route::get("/all_earncategory", [EarnCategoryController::class, "all_earncategory"]);
Route::get("/add_earncategory", [EarnCategoryController::class, "add_earncategory"]);
Route::post("/add_earncategory_post", [EarnCategoryController::class, "add_earncategory_post"]);
Route::get("/edit_earncategory/{id}", [EarnCategoryController::class, "edit_earncategory"]);
Route::post("/edit_earncategory_post", [EarnCategoryController::class, "edit_earncategory_post"]);
Route::get("/send_recycle_earncategory/{id}", [EarnCategoryController::class, "send_recycle_earncategory"]);

# EarnController
Route::get("/all_earn", [EarnController::class, "all_earn"]);
Route::get("/add_earn", [EarnController::class, "add_earn"]);
Route::post("/add_earn_post", [EarnController::class, "add_earn_post"]);
Route::get("/edit_earn/{id}", [EarnController::class, "edit_earn"]);
Route::post("/edit_earn_post", [EarnController::class, "edit_earn_post"]);
Route::get("/send_recycle_earn/{id}", [EarnController::class, "send_recycle_earn"]);

#===============================================================================
# PaidCategoryController
Route::get("/all_paidcategory", [PaidCategoryController::class, "all_paidcategory"]);
Route::get("/add_paidcategory", [PaidCategoryController::class, "add_paidcategory"]);
Route::post("/add_paidcategory_post", [PaidCategoryController::class, "add_paidcategory_post"]);
Route::get("/edit_paidcategory/{id}", [PaidCategoryController::class, "edit_paidcategory"]);
Route::post("/edit_paidcategory_post", [PaidCategoryController::class, "edit_paidcategory_post"]);
Route::get("/send_recycle_paidcategory/{id}", [PaidCategoryController::class, "send_recycle_paidcategory"]);

# PaidController
Route::get("/all_paid", [PaidController::class, "all_paid"]);
Route::get("/add_paid", [PaidController::class, "add_paid"]);
Route::post("/add_paid_post", [PaidController::class, "add_paid_post"]);
Route::get("/edit_paid/{id}", [PaidController::class, "edit_paid"]);
Route::post("/edit_paid_post", [PaidController::class, "edit_paid_post"]);
Route::get("/send_recycle_paid/{id}", [PaidController::class, "send_recycle_paid"]);

#===============================================================================
# SummaryController
Route::get("/all_summary", [SummaryController::class, "all_summary"]);
Route::get("/all_estimate", [SummaryController::class, "all_estimate"]);
Route::get("/admin/summary/search/{from}/{to}", [SummaryController::class, "search"]);
// Route::get('/admin/summary/search/{from}/{to}', 'SummaryController@search');

#===============================================================================
# RecycleController
Route::get("/recycle_earncategory", [RecycleController::class, "recycle_earncategory"]);
Route::get("/restore_earncategory/{id}", [RecycleController::class, "restore_earncategory"]);
Route::get("/delete_earncategory/{id}", [RecycleController::class, "delete_earncategory"]);

Route::get("/recycle_earn", [RecycleController::class, "recycle_earn"]);
Route::get("/restore_earn/{id}", [RecycleController::class, "restore_earn"]);
Route::get("/delete_earn/{id}", [RecycleController::class, "delete_earn"]);

Route::get("/recycle_paidcategory", [RecycleController::class, "recycle_paidcategory"]);
Route::get("/restore_paidcategory/{id}", [RecycleController::class, "restore_paidcategory"]);
Route::get("/delete_paidcategory/{id}", [RecycleController::class, "delete_paidcategory"]);

Route::get("/recycle_paid", [RecycleController::class, "recycle_paid"]);
Route::get("/restore_paid/{id}", [RecycleController::class, "restore_paid"]);
Route::get("/delete_paid/{id}", [RecycleController::class, "delete_paid"]);






#===============================================================================
//=== END ===//
#===============================================================================
/*==============================
<!-- / Message view -->
@if(session("success"))
<div class="row pb-0">
    <div class="ol-md-8 col-12 text-center ffset-md-2">
        <div class="alert alert-dismissible fade show session_success" role="alert">
            {{ Session("success") }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
@if(session("unsuccess"))
<div class="row pb-0">
    <div class="ol-md-8 col-12 text-center ffset-md-2">
        <div class="alert alert-dismissible fade show session_unsuccess" role="alert">
            {{ Session("unsuccess") }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
<!-- / Message view -->
==============================*/
/*
==============================
<div class="card-title text-center">User Register Form <br>
    <a href="{{ route('all_user') }}" class="myButtonSmall">All User</a>
</div>
==============================
@if(Auth::user()->role_id < 3)
<td class="manage_badge">
    <div class="d-flex">
        <a href="{{ url('behind_order/'.$user->id) }}" class="badge badge-dark"><small>Edit</small></a>

        <a href="{{ url('behind_order/'.$user->id) }}" class="badge badge-info"><small>Details</small></a>

        <button type="button" class="alert_delete badge badge-danger" value="{{ url('sent_recycle_order/'.$user->id) }}" style="cursor:pointer;">Recycle</button>
    </div>
</td>
@endif
*/
#==============================
#==============================
#===============================================================================
//superadmin admin editor author customer
//gmail app password-- dmEcom-1  --- tlwroftgafjczmhl

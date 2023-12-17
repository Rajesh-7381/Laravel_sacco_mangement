<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanPlanController;
use App\Http\Controllers\LoanTypesController;
use App\Http\Controllers\LoanUserController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// facebook login
Route::get('auth/facebook', [SocialiteController::class, 'redirectToFB']);
Route::get('callback/facebook', [SocialiteController::class, 'handleCallback']);
Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [SocialiteController::class, 'handleGoogleCallback']);
Route::get('/error', [ErrorController::class, 'show'])->name('error.page');



Route::get('/',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'register']);
Route::get('/reload-captcha', [AuthController::class, 'reloadCaptcha']);
Route::get('/register_post',[AuthController::class,'register_post']);
Route::get('login_post',[AuthController::class,'login_post']);
Route::get('/forgot',[AuthController::class,'forgot']);
Route::get('/forgot/post',[AuthController::class,'forgot_post']);


Route::group(['middleware' => 'admin'],function(){
    Route::get('admin/dashboard',[DashboardController::class,'index']);
    Route::get('admin/staff/list',[StaffController::class,'index']);
    Route::get('admin/staff/add',[StaffController::class,'add']);
    Route::post('admin/staff/add',[StaffController::class,'add_store']);
    Route::get('admin/staff/edit/{id}',[StaffController::class,'staff_edit']);
    Route::post('admin/staff/edit/{id}',[StaffController::class,'staff_edit_update']);
    Route::get('admin/staff/delete/{id}', [StaffController::class, 'staff_delete']);
    Route::get('admin/staff/view_staff/{id}', [StaffController::class, 'staff_view']);

    // loan type
    Route::get('admin/loan_types/list',[LoanTypesController::class,'index']);
    Route::get('admin/loan_types/add',[LoanTypesController::class,'add']);
    Route::post('admin/loan_types/add',[LoanTypesController::class,'store']);
    Route::get('admin/loan_types/delete/{id}', [LoanTypesController::class, 'delete_loan_types']);
    Route::get('admin/loan_types/edit/{id}', [LoanTypesController::class, 'edit']);
    Route::post('admin/loan_types/edit/{id}', [LoanTypesController::class, 'edit_update']);

    // loan plan
    Route::get('admin/loan_plans/list',[LoanPlanController::class,'index']);
    Route::get('admin/loan_plans/add',[LoanPlanController::class,'add']);
    Route::post('admin/loan_plans/add',[LoanPlanController::class,'store']);
    Route::get('admin/loan_plans/edit/{id}', [LoanPlanController::class, 'edit']);
    Route::post('admin/loan_plans/edit/{id}', [LoanPlanController::class, 'edit_update']);
    Route::get('admin/loan_plans/delete/{id}', [LoanPlanController::class, 'delete_loan_plans']);

    // loan menu
    Route::get('admin/loan/index',[LoanController::class,'index']);
    Route::get('admin/loan/add',[LoanController::class,'create']);
    Route::post('admin/loan/add',[LoanController::class,'store']);
    Route::get('admin/loan/edit/{id}',[LoanController::class,'edit']);
    Route::post('admin/loan/edit/{id}',[LoanController::class,'update']);
    Route::get('admin/loan/delete/{id}',[LoanController::class,'destroy']);

    // loan user
    Route::get('admin/loan_user/index',[LoanUserController::class,'index']);
    Route::get('admin/loan_user/add',[LoanUserController::class,'create']);
    Route::post('admin/loan_user/add',[LoanUserController::class,'store']);
    Route::get('admin/loan_user/edit/{id}', [LoanUserController::class, 'edit']);
    Route::post('admin/loan_user/edit/{id}', [LoanUserController::class, 'update']);
    Route::get('admin/loan_user/delete/{id}', [LoanUserController::class, 'destroy']);

    // profile 
    Route::get('admin/profile', [DashboardController::class, 'profile']);
    Route::post('admin/profile/update', [DashboardController::class, 'update']);

    //logo
    Route::get('admin/logo', [DashboardController::class, 'website_logo']);
    Route::post('admin/logo_update', [DashboardController::class, 'website_logo_update']);

    // paypal
    



});

Route::group(['middleware' => 'staff'],function(){
    
    Route::get('staff/dashboard',[DashboardController::class,'index']);
    Route::get('staff/loan_user/list',[LoanUserController::class,'staff_loan_user']);
    Route::get('staff/loan_user/delete/{id}', [LoanUserController::class, 'delteLoanUser']);
    Route::get('staff/profile', [DashboardController::class, 'staff_profile']);
    Route::post('staff/profile_update', [DashboardController::class, 'staff_profile_update']);

});

Route::get('logout',[AuthController::class,'logout']);
// Route::match(['get', 'post'], 'stripe', [DashboardController::class, 'stripe'])->name('stripe');
Route::get('/checkout',[DashboardController::class,'checkout'])->name('checkout');
Route::post('/session',[DashboardController::class,'session'])->name('session');

Route::get('/success', [DashboardController::class, 'success'])->name('success');




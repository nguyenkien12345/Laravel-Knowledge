<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login']);

Route::get('logout', [LoginController::class, 'logout']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('password/show-link-reset-password-email', [ForgotPasswordController::class, 'showLinkResetPasswordEmail']);
Route::post('password/send-link-reset-password-email', [ForgotPasswordController::class, 'sendLinkResetPasswordEmail']);

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetPasswordEmail']);
Route::post('password/reset', [ResetPasswordController::class, 'resetPasswordEmail']);

Route::middleware('admin.auth')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
});

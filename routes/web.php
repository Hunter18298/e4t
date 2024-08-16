<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;

Route::get('/', function () {
    return view('home');
});

Route::get('/meeting-form', function () {
    return view('home.meeting');
});



// Admin Dashboard
Route::get('/admin', [AdminHomeController::class, 'index']);
Route::get('/admin/meeting',function () {
    return view('admin.meeting');
});


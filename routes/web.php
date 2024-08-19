<?php


use App\Livewire\Admin\Onlinetable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\MeetingTable;

Route::get('/', function () {
    return view('home');
});

Route::get('/meeting-form', function () {
    return view('home.meeting');
});
Route::get('/online-form', function () {
    return view('home.online');
});



// Admin Dashboard
Route::get('/admin',Dashboard::class);
Route::get('/admin/meeting', MeetingTable::class);
Route::get('/admin/online', Onlinetable::class);
Route::get('/admin/accounting',function () {
    return view('admin.accounting');
});


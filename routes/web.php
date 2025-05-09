<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);

use App\Http\Controllers\Admin\ReportController;


Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

});

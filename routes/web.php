<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/hi', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);

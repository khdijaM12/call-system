<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcomesss');
});

Route::get('/counter', Counter::class);

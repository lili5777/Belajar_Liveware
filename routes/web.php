<?php

use App\Livewire\Data;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data',Data::class)->name('data');

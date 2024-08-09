<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/meeting',function(){
    return view('/home/meeting');
});
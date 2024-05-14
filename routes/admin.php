<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('admin',function(){
    return view('inicio');
});


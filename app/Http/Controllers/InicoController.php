<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicoController extends Controller
{
    public function index()
    {
        
        return redirect()->away('http://127.0.0.1/miWordPress');
    }
}

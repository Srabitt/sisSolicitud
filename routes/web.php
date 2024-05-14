<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\InicoController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailable;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/gestor',[SolicitudController::class,'index']);
/*
Route::get('dds', function () {
    return view('inicio')->name('inicio');
});
/*
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/gestor',[SolicitudController::class,'index']);//Este es la url para dirigirnos a adminLTE
    Route::get('/profile', function () {return view('inicio');})->name('dashboard');

});

Route::get('/iniciPag',[InicoController::class,'index']);


Route::resource('empleaod', SolicitudController::class);

Route::get('aceptar-soli',function(){
    Mail::to('huaringadiego26@gmail.com')
        ->send(new ContactanosMailable);
    return redirect('/gestor')->with('aceptarF','ok');
})->name('aceptar-soli');

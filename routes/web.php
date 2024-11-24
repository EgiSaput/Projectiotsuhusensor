<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuhuSensor;

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

Route::get('/', function () {
    return view('monitoring');
});
//route untuk bacasuhu
Route::get('/bacasuhu',[SuhuSensor::class,'bacasuhu'])->name('bacasuhu');
//route untuk bacakelembaban
Route::get('/bacakelembaban',[SuhuSensor::class,'bacakelembaban']);
//route untuk menyimpan nilai sensor ke tb_sensor
Route::get('/simpan/{suhu}/{kelembaban}',[SuhuSensor::class,'simpansensor']);


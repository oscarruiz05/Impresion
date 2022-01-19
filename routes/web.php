<?php

use App\Http\Controllers\Impresora\ImprimirTicket;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Ruta para imprimir ticket */
Route::get('/print/ticket', [ImprimirTicket::class, 'imprimir'])->name('imprimir');

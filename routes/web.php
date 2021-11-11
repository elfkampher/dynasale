<?php

use App\Http\Livewire\Asignar;
use App\Http\Livewire\Cashout;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Coins;
use App\Http\Livewire\Permisos;
use App\Http\Livewire\Pos;
use App\Http\Livewire\Products;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Users;
use App\Http\Livewire\Reports;
use App\Http\Controllers\ExportController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

    Route::get('categories', Categories::class)->middleware('permission:Category_Index');
    Route::get('products', Products::class)->middleware('permission:Product_Index');
    Route::get('coins', Coins::class)->middleware('permission:Coin_Index');
    Route::get('pos', Pos::class)->middleware('permission:Pos_Index');
    Route::group(['middleware' => ['role:Admin']], function(){
        Route::get('roles', Roles::class);
        Route::get('permisos', Permisos::class);
        Route::get('asignar', Asignar::class);
    });

    Route::get('users', Users::class);
    Route::get('cashout', Cashout::class)->middleware('permission:Cashout_Index');
    Route::get('reports', Reports::class)->middleware('permission:Reports_Index');

    //Reportes PDF
    Route::get('report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
    Route::get('report/pdf/{user}/{type}', [ExportController::class, 'reportPDF']);
    //Reportes Excel
    Route::get('report/excel/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reporteExcel']);
    Route::get('report/excel/{user}/{type}', [ExportController::class, 'reporteExcel']);
});

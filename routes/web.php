<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketProjectController;
use App\Http\Controllers\TicketTypeController;

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
////////////landingpage////////////////////
Route::get('/', function () {
    return view('welcome');
});


///////////////////ticket type page////////////////////
Route::prefix('/ticketType')->name('ticketType.')->group(function(){
    Route::get('/', [TicketTypeController::class, 'index'])->name('index');
    Route::post('/create', [TicketTypeController::class, 'createType'])->name('createType');
    Route::post('/store', [TicketTypeController::class, 'store'])->name('store');
    Route::get('/{id}', [TicketTypeController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [TicketTypeController::class, 'update'])->name('update');
});

///////////////////Project page////////////////////
Route::prefix('/project')->name('project.')->group(function(){
    Route::get('/', [TicketProjectController::class, 'index'])->name('index');
    Route::post('/create', [TicketProjectController::class, 'createProject'])->name('createProject');
    Route::post('/{id}', [TicketProjectController::class, 'edit'])->name('edit');
    Route::post('/{id}', [TicketProjectController::class, 'update'])->name('update');
});

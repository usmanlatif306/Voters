<?php

use App\Http\Controllers\VoterController;
use App\Http\Controllers\VoterExportController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'voters')->name('voters');
Route::view('/confirmed', 'confirmed')->name('confirmed');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('voters/export/{type}', VoterExportController::class)->name('voters.export');
Route::resource('voters', VoterController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\MarksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestsController;
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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tests', [TestsController::class, 'read'])->name('tests.read');
    Route::get('/tests/create', [TestsController::class, 'create'])->name('tests.create');
    Route::post('/tests', [TestsController::class, 'store'])->name('tests.store');

    Route::get('/tests/{id}/marks', [MarksController::class, 'read'])->name('marks.read');
    Route::post('/tests/{id}/marks', [MarksController::class, 'store'])->name('marks.store');
});

require __DIR__ . '/auth.php';

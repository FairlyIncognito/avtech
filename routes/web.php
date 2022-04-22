<?php

use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applipcation. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IdeaController::class, 'index'])->name('idea.index');

Route::get('/job', [JobController::class, 'index'])->name('job.index');
Route::get('/jobs/{job:slug}', [JobController::class, 'show'])->name('job.show');
Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');

Route::get('/profiles/{idea:slug}', [IdeaController::class, 'show'])->name('idea.show');
Route::get('/profile', [IdeaController::class, 'create'])->name('idea.create');

require __DIR__.'/auth.php';
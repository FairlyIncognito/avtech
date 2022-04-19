<?php

use App\Http\Controllers\IdeaController;
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

Route::get('/', [IdeaController::class, 'index'])->name('idea.index');

Route::get('/work', [WorkController::class, 'index'])->name('work.index');
Route::get('/work/{work:slug}', [WorkController::class, 'show'])->name('work.show');
Route::get('/work/create', [WorkController::class, 'create'])->name('work.create');

Route::get('/profile/{idea:slug}', [IdeaController::class, 'show'])->name('idea.show');
Route::get('/profile', [IdeaController::class, 'create'])->name('idea.create');

require __DIR__.'/auth.php';
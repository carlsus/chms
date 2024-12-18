<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\E2EController;
use App\Http\Controllers\MemberGroupController;
use App\Http\Controllers\One2OneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VictoryWeekendController;
use App\Models\MemberGroup;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('/profile/member', [ProfileController::class, 'members'])->name('profile.member');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('profile', ProfileController::class);

    Route::resource('membergroup', MemberGroupController::class);
    Route::resource('one2one', One2OneController::class);
    Route::resource('chapter', ChapterController::class);
    Route::resource('e2e', E2EController::class);
    Route::resource('victoryweekend', VictoryWeekendController::class);
    Route::patch('/membergroup/{id}', [MemberGroupController::class, 'update'])->name('membergroup.update');
});

require __DIR__.'/auth.php';

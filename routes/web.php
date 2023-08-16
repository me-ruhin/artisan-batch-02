<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('view/posts',[PostController::class,'view'])->middleware(['auth']);

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/admin/dashboard',[DashboardController::class,'adminDashboard'])->middleware(['auth','role:admin'])->name('admin.dashboard');
Route::get('/instructor/dashboard',[DashboardController::class,'instructorDashboard'])->middleware(['auth','role:instructor'])->name('instructor.dashboard');
Route::get('/student/dashboard',[DashboardController::class,'studentDashboard'])->middleware(['auth','role:student'])->name('student.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

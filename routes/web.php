<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Console\View\Components\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tambahkan rute berikut ke rute yang ada karena kita ingin rute tugas hanya dapat diakses oleh pengguna yang diautentikasi.
    // Kita akan menggunakan rute resource karena berisi semua rute yang kita perlukan untuk aplikasi CRUD pada umumnya.
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/{task}/mark-completed', [TaskController::class, 'markCompleted'])->name('tasks.mark-completed');
    Route::get('/tasks/{task}/mark-uncompleted', [TaskController::class, 'markUncompleted'])->name('tasks.mark-uncompleted');
});

require __DIR__.'/auth.php';

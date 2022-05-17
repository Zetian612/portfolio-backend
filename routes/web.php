<?php

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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::prefix('/admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/{project}/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/{project}/delete', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.delete');

    Route::get('/skills', [App\Http\Controllers\SkillController::class, 'index'])->name('skills.index');    
    Route::get('/skills/create', [App\Http\Controllers\SkillController::class, 'create'])->name('skills.create');
    Route::post('/skills/store', [App\Http\Controllers\SkillController::class, 'store'])->name('skills.store');
    Route::get('/skills/{skill}/edit', [App\Http\Controllers\SkillController::class, 'edit'])->name('skills.edit');
    Route::post('/skills/{skill}/update', [App\Http\Controllers\SkillController::class, 'update'])->name('skills.update');
    Route::get('/skills/{skill}/delete', [App\Http\Controllers\SkillController::class, 'destroy'])->name('skills.delete');
});

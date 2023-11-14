<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;

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

Route::get('/', [UserProfileController::class, 'home'])->name('home');
Route::get('get-records/', [UserProfileController::class, 'get_records'])->name('get_records');
Route::get('create-account/', [UserProfileController::class, 'create_profile_form'])->name('create_profile');
Route::post('create-account/', [UserProfileController::class, 'create_profile'])->name('create_profile');
Route::get('edit-profile/{id}', [UserProfileController::class, 'edit_profile'])->name('edit_profile');
// Route::post('save-profile/{id}', [UserProfileController::class, 'update_profile'])->name('update_profile');
Route::post('save-profile/', [UserProfileController::class, 'update_profile'])->name('update_profile');
Route::get('delete-profile/{id}', [UserProfileController::class, 'delete_profile'])->name('delete_profile');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\User\DashboardController as UserDashboard;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth','verified'])->name('dashboard');

//user flow
Route::group(['middleware' => ['auth', 'user', 'verified']], function () {
    Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [UserDashboard::class, 'create'])->name('url.shorten.user');
    Route::post('/dashboard/edit/{id}', [UserDashboard::class, 'update'])->name('update.user');
    Route::post('/dashboard/deactivate/{id}', [UserDashboard::class, 'deactivate'])->name('deactivate.user');
    Route::post('/dashboard/activate/{id}', [UserDashboard::class, 'activate'])->name('activate.user');
});

//admin flow
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin_dashboard', [AdminDashboard::class, 'index'])->name('admin_dashboard');
});

require __DIR__ . '/auth.php';

Route::get('/', [UrlController::class, 'index'])->middleware('guest');
Route::get('/result/{id}', [UrlController::class, 'result'])->name('url.res');
Route::post('/', [UrlController::class, 'create'])->name('url.shorten');

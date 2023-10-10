<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/login', function () {
    return Inertia::render('Login/Login');
})->name('login');

Route::post('/login', [AccountController::class, 'login']);
Route::post('/register', [AccountController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/', function (Request $request) {
        $user = Auth::user();
        if(is_null($user['display_name'])){
            return redirect('/firstrun');
        }
        return Inertia::render('Home/Index');
    });

    Route::get('/firstrun', function () {
        return Inertia::render('FirstRun/Index');
    });

    Route::post('/firstrun', [AccountController::class, 'firstrun']);

    Route::post('/logout', [AccountController::class, 'logout']);
});

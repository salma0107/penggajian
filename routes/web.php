<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TunjanganController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\LaporanController;

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

Route::get('/test', function () {
    return 'Test route works!';
});

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::middleware('auth')->group(
    function () {
        // Route::get('/', function () {
        //     return view('home', ['title' => 'Beranda']);
        // })->name('home');

        Route::get('password', [UserController::class, 'password'])->name('password');
        Route::post('password', [UserController::class, 'password_action'])->name('password.action');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');

        // Route Home
        Route::get('/', [HomeController::class, 'index'])->name('home.index');

        // Route Calendar
        Route::get('/calendar', function () {
            $title = "My Calendar";
            return view('calendar', compact('title'));
        })->name('calendar');

        // Route Dashboard
        Route::get('dashboard', [DashboardController::class])->name('dashboard.index');
        Route::resource('dashboard', DashboardController::class);

        // Route Jabatan
        Route::resource('positions', PositionController::class);
        Route::get('position/exportpdf', [PositionController::class, 'exportPdf'])->name('exportpdf');

        // Route Tunjangan
        Route::resource('tunjangans', TunjanganController::class);

        // Route Pegawai
        Route::resource('pegawais', PegawaiController::class);

        // Route Divisi
        Route::resource('divises', DivisiController::class);

        // Route Gaji
        Route::resource('gajis', GajiController::class);

        // Route Payroll
        Route::resource('payrolls', PayrollController::class);

        // Route Laporan
        Route::resource('laporans', LaporanController::class);
        Route::get('/laporans', 'LaporanController@index')->name('laporans.index');


        
    }
);
<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Staff\Auth\AuthController;
use App\Http\Controllers\Staff\CheckInController;
use App\Http\Controllers\Staff\ConcertController;
use App\Http\Controllers\Staff\GuestController;
use App\Models\Ticket;
use Illuminate\Http\Request;
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

Route::get('_webmin', function () {
    return redirect()->route('staff.dashboard');
});

Route::prefix('_webmin')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::name('staff.')->middleware('auth')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::prefix('konser')->name('concert.')->group(function () {
            Route::get('/', [ConcertController::class, 'index'])->name('index');
            Route::get('create', [ConcertController::class, 'create'])->name('create');
            Route::post('store', [ConcertController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ConcertController::class, 'edit'])->name('edit');
            Route::put('update/{id}', [ConcertController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [ConcertController::class, 'destroy'])->name('delete');
        });

        Route::prefix('pemesan')->name('guest.')->group(function () {
            Route::get('/', [GuestController::class, 'index'])->name('index');
            Route::get('edit/{id}', [GuestController::class, 'edit'])->name('edit');
            Route::put('update/{id}', [GuestController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [GuestController::class, 'destroy'])->name('delete');
        });

        Route::get('check-in', [CheckInController::class, 'index'])->name('check-in');
        Route::post('check-in/cari', [CheckInController::class, 'search'])->name('check-in.search');
        Route::post('check-in/{id}', [CheckInController::class, 'checkIn'])->name('check-in.post');

        Route::get('laporan', function() {
            $data = Ticket::paginate(10);

            return view('report.index', compact('data'));
        })->name('report');
    });
});

Route::get('/', [BookingController::class, 'index'])->name('booking');
Route::post('booking', [BookingController::class, 'booking'])->name('booking.post');
Route::get('/get-concert-details/{id}', [BookingController::class, 'getConcertDetails'])->name('getConcertDetails');

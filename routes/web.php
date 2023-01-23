<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon as Carbon;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    // $dateOfBirth = '1987-09-09';
    // $years = Carbon::parse($dateOfBirth)->age;

    $res       = [];
    // $res['name'] = 'Roman Matvii';
    // $res['dob_years'] = $years;
    // $res['dob_date'] = str_replace('-', ' ', $dateOfBirth);

    return view('auth/register', $res);
});

//! admin page
Route::get('dashboard', function () {
    return view('test');
    // return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//! settings page
// Route::get('/admin/settings', function () {
//     return view('settings');
// })->middleware(['auth'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

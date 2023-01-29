<?php

use App\Http\Controllers\LocationsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon as Carbon;
use App\Models\Location as Location;

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
    // $res['dob_years'] = $years;
    // $res['dob_date'] = str_replace('-', ' ', $dateOfBirth);

    return view('auth/register', $res);
});


// Route::get('/locations/create', 'App\Http\Controllers\LocationsController@create')->name('locations.create', function () {
//     return view('test');
//     // return view('dashboard');
// })->middleware(['auth', 'verified'])->name('locations.create');



//! admin page
Route::get('dashboard', function () {
    // \App::setLocale('en');

    // $locations = Location::all();
    $locations = Location::select('id', 'type_id', 'company', 'address', 'lat', 'long')->where('user_id' ,'=', Auth::user()->id)->get();
    $locationsType = DB::table('locations_type')->get();

    return view('test', compact('locations', 'locationsType'));
    // return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//! Admin locations page
Route::get('/dashboard/locations','App\Http\Controllers\LocationsController@index')->middleware(['auth', 'verified'])->name('locations');

Route::get('/dashboard/locations/map','App\Http\Controllers\LocationsController@map')->middleware(['auth', 'verified'])->name('locations/map');

Route::get('/dashboard/locations/create','App\Http\Controllers\LocationsController@create')->middleware(['auth', 'verified'])->name('locations.create');

Route::get('/dashboard/locations/edit','App\Http\Controllers\LocationsController@edit')->middleware(['auth', 'verified'])->name('locations.edit');

Route::get('/dashboard/locations/delete','App\Http\Controllers\LocationsController@delete')->middleware(['auth', 'verified'])->name('locations.delete');

Route::post('/dashboard/locations/update','App\Http\Controllers\LocationsController@storeOrUpdate')->middleware(['auth', 'verified'])->name('locations.update');

Route::post('/dashboard/locations/action','App\Http\Controllers\LocationsController@storeOrUpdate')->middleware(['auth', 'verified'])->name('locations.action');


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

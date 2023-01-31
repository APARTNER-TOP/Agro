<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocationsController as LocationsController;
use App\Models\Location as Location;

use Illuminate\Http\Request as Request;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    //             ->name('password.request');

    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    //             ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //             ->name('password.reset');

    // Route::post('reset-password', [NewPasswordController::class, 'store'])
    //             ->name('password.store');
});

Route::middleware('auth')->group(function () {
    // Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
    //             ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    //             ->middleware(['signed', 'throttle:6,1'])
    //             ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //             ->middleware('throttle:6,1')
    //             ->name('verification.send');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //             ->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    //             ->name('logout');
});


//! admin page
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function (Request $request) {
        // \App::setLocale('en');
        // dd($request);

        // $locations = Location::all();
        $locations = Location::select('id', 'type_id', 'company', 'address', 'lat', 'lon')->where('user_id' ,'=', Auth::user()->id)->get();

        // $locationsType = DB::table('locations_type')->get();
        $locationsType = Location::getTypes();

        return view('test', compact('locations', 'locationsType'));
        // return view('dashboard');
    })->name('dashboard');


    //! Admin locations page
    // Route::get('/dashboard/locations','App\Http\Controllers\LocationsController@index')->name('locations');
    // Route::get('register', [RegisterController::class, 'register']);
    // Route::get('register', [RegisterController::class, 'register'])->name('register');
    // Route::get('/dashboard/locations/map','App\Http\Controllers\LocationsController@map')->name('locations/map');

    $prefix = '/dashboard/locations/';

    Route::get($prefix .'search', [LocationsController::class, 'search']);

    Route::get($prefix .'map', [LocationsController::class, 'map']);
    Route::get($prefix .'map/{type_id}/{id}', [LocationsController::class, 'map']);

    Route::get($prefix .'create', function() {
        $locationsType = Location::getTypes();

        return view('locations.create', compact('locationsType'));
    })->name('locations.create');

    Route::get($prefix . 'edit/',[LocationsController::class, 'edit'])->name('locations.edit');

    // Route::get('/dashboard/locations/edit/{id}','App\Http\Controllers\LocationsController@edit')->name('locations.edit');

    Route::get($prefix .'delete',[LocationsController::class, 'delete']);

    Route::post($prefix .'update',[LocationsController::class, 'storeOrUpdate'])->name('locations.update');

    Route::post($prefix . 'action',[LocationsController::class, 'storeOrUpdate'])->name('locations.action');;
});

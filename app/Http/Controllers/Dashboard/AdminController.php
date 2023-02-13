<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Culture;
use App\Models\Offer;

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

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $request) {
        // \App::setLocale('en');
        // dd($request);

        //! Locations
        // $locations = Location::all();
        $locations = Location::select('id', 'type_id', 'company', 'address', 'lat', 'lon', 'status')->where('user_id' ,'=', Auth::user()->id)->get();
        // $locationsType = DB::table('locations_type')->get();
        $locationsType = Location::getTypes();

        //! Culture
        $cultureType = Culture::getTypes();

        //! Offer
        $offerType = Offer::getTypes();

        return view('dashboard.index', compact('locations', 'locationsType', 'cultureType', 'offerType'));
        // return view('dashboard');
    }
}

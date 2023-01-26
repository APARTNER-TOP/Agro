<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location as Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LocationsController extends Controller
{
    public function index(){

        $locations = Location::all();

        return view('locations.index',compact('locations'));
    }

    public function create(){
        return view('locations.create');
    }

    public function storeDevice(){

        $locations = new Location();

        $locations->name = request('name');
        // $locations->description = request('description');

        $locations->save();

        return redirect('/dashboard');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location as Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class LocationsController extends Controller
{
    public function index()
    {

        // $locations = Location::all();
        $locations = Location::select('*')->orderBy('id')->where('user_id', '=', Auth::user()->id)->get('id');

        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function storeLocation()
    {

        $locations = new Location();
        $locations->type_id = request('type_id');
        $locations->user_id = Auth::user()->id;
        $locations->company = Auth::user()->name;
        $locations->address = request('address');

        $locations->lat = request('lat') ?? 'lat';
        $locations->long = request('long') ?? 'long';
        // $locations->description = request('description');

        $insert = false;

        if ($locations->save()) {
            $insert = true;
        }

        return redirect('/dashboard?save=' . $insert . '&type_id=' . request('type_id'));
    }

    public function delete()
    {
        $id = request()->get('id');

        $success = false;

        if (DB::table('locations')->where(['user_id' => Auth::user()->id, 'id' => $id])->delete()) {
            $success = true;
        }

        return redirect('/dashboard');
    }
}

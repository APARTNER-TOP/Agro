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

    public function map() {
        $longitude = $latitude = $address = false;

        if (request('address') || request('submit_address')) {
            $address = request('address');
            $address = str_replace(" ", "+", $address);
        }

        if (request('latitude') && request('longitude') || request('submit_coordinates')) {
            $latitude = request('latitude');
            $longitude = request('longitude');
        }

        return view('locations.map', compact('address', 'latitude', 'longitude'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function storeOrUpdate()
    {
        $locations = new Location();

        if (request('id')) {
            $locations->id = request('id');
        }
        $locations->type_id = request('type_id');
        $locations->user_id = Auth::user()->id;
        $locations->company = Auth::user()->name;
        $locations->address = request('address');

        $locations->lat = request('lat') ?? 'lat112';
        $locations->long = request('long') ?? 'long';
        // $locations->description = request('description');

        if ($locations->id) {
            DB::table('locations')
            ->where('id', $locations->id)
                ->update(
                    [
                        'company' => $locations->company,
                        'address' => $locations->address
                    ]
                );

            $update = false;

            if ($update) {
                $update = true;
            }

            return redirect('/dashboard?save=' . $update . '&type_id=' . request('type_id'));
        } else {
            $insert = false;

            if ($locations->save()) {
                $insert = true;
            }

            return redirect('/dashboard?save=' . $insert . '&type_id=' . request('type_id'));
        }
    }

    public function edit() {
        $id = request()->get('id');
        $location = DB::table('locations')->where(['user_id' => Auth::user()->id, 'id' => $id])->first();

        return view('locations.edit', compact('location'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

use App\Models\Location;
use App\Models\Culture;

class LocationsController extends Controller
{
    public function index()
    {
        // $locations = Location::all();
        $locations = Location::select('id', 'type_id', 'company', 'address', 'lat', 'lon', 'status')->where('user_id' ,'=', Auth::user()->id)->get();

        return view('locations.index', compact('locations'));
    }

    public function search() {
        $longitude = $latitude = $address = false;

        if (request('address') || request('submit_address')) {
            $address = request('address');
            $address = str_replace(" ", "+", $address);
        }

        if (request('latitude') && request('longitude') || request('submit_coordinates')) {
            $latitude = request('latitude');
            $longitude = request('longitude');
        }

        return view('locations.search', compact('address', 'latitude', 'longitude'));
    }

    public function map($type_id, $id = false) {
        $coordinate = explode(',', $id);
        $lat = $lon = false;
        $user_id = Auth::user()->id;

        if (count($coordinate) == 2) {
            $lat = $coordinate[0];
            $lon = $coordinate[1];
        } else {
            $location = Location::getLocationGeo($id, $user_id);

            if (!$location) {
                return redirect('dashboard');
            }

            $lat = $location->lat;
            $lon = $location->lon;
        }

        return view('locations.map', compact('type_id', 'lat', 'lon'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'culture_type' => 'required',
            'offer_type' => 'required',
            'type_id' => 'required',
            'address' => 'required',
            'company' => 'required',
            'price' => 'required|integer',
            'weight' => 'required|max:100000',
            'lat' => 'required',
            'lon' => 'required',
        ]);

        // dd($validated);
        // exit;

        $culture_type = $request->input('culture_type');
        $offer_type = $request->input('offer_type');
        $price = $request->input('price');
        $weight = $request->input('weight');

        $request = $request->all();

        unset($request['culture_type']);
        unset($request['offer_type']);
        unset($request['price']);
        unset($request['weight']);

        // dd($request);

        $location = new Location();
        $location->fill($request);
        $location->user_id = Auth::user()->id;
        $location->save();

        echo $location->id;

        if($location->id) {
            Culture::create([
                'location_id' =>  $location->id,
                'culture_type' =>  $culture_type,
                'offer_type' =>  $offer_type,
                'price' =>  $price,
                'weight' =>  $weight,
            ]);

            return back()->with('success', 'Вітаємо! Локація успішно добавлена');
        }

        return back()->with('error', 'Помилка добавлення локації');
    }

    public function edit($id) {
        $location = DB::table('locations')->where(['user_id' => Auth::user()->id, 'id' => $id])->first();

        return view('locations.edit', compact('location', 'id'));
    }

    public function delete($id)
    {
        $success = false;

        if (DB::table('locations')->where(['user_id' => Auth::user()->id, 'id' => $id])->delete()) {
            $success = true;
        }

        return back()->with('success', 'Вітаємо! Локація успішно видаленна');
    }

    public function stop($id) {
        Location::setDisable($id);

        return back()->with('success', 'Вітаємо! Локація успішно деактивована');
    }
}

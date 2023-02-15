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
use App\Models\Offer;

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

    public function map($type_id = false, $id = false) {

        if(!$type_id && !$id) {
            //! Culture
            $cultureType = Culture::getTypes();

            //! Offer
            $offerType = Offer::getTypes();

            //! LocationType
            $locationsType = Location::getTypes();

            return view('locations.map_show', compact('cultureType', 'offerType', 'locationsType'));
        }

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

    public function store(Request $request)
    {
        $request->validate([
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

        $culture_type = $request->input('culture_type');
        $offer_type = $request->input('offer_type');
        $price = $request->input('price');
        $weight = $request->input('weight');

        $request = $request->all();

        unset($request['culture_type']);
        unset($request['offer_type']);
        unset($request['price']);
        unset($request['weight']);

        $location = new Location();
        $location->fill($request);
        $location->user_id = Auth::user()->id;
        $location->save();

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

    public function update(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'location_id' => 'required',
            'type_id' => 'required',
            'address' => 'required',
            'company' => 'required',
            'lat' => 'required',
            'lon' => 'required',
        ]);

        $request = $request->all();

        $id = $request['location_id'];
        $location = Location::find($id);
        $location->status = 1;

        $location->fill($request);
        $location->type_id = $request['type_id'];
        $location->user_id = Auth::user()->id;
        $location->save();

        if($location->id) {
            return redirect('/dashboard')->with('success', 'Вітаємо! Локацію успішно оновленно');
        }

        return back()->with('error', 'Помилка оновлення локації');
    }

    public function edit($id) {
        $location = DB::table('locations')->where(['user_id' => Auth::user()->id, 'id' => $id])->first();

        $locationsType = Location::getTypes();

        return view('locations.edit', compact('location', 'id', 'locationsType'));
    }

    public function delete($id)
    {
        if(Location::remove($id)) {
            return back()->with('success', 'Вітаємо! Локація успішно видаленна');
        }

        return back()->with('error', 'Помилка видалення локації, або вона вже була видалена');
    }

    public function stop($id) {
        Location::setDisable($id);

        return back()->with('success', 'Вітаємо! локація успішно деактивована');
    }

    public function add_culture($id) {
        $cultureType = Culture::getTypes();
        $offerType = Offer::getTypes();

        return view('locations.add_culture', compact('id', 'cultureType','offerType'));
    }

    public function save_culture(Request $request, $id) {
        $request->validate([
            'culture_type' => 'required|string|integer',
            'offer_type' => 'required|string|integer',
            'price' => 'required|string|integer',
            'weight' => 'required|max:100000',
        ]);

        if(Auth::user()->id != Location::find($id)->user_id) {
            return back()->with('error', 'Товар можна добавити тільки у власний обєкт. Даний обєкт не належить вам.');
        }

        if(Culture::createNew($id, $request)) {
            return redirect('dashboard')->with('success', 'Вітаємо! Товар успішно добавлений');
        }

        return back()->with('error', 'Помилка добавлення товару');
    }
}

@extends('layouts.dashboard.app')

@section('content')

<!-- <div class="container">
    {{ Auth::user() }}

    <br>
    {{ __("You're logged in!") }}
    <br>
</div> -->

<br>

<div class="choice">
    <div class="container-fluid">
        @include('components.alerts')

        <p>Вибір типу складу</p>
        <form method="POST" action="{{ route('locations.update') }}" class="location_save" id="location_save">
            @csrf

            <input type="text" class="d-none rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" name="location_id" required="required" placeholder="location id" value="{{ $location->id}}">

            <div class="row">
                <div class="col-auto">
                    <select name="type_id" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full select">
                        <option value="" {{ old('type_id') == '' || $location->type_id == '' ? 'selected' : '' }} disabled hidden1>Вибір локації</option>
                        @foreach($locationsType as $locationType)
                            <option value="{{ $locationType->id }}" {{ $location->type_id == $locationType->id ? 'selected' : '' }}>{{ $locationType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="autocomplete-container col-auto" id="address">
                    <!-- <input type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" name="address" required="required" placeholder="Населений пункт" value="{{ old('address') }}"> -->

                    <input type="text" class="d-none rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" name="lat" required="required" placeholder="lat" value="{{ $location->lat ?? old('lat') }}" id="map_lat">

                    <input type="text" class="d-none rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" name="lon" required="required" placeholder="lon" value="{{ $location->lon ?? old('lon') }}" id="map_lon">
                </div>

                <div class="col-auto">
                    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" type="text" name="company" required="required" autofocus="autofocus" placeholder="Назва об'єкту" oninvalid="invalidMsg(this);" value="{{ $location->company ?? old('company') }}">
                </div>

                <div class="col-auto">
                    <x-primary-button class="ml-4 btn btn-success" aria-disabled="true">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

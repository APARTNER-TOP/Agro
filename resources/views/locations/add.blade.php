@extends('layouts.dashboard.app')

@section('content')

<div class="choice">
    <div class="container-fluid">
        @include('components.alerts')

        <p>Вибір типу складу</p>
        <form method="POST" action="{{ route('locations.action') }}" class="location_save" id="location_save">
            @csrf
            <div class="row">

                <div class="col-auto">
                    <select id="culture_type" name="culture_type" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full select">
                        <option value="" {{ old('culture_type') == '' ? 'selected' : '' }} disabled hidden>Вибір товару</option>
                        @foreach($cultureType as $culture)
                            <option value="{{ $culture->id }}" {{ old('culture_type') == $culture->id ? 'selected' : '' }}>{{ $culture->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <select name="offer_type" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full select">
                        <option value="" {{ old('offer_type') == '' ? 'selected' : '' }} disabled hidden>Вибір типу</option>
                        @foreach($offerType as $offer)
                            <option value="{{ $offer->id }}" {{ old('offer_type') == $offer->id ? 'selected' : '' }}>
                                {{ $offer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <select name="type_id" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full select">
                        <option value="" {{ old('type_id') == '' ? 'selected' : '' }} disabled hidden>Вибір локації</option>
                        @foreach($locationsType as $locationType)
                            <option value="{{ $locationType->id }}" {{ old('type_id') == $locationType->id ? 'selected' : '' }}>{{ $locationType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="autocomplete-container col-auto" id="address">
                    <!-- <input type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" name="address" required="required" placeholder="Населений пункт" value="{{ old('address') }}"> -->

                    <input type="text" class="d-none rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" name="lat" required="required" placeholder="lat" value="{{ old('lat') }}" id="map_lat">

                    <input type="text" class="d-none rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" name="lon" required="required" placeholder="lon" value="{{ old('lon') }}" id="map_lon">
                </div>

                <div class="col-auto">
                    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" type="text" name="company" required="required" autofocus="autofocus" placeholder="Назва об'єкту" oninvalid="invalidMsg(this);" value="{{ old('company') }}">
                </div>

                <div class="col-auto">
                    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" type="text" name="price" required="required" autofocus="autofocus" placeholder="Ціна" oninvalid="invalidMsg(this);" value="{{ old('price') }}">
                </div>

                <div class="col-auto">
                    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control" type="text" name="weight" required="required" autofocus="autofocus" placeholder="Тон" oninvalid="invalidMsg(this);" value="{{ old('weight') }}">
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

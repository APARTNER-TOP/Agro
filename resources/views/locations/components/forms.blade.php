@if($id)
<style>
    .location_save {
        display: block !important;
    }
</style>
@endif

<div class="mt-4">
    <div>
        @if($id)
            <x-text-input class="id block mt-1 w-full" type="hidden" name="id" value="{{ $location->id }}" required />
        @endif

        <input name="type_id" type="hidden" id="type_id" class="type_id" @if($id) value="{{ $location->type_id }}" @endif required />

        <input name="lat" type="hidden" id="map_lat" class="map_lat" @if($id) value="{{ $location->lat }}" @endif required />
        <input name="lon" type="hidden" id="map_lon" class="map_lon" @if($id) value="{{ $location->lon }}" @endif required />
    </div>
    <div>
        <x-input-label for="name" :value="__('ВАШ')" class="storage" />
        <br>
        {{ Auth::user()->company_name }}
        <x-text-input id="name" class="block mt-1 w-full d-none" type="text" name="name" value="{{ Auth::user()->company_name }}" required autofocus oninvalid="invalidMsg(this);" />
        @if ($errors->has('company_name'))
            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
        @endif
    </div>
    <div>
        <x-input-label for="address" :value="__('Держава. Місто / Село / Вулиця')" />
        <br>
        <!-- <x-text-input id="address" class="autocomplete-container block mt-1 w-full" type="text" name="address" required autofocus oninvalid="invalidMsg(this);" /> -->

        <!-- <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 autocomplete-container block mt-1 w-full" id="address" type="text" name="address" required="required" autofocus="autofocus" oninvalid="invalidMsg(this);"> -->

        <div class="autocomplete-container" id="address"></div>

        @if ($errors->has('address'))
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        @endif
        <br>
        <a href="#" class="d-none" id="map_link" target="_blank">переглянути на карті</a>
    </div>
</div>

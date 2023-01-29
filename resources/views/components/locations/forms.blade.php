@if(request()->has('id'))
<style>
    .location_save {
        display: block !important;
    }
</style>
@endif

<style>
    .autocomplete-container {
        position: relative;
    }

    .autocomplete-container input {
        width: calc(100% - 43px);
        outline: none;

        border: 1px solid rgba(0, 0, 0, 0.2);
        padding: 10px;
        padding-right: 31px;
        font-size: 16px;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 10px 2px rgba(0, 0, 0, 0.1);
        border-top: none;
        z-index: 99;
        top: calc(100% + 2px);
        left: 0;
        right: 0;
        width: calc(100% - 43px);
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
    }

    .autocomplete-items div:hover {
        background-color: gray;
        color: #fff;
    }
</style>

<div class="mt-4">
    <div>
        @if(request()->has('id'))
            <x-text-input class="id block mt-1 w-full" type="hidden" name="id" value="{{ $location->id }}" required />
        @endif

        <input name="type_id" type="hidden" id="type_id" class="type_id" @if(request()->has('id')) value="{{ $location->type_id }}" @endif required />
    </div>
    <div>
        <x-input-label for="name" :value="__('ВАШ')" class="storage" />
        <br>
        {{ Auth::user()->name }}
        <x-text-input id="name" class="block mt-1 w-full d-none" type="text" name="name" value="{{ Auth::user()->name }}" required autofocus oninvalid="invalidMsg(this);" />
        @if ($errors->has('name'))
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
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

@extends('layouts.dashboard.app')

@section('content')
    <div class="container">
        <div class="row11">
            <div class="col-12">
                <form method="POST" action="{{ route('locations.update') }}" class="location_save d-none" id="location_save">
                    @csrf
                    @include ('locations.components.forms')

                    <div class="flex items-center justify-end mt-4">
                        <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Cancel') }}
                        </a> -->

                        <x-primary-button class="ml-4 btn btn-success"  aria-disabled="true">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
    <!-- <div class="container">
        {{ Auth::user() }}

        <br>
        {{ __("You're logged in!") }}
        <br>
    </div> -->

    <div class="container">
        <div class="row11">
            <div class="col-xl-6" id="location_create">
                <p>Оберіть Ваші Локації для торгівлі:</p>
                <ul id="location_type">
                    @foreach ($locationsType as $locationType)
                    <li data-id="{{ $locationType->id}}">
                        <img src="/img/locations/{{ $locationType->id}}.png" alt="img" width="20" height="20" /> {{ $locationType->name}}
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                <form method="POST" action="{{ route('locations.action') }}" class="location_save d-none" id="location_save">
                    @csrf
                    @include ('components.locations.forms')

                    <div class="flex items-center justify-end mt-4">
                        <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Cancel') }}
                        </a> -->

                        <x-primary-button class="ml-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <br>

    @if (count($locations) != 0)
    <div class="container">
        <h1>Ваші локації</h1>
        <p>
            {{ request()->has('save') == 1 ? __('Локацію збереженно') : '' }}

            @if(request()->has('save') == 1)
                <a href="/dashboard/#location_create">{{ __('Створити, ще одну') }}</a>
            @endif
        </p>
        @foreach ($locations as $location)
        <li class="mt-1 mb-1">
            <img src="/img/locations/{{ $location->type_id}}.png" alt="img" width="20" height="20" />
            {{ __('Компанія') }}: {{ $location->company }}
            {{ __('Адрес') }}: {{ $location->address }}
            <a href="/dashboard/locations/edit?id={{ $location->id }}" class="btn btn-success">{{ __('Edit') }}</a>
            <a href="/dashboard/locations/delete?id={{ $location->id }}" class="btn btn-danger">{{ __('Delete') }}</a>
        </li>
        @endforeach
    </div>
    @endif

    @include('components.script')
</body>
</html>

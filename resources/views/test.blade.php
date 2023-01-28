<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>

    {{ Auth::user() }}

    <br>
    <br>
    {{ __("You're logged in!") }}
    <br>

    <div class="container">
        <div class="row11">
            <div class="col-xl-6">
                <p>Оберіть Ваші Локації для торгівлі:</p>
                <ul id="location_type">
                    @foreach ($locationsType as $locationType)
                    <li data-id="{{ $locationType->id}}"> {{ $locationType->name}}
                        <p>(піктограма будинку)</p>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                <form method="POST" action="{{ route('locationsaction') }}" class="location_save d-none" id="location_save">
                    @csrf

                    <div class="mt-4">
                        <div>
                            <x-text-input id="type_id" class="type_id block mt-1 w-full" type="hidden" name="type_id" :value="old('name')" required autofocus oninvalid="invalidMsg(this);" />
                            @if ($errors->has('name'))
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            @endif
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('ВАШ')" class="storage" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus oninvalid="invalidMsg(this);" />
                            @if ($errors->has('name'))
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            @endif
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Держава. Місто / Село / Вулиця')" />
                            <br>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus oninvalid="invalidMsg(this);" />
                            @if ($errors->has('name'))
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            @endif
                        </div>

                    </div>

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


    <div class="container">
        <h1>Ваші локації</h1>

        @foreach ($locations as $location)
        <li> {{ $location}} </li>
        @endforeach
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $('#location_type li').on('click', function() {
            var type_id = $(this).data('id');
            var text = $(this).text();

            $('#location_save').removeClass('d-none');
            $('#location_save .storage').text(text);
            $('#location_save .type_id').val(type_id);

        });
    </script>
</body>

</html>

<!-- {{ __("You're logged in!") }} -->

<!-- \App::setLocale('en'); -->

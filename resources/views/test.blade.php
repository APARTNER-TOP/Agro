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
                <form method="POST" action="{{ route('locationsaction') }}" class="location_save d-none" id="location_save">
                    @csrf
                    <div class="mt-4">
                        <div>
                            <x-text-input id="type_id" class="type_id block mt-1 w-full" type="hidden" name="type_id" required autofocus oninvalid="invalidMsg(this);" />
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
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" required autofocus oninvalid="invalidMsg(this);" />
                            @if ($errors->has('address'))
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            @endif
                            <br>
                            <a href="">переглянути на карті</a>
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

    <br>

    <div class="container">
        <h1>Ваші локації</h1>

        <p>{{ request()->has('save') == 1 ? __('Локацію збереженно') : '' }}</p>

        @foreach ($locations as $location)
        <li class="mt-1">
            <img src="/img/locations/{{ $location->type_id}}.png" alt="img" width="20" height="20" />
            {{ __('Компанія') }}: {{ $location->company }}
            {{ __('Адрес') }}: {{ $location->address }}
            <a href="/dashboard/locations/delete?id={{ $location->id }}" class="btn btn-danger">{{ __('Delete') }}</a>
        </li>
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

    <!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initAutocomplete&libraries=places&v=weekly" defer></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initAutocomplete&libraries=places&v=weekly" defer></script> -->

    <script>
    /* The addressAutocomplete takes a container element (div) as a parameter */
        function addressAutocomplete(containerElement) {
            // create input element
            var inputElement = document.createElement("input");
            inputElement.setAttribute("type", "text");
            inputElement.setAttribute("placeholder", "Enter an address here");
            containerElement.appendChild(inputElement);

            /* Current autocomplete items data (GeoJSON.Feature) */
            var currentItems;

            /* Active request promise reject function. To be able to cancel the promise when a new request comes */
            var currentPromiseReject;

            /* Execute a function when someone writes in the text field: */
            inputElement.addEventListener("input", function(e) {
                var currentValue = this.value;

                /* Close any already open dropdown list */
                closeDropDownList();

                // Cancel previous request promise
                if (currentPromiseReject) {
                    currentPromiseReject({
                        canceled: true
                    });
                }

                /* Create a new promise and send geocoding request */
                var promise = new Promise((resolve, reject) => {
                    currentPromiseReject = reject;

                    var apiKey = "47f523a46b944b47862e39509a7833a9";
                    var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&limit=5&apiKey=${apiKey}`;

                    fetch(url)
                        .then(response => {
                            // check if the call was successful
                            if (response.ok) {
                                response.json().then(data => resolve(data));
                            } else {
                                response.json().then(data => reject(data));
                            }
                        });
                });

                promise.then((data) => {
                    currentItems = data.features;

                    /*create a DIV element that will contain the items (values):*/
                    var autocompleteItemsElement = document.createElement("div");
                    autocompleteItemsElement.setAttribute("class", "autocomplete-items");
                    containerElement.appendChild(autocompleteItemsElement);

                    /* For each item in the results */
                    data.features.forEach((feature, index) => {
                        /* Create a DIV element for each element: */
                        var itemElement = document.createElement("DIV");
                        /* Set formatted address as item value */
                        itemElement.innerHTML = feature.properties.formatted;
                        autocompleteItemsElement.appendChild(itemElement);
                    });
                }, (err) => {
                    if (!err.canceled) {
                        console.log(err);
                    }
                });
            });

            function closeDropDownList() {
                var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
                if (autocompleteItemsElement) {
                    containerElement.removeChild(autocompleteItemsElement);
                }
            }
        }

        addressAutocomplete(document.getElementById("address"));
    </script>

    @include('components.script')
</body>

</html>

<!-- {{ __("You're logged in!") }} -->

<!-- \App::setLocale('en'); -->

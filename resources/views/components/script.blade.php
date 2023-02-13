<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    var requiredMessage = "{{ __('contents.requiredMessage')}}";
    var typeMismatchMessage = "{{ __('contents.mismatchMessage')}}"

    function invalidMsg(inputField) {
        if (inputField.value === '') {
            inputField.setCustomValidity(requiredMessage);
        } else if (inputField.typeMismatch) {
            inputField.setCustomValidity(typeMismatchMessage);
        } else {
            inputField.setCustomValidity('');
        }
        return true;
    }
</script>


<script>
    //! address autocomplete
    function addressAutocomplete(containerElement) {
        var textInput = '{{ __("Enter an address here ") }}';
        var textInput = 'Населений пункт';

        var inputElement = document.createElement('input');
        inputElement.setAttribute('type', 'text');
        inputElement.setAttribute('name', 'address');
        inputElement.setAttribute('placeholder', textInput);
        inputElement.classList.add('rounded-md');
        inputElement.classList.add('shadow-sm');
        inputElement.classList.add('border-gray-300');
        inputElement.classList.add('focus:border-indigo-300');
        inputElement.classList.add('focus:ring');
        inputElement.classList.add('focus:ring-indigo-200');
        inputElement.classList.add('focus:ring-opacity-50');
        inputElement.classList.add('block');
        inputElement.classList.add('mt-1');
        inputElement.classList.add('w-full');
        inputElement.classList.add('form-control');
        inputElement.value = '{{ old('address') }}';

        containerElement.appendChild(inputElement);

        /* Current autocomplete items data (GeoJSON.Feature) */
        var currentItems;

        /* Active request promise reject function. To be able to cancel the promise when a new request comes */
        var currentPromiseReject;

        /* Execute a function when someone writes in the text field: */
        inputElement.addEventListener('input', function(e) {
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
                var apiKey = '{{ env('API_GEOAPIFY') }}' ? '{{ env('API_GEOAPIFY') }}' : 'b8e29e63c5ba427682d06de390d243b2';
                var limit = 5;
                var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&limit=${limit}&apiKey=${apiKey}`;

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

                var autocompleteItemsElement = document.createElement('div');
                autocompleteItemsElement.setAttribute('class', 'autocomplete-items');
                containerElement.appendChild(autocompleteItemsElement);

                /* For each item in the results */
                data.features.forEach((feature, index) => {
                    var itemElement = document.createElement('div');
                    /* Set formatted address as item value */
                    itemElement.innerHTML = feature.properties.formatted;

                    //! set coordinate on data
                    itemElement.setAttribute('data-lat', feature.properties.lat);
                    itemElement.setAttribute('data-lon', feature.properties.lon);

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

    addressAutocomplete(document.getElementById('address'));

    //! disable btn send form
    // $('#location_save').change(function() {
    $('#map_lat').val() == '' && $('#map_lon').val() == '' ? $('#location_save button').addClass('disabled') : $('#location_save button').removeClass('disabled');
    // });

    //! click .autocomplete-items div
    $('body').on('click', '.autocomplete-items div', function() {
        var address = $(this).text();
        $('#address input').val(address);
        $('.autocomplete-items').remove();

        var type_id = $('#type_id').val(); //! location_id
        var map_lat = $(this).data('lat');
        var map_lon = $(this).data('lon');

        $('#map_lat').val(map_lat);
        $('#map_lon').val(map_lon);

        //! fix show link
        $('#map_link').addClass('d-block').removeClass('d-none');

        $('#map_link').attr('href', '/dashboard/locations/map/' + type_id + '/' + map_lat + ',' + map_lon);

        $('#map_lat').val() == '' && $('#map_lon').val() == '' ? $('#location_save button').addClass('disabled') : $('#location_save button').removeClass('disabled');
    });

    //! click #address input
    $('#address input').on('input', function() {
        $('#map_link').addClass('d-block').removeClass('d-none');

        var address = $(this).val();
        // address = address.replaceAll(' ', '+');
        // address = address.replaceAll(',', '');
        // $('#map_link').attr('href', 'https://www.google.com/maps/place/' + address);

        var type_id = $('#type_id').val(); //! location_id
        var map_lat = $(this).data('lat');
        var map_lon = $(this).data('lon');

        $('#map_link').attr('href', '/dashboard/locations/map/' + type_id + '/' + map_lat + ',' + map_lon);

        // if ($('#address input').val().length <= 2) {
        //     $('#map_link').addClass('d-none');
        // }
        if ($('#address input').val().length <= 2 && !map_lat && !map_lon) {
            $('#map_link').addClass('d-none');
        }

        if (!address) {
            $('#map_lat').val('');
            $('#map_lon').val('');
        }

        //! fix after change input remove coordinate
        // $('#map_lat').val('');
        // $('#map_lon').val('');

        $('#map_link').addClass('d-none');

        $('#map_lat').val() == '' && $('#map_lon').val() == '' ? $('#location_save button').addClass('disabled') : $('#location_save button').removeClass('disabled');
    });

    @if(request()->has('id'))
    //! check if has id on link

    //! show link for current location_id
    // var type_id = "{{ $location->type_id }}";
    // var location_id = "{{ $location->id }}";
    // var map_lat =  "{{ $location->lat }}";
    // var map_lon =  "{{ $location->lon }}";

    // $('#map_link').addClass('d-block').removeClass('d-none');
    // $('#map_link').attr('href', '/dashboard/locations/map/' + type_id + '/' + map_lat + ',' + map_lon);

    //! set default address
    $('#address input').val('{{ $location->address }}');
    if ($('#address input').val().length <= 2) {
        $('#map_link').addClass('d-none');
    }
    @endif
</script>

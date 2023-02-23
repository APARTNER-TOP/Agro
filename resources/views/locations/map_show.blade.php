@extends('layouts.dashboard.app')

@section('content')

@vite(['resources/css/map.css'])
@vite(['resources/js/map.js'])

<div class="container-fluid">
    <div class="row">
        <div class="filter-wrapper col-3 vh-100">

            <!-- error -->
            <div class="errors alert alert-danger mt-2">
                <ul>
                    <!-- render error here -->
                </ul>
            </div>

            <div class="filter-select">
                <ul class="nft-item-categories">
                    @foreach($offerType as $offer)
                    <li class="nft-item-category-list">
                        <input type="radio" id="offer_type_{{ $offer->id }}" name="offer_type" value="{{ $offer->id }}">
                        <label class="col-auto" for="offer_type_{{ $offer->id }}">{{ $offer->name == 'Куплю' ? 'Купують' : 'Продають' }}</label>
                    </li>
                    @endforeach
                </ul>

                <select class="filter filter-culture filter-animal form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full select" name="culture_type">
                    <option value="" selected="" disabled="" hidden="">Вибір товару</option>
                    @foreach($cultureType as $culture)
                    <option value="{{ $culture->id }}">{{ $culture->name }}</option>
                    @endforeach
                </select>

                <select class="filter filter-culture filter-animal form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full select" name="type_id">
                    <option value="" selected="" disabled="" hidden="">Вибір обєкту</option>
                    @foreach($locationsType as $locationType)
                    <option value="{{ $locationType->id }}">{{ $locationType->name }}</option>
                    @endforeach
                </select>

                <!-- <select class="filter filter-drink">
                <option value="all">All</option>
                <option value="coca">coca</option>
                <option value="fanta">fanta</option>
            </select>

            <select class="filter filter-name">
                <option value="all">All</option>
                <option value="sandrine">sandrine</option>
                <option value="lea">lea</option>
                <option value="paul">paul</option>
            </select>

            <select class="filter filter-currency">
                <option value="all">All</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="UAH">UAH</option>
            </select> -->
            </div>

            <!-- <div id="searchMap">
            <h3>Search for a place
                <small>(Existing value are: cat, fish, dog, sandrine, lea, paul, fanta, coca.)</small>
            </h3>
            <input class="typeahead" type="text" placeholder="Search for...">
        </div>
        <div class="alert">There is no result for your current search</div>
        <button id="resetFilter"> Reset</button> -->

            <button class="btn btn-info mt-2" id="filter">Фільтрувати</button>

        </div>
        <div class="col-9 vh-100" id="map">
            <!-- render map -->
        </div>
    </div>
</div>

<div class="copyright">
    <a href="https://apartner.top" title="Development of sites on laravel, prestashop, wordpress and their support" class="link" target="_blank" rel="dofollow">
        APARTNER.TOP
        <strong class="description">Development of sites on Laravel, PrestaShop, Wordpress and their support</strong>
    </a>
</div>

<script>
    var lat = "49.350803461839874";
    var lon = "30.314206958382304";
</script>
<script>
    // function initMap() {
    //     var center = new google.maps.LatLng(lat, lon);
    //     var map = new google.maps.Map(document.getElementById('map'), {
    //         center: center, // Ukraine
    //         zoom: 7
    //     });

    //     // const svgMarker = {
    //     //     path: "M-1.547 12l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM0 0q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
    //     //     fillColor: "blue",
    //     //     fillOpacity: 0.6,
    //     //     strokeWeight: 0,
    //     //     rotation: 0,
    //     //     scale: 2,
    //     //     anchor: new google.maps.Point(0, 20),
    //     // };

    // }

    // window.initMap = initMap;


    // $(document).ready(function () {
    //     $('#map').bind('mousewheel', function (e) {
    //         if (e.originalEvent.wheelDelta / 120 > 0) {
    //             console.log('scrolling up !');

    //             $('#map').scroll();
    //         }
    //         else {
    //             console.log('scrolling down !');
    //         }
    //     });
    // });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('API_GOOGLEMAP') }}&callback=initMap&v=weekly" defer></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

<!-- maps -->
<script>
const json = [];

@foreach($userSellCultures as $culture)
    json.push({
        "title1": "{{ $culture->name }}",
        "animal": "fish",
        "drink": "coca",
        "id": "{{ $culture->type - 1 }}",
        "type": "{{ $culture->slug }}",
        "name": "paul",
        "currency": "USD",
        "geometry": {
            "type": "Point",
            "coordinates": [
                "{{ $culture->lat }}",
                "{{ $culture->lon }}"
            ]
        }
    });
@endforeach

console.log(json);

//! icons
const iconBase =
    "https://developers.google.com/maps/documentation/javascript/examples/full/images/";

// const icons = {
//     'potato': {
//         icon: iconBase + "parking_lot_maps.png",
//     },
// };

const icons = [];
@foreach($cultureType as $type)
    icons.push({
        '{{ $type->slug }}': {
            icon: '{{ $type->img }}',
        }
    });
@endforeach
// console.log(icons);

</script>
<script>
    // @TODO refactor
    // TODO make filters work together

    // var json = [
    //     {
    //         "title": "Store A",
    //         "animal": "fish",
    //         "drink": "coca",
    //         "type": "potato",
    //         "name": "paul",
    //         "currency": "USD",
    //         "geometry": {
    //             "type": "Point",
    //             "coordinates": [
    //                 0.48339843749999994,
    //                 46.89023157359399
    //             ]
    //         }
    //     },
    //     {
    //         "title": "Store A",
    //         "animal": "fish",
    //         "drink": "coca",
    //         "type": "parking",
    //         "name": "paul",
    //         "currency": "EUR",
    //         "geometry": {
    //             "type": "Point",
    //             "coordinates": [
    //                 0.48339843749999994,
    //                 46.89023157359399
    //             ]
    //         }
    //     }
    // ]
    var jsonStringify = JSON.stringify(json)
    var jsonParse = JSON.parse(jsonStringify);

    var markers = [];
    var markerCluster;
    var searchInput = jQuery('#searchMap input');
    var filterSelect = jQuery('.filter');
    var resetButton = jQuery('#resetFilter');

    var filterResults = [];
    var count_json = json.length;

    for (var i = 0; i < count_json; i++) {
        var filters = json[i];
        var filterAnimal = filters.animal;
        var filterDrink = filters.drink;
        var filterName = filters.name;
        var filterCurrency = filters.currency;

        filterResults.push(filterAnimal, filterDrink, filterName, filterCurrency);
    }

    var filterStringify = JSON.stringify(filterResults)
    var filterParse = JSON.parse(filterStringify);


    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: new google.maps.LatLng(lat, lon)
        });

        for (var i = 0; i < json.length; i++) {
            setMarkers(json[i], map);
        }

        //! cluster
        // markerCluster = new MarkerClusterer(map, markers, { ignoreHiddenMarkers: true, imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });
    }

    function setMarkers(marker, map) {
        var markerMap = marker.geometry.coordinates;
        var title = marker.title;
        var animal = marker.animal;
        var drink = marker.drink;
        var name = marker.name;
        var currency = marker.currency;
        var pos = new google.maps.LatLng(markerMap[0], markerMap[1]);
        var content = marker;
        var type = marker.type;
        var id = marker.id;

        markerMap = new google.maps.Marker({
            position: pos,
            title: title,
            animal: animal,
            drink: drink,
            name: name,
            currency: currency,
            map: map,
            icon: icons[id][type].icon,

            // clickable: true,
            // title: 'spot',
            // shape: [0, 0, 0, 0],
        });

        // console.log(markerMap);

        // var CustomMarker;
        // markerMap = CustomMarker.prototype.draw = function () {
        //     var me = this;
        //     // Check if the div has been created.
        //     var div = this.div_;
        //     var title = this.title_;
        //     var latlng = this.latlng_;
        //     // var cursor = this.cursor_;
        //     var severitycheck = this.title_;
        //     var eventT = this.localeventTitle;
        //     //alert(eventT);
        //     if (!div) {
        //         // Create a overlay text DIV
        //         div = this.div_ = document.createElement('DIV');
        //         div.id = this.id_;
        //         div.title = title;
        //         div.latlng = latlng;
        //         div.className = 'ring_small_green';
        //     }
        // }


        markers.push(markerMap);

        var infowindow = new google.maps.InfoWindow({
            content: title + '<br/>' + animal + '<br/>' + drink + '<br/>' + name + '<br>' + currency + '<img src="2.png" alt="111" class="click" data-id="111" /><br><img src="1.png" alt="111" class="click" data-id="222" />',
        });

        // Marker click listener

        // 'click'
        // 'dblclick'
        // 'mouseup'
        // 'mousedown'
        // 'mouseover'
        // 'mouseout'

        //! click and show
        // google.maps.event.addListener(markerMap, 'click', (function (marker1, content) {
        //     return function () {
        //         infowindow.setContent(content);
        //         infowindow.open(map, markerMap);
        //         // map.panTo(this.getPosition());
        //         // map.setZoom(15);
        //     }
        // })(markerMap, content));
    }

    function clusterManager(array) {
        markerCluster.clearMarkers();
        if (!array.length) {
            jQuery('.alert').addClass('is-visible');
        } else {
            jQuery('.alert').removeClass('is-visible');
            for (i = 0; i < array.length; i++) {
                markerCluster.addMarker(array[i]);
            }
        }
    }

    //@todo add inputsearch
    function newFilter(filterType1 = 'all', filterType2 = 'all', filterType3 = 'all', filterType4 = 'all') {
        var criteria = [
            { Field: "animal", Values: [filterType1] },
            { Field: "drink", Values: [filterType2] },
            { Field: "name", Values: [filterType3] },
            { Field: "currency", Values: [filterType4] },
            // { Field: ["animal", "name", "drink"], Values: [filterTyped] }
        ];

        var filtered = markers.flexFilter(criteria);
        clusterManager(filtered);
    }

    Array.prototype.flexFilter = function (info) {
        // Set our variables
        var matchesFilter, matches = [], count;

        // Helper function to loop through the filter criteria to find matching values
        // Each filter criteria is treated as "AND". So each item must match all the filter criteria to be considered a match.
        // Multiple filter values in a filter field are treated as "OR" i.e. ["Blue", "Green"] will yield items matching a value of Blue OR Green.
        matchesFilter = function (item) {
            count = 0
            for (var n = 0; n < info.length; n++) {
                if (info[n]["Values"].indexOf(item[info[n]["Field"]]) > -1) {
                    count++;
                }
                //if value = all, return all item
                else if (info[n]["Values"] == "all") {
                    count++;
                }
            }
            // If TRUE, then the current item in the array meets all the filter criteria
            return count == info.length;
        }

        // Loop through each item in the array
        for (var i = 0; i < this.length; i++) {
            // Determine if the current item matches the filter criteria
            if (matchesFilter(this[i])) {
                matches.push(this[i]);
            }
        }

        // Give us a new array containing the objects matching the filter criteria
        return matches;
    }



    jQuery(document).ready(function () {
        jQuery('.filter-animal').on('change', function () {
            var filter2 = jQuery('.filter-drink').val();
            var filter3 = jQuery('.filter-name').val();
            var filter4 = jQuery('.filter-currency').val();
            newFilter(jQuery(this).val(), filter2, filter3, filter4);
        });

        jQuery('.filter-drink').on('change', function () {
            var filter1 = jQuery('.filter-animal').val();
            var filter3 = jQuery('.filter-name').val();
            var filter4 = jQuery('.filter-currency').val();
            newFilter(filter1, jQuery(this).val(), filter3, filter4);
        });

        jQuery('.filter-name').on('change', function () {
            var filter1 = jQuery('.filter-animal').val();
            var filter2 = jQuery('.filter-drink').val();
            var filter4 = jQuery('.filter-currency').val();
            newFilter(filter1, filter2, jQuery(this).val(), filter4);
        });

        jQuery('.filter-currency').on('change', function () {
            var filter1 = jQuery('.filter-animal').val();
            var filter2 = jQuery('.filter-drink').val();
            var filter3 = jQuery('.filter-name').val();
            newFilter(filter1, filter2, filter3, jQuery(this).val());
        });

        searchInput.on('keyup', function () {
            var searchTyped = $(this).val();
            var arr = [];
            if (searchTyped.length > 0) {
                jsonParse.filter(function () {
                    for (i = 0; i < json.length; i++) {
                        marker = markers[i];
                        var markerFilter = [];
                        var filterAnimal = marker.animal;
                        var filterDrink = marker.drink;
                        var filterName = marker.name;
                        var filterCurrency = marker.currency;

                        markerFilter.push(filterAnimal, filterDrink, filterName, filterV);
                        var markerFilterStringify = JSON.stringify(markerFilter);
                        if (markerFilterStringify.indexOf(searchTyped) >= 0) {
                            arr.push(marker);
                        } else {
                            console.log('dont fit requirement')
                        }
                    }
                });
                clusterManager(arr);
            } else {
                newFilter();
            }
        });

        resetButton.on('click', function () {
            searchInput.val('');
            filterSelect.val('all');
            newFilter();
        });

        //delete all duplicated value from the previous array
        var uniqueValue = [];
        jQuery.each(filterResults, function (i, el) {
            if (jQuery.inArray(el, uniqueValue) === -1) {
                uniqueValue.push(el);
            }
        });

        var substringMatcher = function (strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;
                matches = [];

                substrRegex = new RegExp(q, 'i');

                jQuery.each(strs, function (i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });
                cb(matches);
            };
        };
        searchInput.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
            {
                name: 'customFilter',
                source: substringMatcher(uniqueValue)
            });

    });

    $ = jQuery;
    $(window).on('load', function () {
        initMap();
    });


    // //! custom code

    // $('body').on('click', '.click', function () {
    //     alert($(this).data('id'));
    // });

    // setInterval(() => {
    //     document.querySelectorAll('[role="button"]').forEach(function (el) {
    //         el.classList.add('active');
    //         $('.active:not(".afterClick")').trigger("click");
    //         $('.active').addClass('afterClick');
    //     });
    // }, 1000);
</script>


<!-- copyright -->
<script>
    if ($('.copyright .link').attr('href') != 'https://apartner.top' || $('.copyright .link').is(':hidden') || $('.copyright .link').css('opacity') == 0 || $('.copyright').is(':hidden') || $('.copyright').css('opacity') == 0) {
        $('.copyright').remove();

        $('body').append(`
            <div class="copyright">
                <a href="https://apartner.top" title="Development of sites on laravel, prestashop, wordpress and their support" class="link" target="_blank" rel="dofollow">
                        APARTNER.TOP
                    <strong class="description">Development of sites on Laravel, PrestaShop, Wordpress and their support</strong>
                </a>
            </div>
        `);
    }
</script>

<!-- filter -->
<script>
$(function () {
    $('#filter').click(function (e) {
        e.preventDefault();
        var errors = [];
        hideError();

        if( $('input[name="offer_type"]').is(':checked') == false) {
            errors.push('Оберіть тип пропозиції');
        }

        if($('select[name="culture_type"] option:selected').val() === "") {
            errors.push('Оберіть тип культури');
        }

        $('select[name="culture_type]').change(function(){
            var selectedCountry = $(this).children("option:selected").val();
            alert("You have selected the country - " + selectedCountry);
        });

        if(errors.length != 0) {
            errors.forEach(showError);
        }
    });
});

function showError(item, index) {
    if(!index) {
        $('.errors').show();
    }

    $('.errors ul').append(`<li class="error">${item}</li>`);
}

function hideError() {
    $('.error').remove();
    $('.errors').hide();
}

</script>

@endsection

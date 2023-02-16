@extends('layouts.dashboard.app')

@section('content')

<style>
    /* copyright */
    .copyright {
        position: absolute;
        left: 10px;
        left: 26%;
        bottom: 40px;
    }

    .copyright .link {
        display: block;
        padding: 10px;
        font-size: 14px;
        font-weight: 600;
        font-family: sans-serif;
        text-decoration: none;
        position: relative;
        cursor: pointer;
        background-color: yellow;
        border-radius: 3px;
        transition: border-radius 1.5s linear;
        color: blue;
    }

    .copyright .link .description {
        display: block;
        position: absolute;
        top: -90px;
        top: -110px;
        left: 0;
        font-size: 12px;
        font-weight: 500;
        padding: 10px;
        background-color: blue;
        color: #fff;
        border-radius: 3px 3px 0 0;
        transition: all 1.5s linear;
        opacity: 0;
    }

    .copyright .link:hover {
        border-radius: 0 0 3px 3px;
        transition: border-radius 1.5s linear;
    }

    .copyright .link:hover .description {
        transition: all 1.5s linear;
        opacity: 1;
    }
</style>

<style>
    /* #map {
        height: 100vh;
        width: 80vw;
    } */

    /* .wrapper {
        align-items: center;
        display: flex;
    } */

    /* .wrapper .filter-wrapper {
        display: flex;
        flex-direction: column;
        margin-right: 50px;
    } */

    h3 small {
        display: block;
        font-size: 12px;
    }

    .alert {
        color: red;
        display: none;
        font-size: 16px;
        font-weight: bold;
    }

    .alert.is-visible {
        display: block;
    }

    .tt-menu {
        border: 1px solid transparent;
        border-color: transparent lightgrey lightgrey lightgrey;
        background: white;
        width: 100%;
    }

    .tt-menu .tt-dataset .tt-suggestion {
        color: darkgrey;
        cursor: pointer;
        padding: 1rem;
        user-select: none;
    }

    .tt-menu .tt-dataset .tt-suggestion.tt-cursor:hover {
        background: lightgrey;
        color: white;
    }

    .tt-menu .tt-dataset .tt-suggestion.tt-cursor+.tt-suggestion {
        border-top: 1px solid lightgrey;
    }

    /* my work */

    .gm-style-iw.gm-style-iw-c {
        width: 150px;
        height: 150px;
        background-color: transparent;
        top: 100px;
        box-shadow: none !important;
    }

    .gm-style-iw.gm-style-iw-c .gm-style-iw-d {
        height: 100%;
        overflow: visible !important;
    }

    .gm-style-iw.gm-style-iw-c .gm-style-iw-d div {
        height: 100%;
    }

    .gm-style-iw-tc {
        display: none;
    }

    .gm-ui-hover-effect {
        display: none !important;
    }

    /* btn with checkbox */
    .nft-item-category-list input[type=radio]+label {
        margin: 0.2em 0;
        cursor: pointer;
        padding: 0.2em 0;
        text-align: left;
        font: normal normal normal 14px/14px Poppins;
        color: #8E8E93;
        text-transform: uppercase;
    }

    .nft-item-category-list input[type=radio] {
        display: none;
    }

    .nft-item-category-list input[type=radio]+label:before {
        content: "✓";
        display: none;
        width: 1em;
        height: 1em;
        padding-left: 0.1em;
        padding-bottom: 0.10em;
        margin-right: 0.5em;
        vertical-align: bottom;
        color: transparent;
        transition: .2s;
        color: #000;
        border-radius: 100%;
        background-color: #8E8E93;
    }

    .nft-item-category-list input[type=radio]+label:active:before {
        transform: scale(0);
        color: #000;
    }

    .nft-item-category-list input[type=radio]:checked+label:before {
        background-color: MediumSeaGreen;
        border-color: MediumSeaGreen;
        color: #000;
    }

    .nft-item-category-list input[type=radio]:disabled+label:before {
        transform: scale(1);
        border-color: #aaa;
    }

    .nft-item-category-list input[type=radio]:checked:disabled+label:before {
        transform: scale(1);
        background-color: #bfb;
        border-color: #bfb;
    }

    .nft-item-category-list input[type=radio]:checked+label {
        color: #30D158;
        transition: all .2s linear;
    }

    ul.nft-item-categories {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 15px;
        align-items: center;
    }

    li.nft-item-category-list label {
        background: #2C2C2E 0% 0% no-repeat padding-box;
        border-radius: 5px;
        width: 220px;
        height: 41px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    li.nft-item-category-list {
        list-style: none;
    }
</style>

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
    function initMap() {
        const center = new google.maps.LatLng(lat, lon);
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 7,
            center: center,
        });
        const svgMarker = {
            path: "M-1.547 12l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM0 0q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
            fillColor: "blue",
            fillOpacity: 0.6,
            strokeWeight: 0,
            rotation: 0,
            scale: 2,
            anchor: new google.maps.Point(0, 20),
        };
    }

    window.initMap = initMap;

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

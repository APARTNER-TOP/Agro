<html>

<head>
    <title>Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* map */
        #map {
            height: 100%;
        }

        /* copyright */
        .copyright {
            position: absolute;
            left: 10px;
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
</head>

<body>

    <script>
        var lat = "{{$lat}}";
        var lon = "{{$lon}}";
    </script>
    <script>
        function initMap() {
            const center = new google.maps.LatLng(lat, lon);
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 9,
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

            new google.maps.Marker({
                position: map.getCenter(),
                icon: '/img/locations/small/{{$type_id}}.png',
                map: map,
                // title: 'title',
                // ariaLabel: "title",
            });
        }

        window.initMap = initMap;
    </script>
    </head>

    <body>
        <div id="map"></div>

        <div class="copyright">
            <a href="https://apartner.top" title="Development of sites on laravel, prestashop, wordpress and their support" class="link" target="_blank" rel="dofollow">
                APARTNER.TOP
                <strong class="description">Development of sites on Laravel, PrestaShop, Wordpress and their support</strong>
            </a>
        </div>

        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAey5wHsk6WTK4x3cpXJnyfpKmm8nQ8Dxs&callback=initMap&v=weekly" defer></script> -->
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('API_GOOGLEMAP') }}&callback=initMap&v=weekly" defer></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <script>
            if($('.copyright .link').attr('href') != 'https://apartner.top' || $('.copyright .link').is(':hidden') || $('.copyright .link').css('opacity') == 0 || $('.copyright').is(':hidden') || $('.copyright').css('opacity') == 0) {
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
    </body>

</html>

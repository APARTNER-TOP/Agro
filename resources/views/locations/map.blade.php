


<html>

<head>
    <title></title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>
        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <script>
        var lat = {{ $lat }};
        var lon = {{ $lon }};
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
                icon: 'http://agro.localhost/img/locations/small/{{$type_id}}.png',
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
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=weekly" defer></script>
</body>

</html>

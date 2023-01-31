<!--

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











    <div class="container">
        <div class="col-md-6">
            <div id="my-map"></div>
        </div>
    </div>

    <link href="https://unpkg.com/maplibre-gl@1.15.2/dist/maplibre-gl.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #my-map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

        .airport {
            height: 69px;
            width: 47px;
            background-image: url(https://api.geoapify.com/v1/icon/?type=awesome&color=%2372a2d4&scaleFactor=2&size=x-large&icon=plane-departure&apiKey=6dc7fb95a3b246cfa0f3bcef5ce9ed9a);
            background-size: contain;
            cursor: pointer;
        }
    </style>

    <script src="https://unpkg.com/maplibre-gl@1.15.2/dist/maplibre-gl.js"></script>



    <script>
        // The API Key provided is restricted to JSFiddle website
        // Get your own API Key on https://myprojects.geoapify.com
        var myAPIKey = "b8e29e63c5ba427682d06de390d243b2";

        var center = {
            // Zürich
            lat: 47.376570,
            lon: 8.541208
        }

        var map = new maplibregl.Map({
            center: [center.lon, center.lat],
            zoom: 9,
            container: 'my-map',
            style: `https://maps.geoapify.com/v1/styles/positron/style.json?apiKey=${myAPIKey}`,
        });
        map.addControl(new maplibregl.NavigationControl());

        // Zürich Airport, we use https://api.geoapify.com/v1/icon/?type=awesome&color=%2372a2d4&size=x-large&icon=plane-departure&apiKey=6dc7fb95a3b246cfa0f3bcef5ce9ed9a icon, icon size: 47 x 69px, shadow adds: 6px
        // lat: 47.46101649104483, lon: 8.551922366826949
        var airportIcon = document.createElement('div');
        airportIcon.classList.add("airport");

        var airportPopup = new maplibregl.Popup({
                anchor: 'bottom',
                offset: [0, -64] // height - shadow
            })
            .setText('Zürich Airport');

        var airport = new maplibregl.Marker(airportIcon, {
                anchor: 'bottom',
                offset: [0, 6]
            })
            .setLngLat([8.551922366826949, 47.46101649104483])
            .setPopup(airportPopup)
            .addTo(map);

        // Zürich Main train station, we use https://api.geoapify.com/v1/icon/?type=awesome&color=%23e68d6f&size=large&icon=train&iconSize=large&apiKey=6dc7fb95a3b246cfa0f3bcef5ce9ed9a icon, icon size: 38 x 55px, shadow adds: 5px
        // lat: 47.378100800080745, lon: 8.5393635
        var trainStationIcon = document.createElement('div');
        trainStationIcon.style.width = '55px';
        trainStationIcon.style.height = '55px';
        // Explicitly set scaleFactor=2 in the call
        // and backgroundSize=contain to get better
        // Marker Icon quality with MapLibre GL
        trainStationIcon.style.backgroundSize = "cover";
        // trainStationIcon.style.backgroundImage = "url(https://api.geoapify.com/v1/icon/?type=awesome&color=%23e68d6f&size=large&icon=train&iconSize=large&scaleFactor=2&apiKey=b8e29e63c5ba427682d06de390d243b2)";
        trainStationIcon.style.backgroundImage = "url(http://agro.localhost/img/locations/2.png)";


        trainStationIcon.style.cursor = "pointer";

        var trainStationPopup = new maplibregl.Popup({
                anchor: 'bottom',
                offset: [0, -50]
            }).setLngLat([8.5393635, 47.378100800080745])
            .setText('Zürich Main train station');

        var trainStation = new maplibregl.Marker(trainStationIcon, {
                anchor: 'bottom',
                offset: [0, 5]
            })
            .setLngLat([8.5393635, 47.378100800080745])
            .setPopup(trainStationPopup)
            .addTo(map);

        trainStationIcon.onclick = (event) => {
            // you can add custom logic here. For example, modify popup.
            trainStationPopup.setHTML("<h3>I'm clicked!</h3>");
        }

        trainStationIcon.onmouseenter = () => trainStation.togglePopup();
        trainStationIcon.onmouseleave = () => trainStation.togglePopup();
    </script>
</body>

</html> -->

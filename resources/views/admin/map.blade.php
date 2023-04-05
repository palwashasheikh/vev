<!DOCTYPE html>
<html>
    <head>
        <title>Map Search</title>
        <style>
            #map_canvas {
                height: 100%;
            }

            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <input type="text" id="address" value="karachi ,Pakistan" placeholder="Input Address"/>
        <select id="radius_km">
            <option value=1>1km</option>
            <option value=2>2km</option>
            <option value=5>5km</option>
            <option value=30>30km</option>
        </select>
        <button onClick="showCloseLocations()" class="btn btn-primary">Show Locations In Radius</button>
        <div id="map_canvas"></div>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTYF-ukbLcUQgTx9puVo5UlvjZ1rtFoqo&callback=initialize&libraries=geometry,places"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/map_script2.js')}}"></script>
    </body>
</html>

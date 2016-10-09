@extends('layouts.master')
@section('body')
    <section class="map">
        <div id="map" style="height: 600px"></div>
            <script>
      
 // initialize the map
   var map = L.map('map').setView([48.56, 33.88], 6);

        // load a tile layer
        // L.tileLayer('http://tiles.mapc.org/basemap/{z}/{x}/{y}.png',
        //   {
        //     attribution: 'Tiles by <a href="http://mapc.org">MAPC</a>, Data by <a href="http://mass.gov/mgis">MassGIS</a>',
        //     maxZoom: 17,
        //     minZoom: 2
        //   }).addTo(map);
      L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a rel="nofollow" href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);


        var circle = L.circle([41.508, -70.11], {
          color: 'red',
          fillColor: '#f03',
          fillOpacity: 0.5,
          radius: 2500
      }).addTo(map);

       // create control and add to map
var lc = L.control.locate().addTo(map);

// request location update and set location
lc.start();

function onAccuratePositionProgress (e) {
    console.log(e.accuracy);
    console.log(e.latlng);
}

function onAccuratePositionFound (e) {
    console.log(e.accuracy);
    console.log(e.latlng);
}

function onAccuratePositionError (e) {
    console.log(e.message)
}

map.on('accuratepositionprogress', onAccuratePositionProgress);
map.on('accuratepositionfound', onAccuratePositionFound);
map.on('accuratepositionerror', onAccuratePositionError);

map.findAccuratePosition({
    maxWait: 15000, // defaults to 10000
    desiredAccuracy: 20 // defaults to 20
});
            </script>
    <!--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKd8BZXjia7yGFtwcmJv91AuaCXTPVEvw&signed_in=true&callback=initMap"
                async defer>
            </script> -->
  </section>
@stop
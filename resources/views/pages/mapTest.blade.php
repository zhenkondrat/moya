@extends('layouts.master')
@section('body')
    <section class="map">

        <div id="map" style="height: 600px"></div>

            <script>

                 var map, newMarker, markerLocation;     
                 // initialize the map
                 $(function(){
                            map = L.map('map').setView([48.56, 33.88], 6);

                          L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                              attribution: '&copy; <a rel="nofollow" href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                          }).addTo(map);

                /*
                var map = L.map('map').setView([34.05, -118.25], 11);
                ATTR = '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                  '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> | ' +
                  '&copy; <a href="http://cartodb.com/attributions">CartoDB</a>';
                CDB_URL = 'http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png';
                L.tileLayer(CDB_URL, {
                  attribution: ATTR
                }).addTo(map);

                */



var markerCluster = new L.MarkerClusterGroup({
  maxClusterRadius: 60,
  disableClusteringAtZoom: 10,
  spiderfyOnMaxZoom: false
});


var collect  = <?php echo json_encode($json, JSON_FORCE_OBJECT) ?>;
//load data from controller
              for (var i in collect) {
                var marker = L.marker(
                              L.latLng(collect[i].lat, collect[i].lng), {
                                title: collect[i].adress
                              }
                            );
                  marker.bindPopup("<b>" + collect[i].adress + "</b>").openPopup();
                  //marker.addTo(map);
                  markerCluster.addLayer(marker);
              }

  map.addLayer(markerCluster);
// markerCluster.addTo(map);

//draw circle
  // var circle = L.circle([41.508, -70.11], {
  //     color: 'red',
  //     fillColor: '#f03',
  //     fillOpacity: 0.5,
  //     radius: 2500
  // }).addTo(map);

 // create control and add to map
var lc = L.control.locate().addTo(map);

// request location update and set location
lc.start();

                  //    var marker = L.marker(
                  //             L.latLng(47.23, 38.02), {
                  //               title: "one",
                  //               draggable: true
                  //             }
                  //           );
                  //     marker.on('drag', function(e) {
                  //           $('#latlng').val(e.latlng);
                  //           });
                  // marker.bindPopup("<b>Hello</b>").openPopup();
                  // marker.addTo(map);

                    map.on('accuratepositionprogress', onAccuratePositionProgress);
                    map.on('accuratepositionfound', onAccuratePositionFound);
                    map.on('accuratepositionerror', onAccuratePositionError);
                    //map.on('click', addMarker);

                    map.findAccuratePosition({
                        maxWait: 15000, // defaults to 10000
                        desiredAccuracy: 20 // defaults to 20
                    });
                     
                        
                    
                });

                    // function addMarker(e){
                    // // Add marker to map at click location; add popup window
                    // //var newMarker = new L.marker(e.latlng);
                    // //alert('0');
                    //     var pos = e.latlng;
                            
                    //         var marker = L.marker(
                    //           pos, {
                    //             draggable: true
                    //           }
                    //         );
                    //         marker.on('drag', function(e) {

                    //          // alert('1');
                    //         });
                    //         marker.on('dragstart', function(e) {
                    //         //  alert('2');
                    //           map.off('click', addMarker);
                    //         });
                    //         marker.on('dragend', function(e) {
                    //          // alert('4');
                    //           setTimeout(function() {
                    //             map.on('click', addMarker);
                    //           }, 10);
                    //         });
                    //         marker.addTo(map);
                    // //newMarker.addTo(map);

                    //}
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


            </script>
    <!--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKd8BZXjia7yGFtwcmJv91AuaCXTPVEvw&signed_in=true&callback=initMap"
                async defer>
            </script> -->
  </section>
@stop
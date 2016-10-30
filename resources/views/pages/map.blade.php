@extends('layouts.master')
@section('body')
    <section class="map">
        <div id="sidebar">
        
          <h2>Магазины</h2>
          @foreach ($json as $shop)   
            <div class="comment-text">
              <div class="row">
                <div class="col-md-5">
                  <img src="{{ URL::to('/')}}/{{$shop->sale[0]['logo']}}" width="100%" >
                </div>
                <div class="col-md-7">
                  {{$shop->sale[0]['name']}}
                </div>
              </div>
              <div class="row">
                 {{$shop->adress}}
              </div>
              <div class="row">
                {{--strip_tags(ucfirst(trans($shop->work_graph)))--}}
                {!!$shop->work_graph!!}
              </div>
              
              
            </div>
          @endforeach
        </div>

        <div id="map" style="height: 600px"></div>

            <script>

                 var map, newMarker, markerLocation;     
                 // initialize the map
                 $(function(){
                            map = L.map('map').setView([48.56, 33.88], 6);

                          L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                              attribution: '&copy; <a rel="nofollow" href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                          }).addTo(map);

                          var sidebar = L.control.sidebar('sidebar', {
                              closeButton: false,
                              position: 'left'
                          });

                          map.addControl(sidebar);
                          sidebar.show();

                          var markerCluster = new L.MarkerClusterGroup({
                            maxClusterRadius: 60,
                            disableClusteringAtZoom: 10,
                            spiderfyOnMaxZoom: false
                          });


                              var collect  = <?php echo json_encode($json, JSON_FORCE_OBJECT) ?>;
                              //load data from controller
                              var j=0;
                                            for (var i in collect) {
                                              
                                              var marker = L.marker(
                                                            L.latLng(collect[i].lat, collect[i].lng), {
                                                              title: collect[i].adress
                                                            }

                                                          );
                                                marker.bindPopup("<b>" + collect[i].adress + "</b>").openPopup();

                                                markerCluster.addLayer(marker);
                                                j++;
                                            }

                                map.addLayer(markerCluster);
                              // markerCluster.addTo(map);



 // create control and add to map
var lc = L.control.locate().addTo(map);
var locate  = <?php if (isset($locate)) echo json_encode($locate, JSON_FORCE_OBJECT); else echo "false" ?>;
// request location update and set location
if (locate)
  lc.start();



                    map.on('accuratepositionprogress', onAccuratePositionProgress);
                    map.on('accuratepositionfound', onAccuratePositionFound);
                    map.on('accuratepositionerror', onAccuratePositionError);
                    //map.on('click', addMarker);

                    map.findAccuratePosition({
                        maxWait: 15000, // defaults to 10000
                        desiredAccuracy: 20 // defaults to 20
                    });
                     
                        
                    
                });

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
  
  </section>
@stop
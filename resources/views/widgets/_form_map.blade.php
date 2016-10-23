<div class="form-group ">
	<div id="mapEditor" style="height: 600px; "></div>
</div>

<script>
 // initialize the map
 $(function(){
          var map = L.map('mapEditor').setView([48.56, 33.88], 6);

          L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a rel="nofollow" href="http://osm.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

         var lat = $('#lat').val();
         var lng = $('#lng').val();
         if(lat=='' || lng=='')
         {
         	lat=50.42951794712289;
         	lng=30.520019531250004;
         }

	     var marker = L.marker(
	              L.latLng(lat, lng), {
	                title: "Выбирите место магазина",
	                draggable: true
	              }
	            );
	      marker.on('drag', function(e) {
	            $('#lat').val(e.latlng.lat);
	            $('#lng').val(e.latlng.lng);
	            });

		  marker.bindPopup("<b>Hello</b>").openPopup();
		  marker.addTo(map);

		  map.on('click', function(e){
		  		marker.setLatLng(e.latlng).update();
		  		$('#lat').val(e.latlng.lat);
	            $('#lng').val(e.latlng.lng);
		  });
    
});

 
</script>
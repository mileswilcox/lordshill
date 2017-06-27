<div class="hero__bg  hero__bg--inside-page">
	<div id="map" style="width:100%;height:500px;"></div>
</div>

<script>

  // This example adds a marker to indicate the position of Bondi Beach in Sydney,
  // Australia.
  function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 17,
	  center: {lat: 52.3715484, lng: -1.377594},
	//   mapTypeId: 'satellite'
	});

	// var image = 'assets/img/map-icon.png';
	// var beachMarker = new google.maps.Marker({
	//   position: {lat: 52.3715484, lng: -1.377594},
	//   map: map,
	//   icon: image
	// });
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdYL9vh0FHmWV_sCkcznaHChgrdtODBvQ&callback=initMap">
</script>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Punto visitado en el mapa</title>
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 400px;
			width: 100%;
			max-width: 100%;
			max-height: 100%;
		}
        .marco{
            padding: 1rem;
            border: 12px solid rgb(0, 0, 0);
            border-radius: 0.75rem;
        }
        h4{
            text-align: center;
            font-weight: bold;
            color: white;
        }
        .marco{
            background-color: blue;
        }
	</style>
</head>
<body>

<div class="marco">
    <h4>PUNTO DE REFERENCIA DEL NEGOCIO</h4>
<div id="map" style="width: 100%; height: 500px;"></div>

</div>
<br><br><br>
<script>
    const data1 = {!!  json_encode($encuestas->latitude)!!};
    const data2 = {!!  json_encode($encuestas->longitude)!!};
    const namePoint = {!!  json_encode($encuestas->nombreNegocio)!!};
    const nameloc = {!!  json_encode($encuestas->localidad)!!};
	var map = L.map('map').setView([data1, data2], 50);

	var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,

	}).addTo(map);

	var marker = L.marker([data1, data2]).addTo(map)
		.bindPopup(namePoint).openPopup();

	var circle = L.circle([data1, data2], {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.1,
		radius: 5
	}).addTo(map).bindPopup(nameloc);

	var polygon = L.polygon([
		[data1, data2]
	]).addTo(map).bindPopup(namePoint);


	var popup = L.popup()
		.setLatLng([data1, data2])
		.setContent('Punto Registrado.')
		.openOn(map);

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent('You clicked the map at ' + e.latlng.toString())
			.openOn(map);
	}

	map.on('click', onMapClick);

</script>



</body>
</html>

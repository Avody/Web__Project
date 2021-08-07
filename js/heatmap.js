
let mymap = L.map('mapid');
let attribution = '&copy; <a href= "https://www.openstreetmap.org/copyright">OpenStreetMap</a>contributors ';
let tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
let tiles = L.tileLayer(tileUrl,{attribution});

tiles.addTo(mymap);

mymap.setView([42, 21], 4);

let marker = L.marker([38.246242,21.7350847], 
	{ draggable: "true" });

marker.addTo(mymap);
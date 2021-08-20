
/*** Leaflet ***/

let mymap = L.map('mapid');
let attribution = '&copy; <a href= "https://www.openstreetmap.org/copyright">OpenStreetMap</a>contributors ';
let tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
let tiles = L.tileLayer(tileUrl,{attribution});
tiles.addTo(mymap);
mymap.setView([42, 21], 4);

/*** Marker ***/

let marker = L.marker([38.246242,21.7350847], 
	{ draggable: "true" });
marker.addTo(mymap);

var table =[ 

      {lat: 45, lng:20, count: 2}
    

  ] ;

/*** Heatmap***/

var testData = {
  max: 8,
  data: table
};

var cfg = {
  
  "radius": 40,
  "maxOpacity": 1,
  "scaleRadius": false, 
  "useLocalExtrema": false,
  latField: 'lat', 
  lngField: 'lng',
  valueField: 'count'
};

var heatmapLayer = new HeatmapOverlay(cfg);
mymap.addLayer(heatmapLayer);

heatmapLayer.setData(testData);



/*** Mysql node ***/

var mysql = require('node_modules/mysql');

var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '',
    database : 'users_project'
});
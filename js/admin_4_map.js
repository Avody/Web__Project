

/*** Map display ***/
let mymap = L.map('mapid');
let attribution = '&copy; <a href= "https://www.openstreetmap.org/copyright">OpenStreetMap</a>contributors ';
let tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
let tiles = L.tileLayer(tileUrl,{attribution});
tiles.addTo(mymap);
mymap.setView([40, 11], 2);

$(document).ready(function(){

	$.ajax({

		url:"http://localhost/Avody_Project/includes/admin_4_map.inc.php",
		method: "GET",
		dataType:"JSON",
		success:function(data){

			
			/*** Creating the markers ***/
			
			
			
			
				
			var unique = (value, index, self) =>{

				var findIndex = (element) => element[0] == value[0];

				return self.findIndex(findIndex) === index;
			}
			
			var positions = data.filter(unique);

			var you_icon = L.icon({
			    iconUrl: 'img/icons8-marker-32.png',
			    iconSize:     [38, 40], // size of the icon
			    iconAnchor:   [20, 37], // point of the icon which will correspond to marker's location
			    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
			});
			
			var a = L.marker(positions[0],{title:"YOUR HOUSE lat: "+positions[0][0]+", lng: "+positions[0][1], icon:you_icon}).addTo(mymap);
			
			for(var i=1; i<positions.length;i++){
				L.marker(positions[i],{title:"lat: "+positions[i][0]+", lng: "+positions[i][1]}).addTo(mymap);
			}


			/***Drawing lines between them ***/


			var counts = {};
			
			for (var i = 0; i < data.length; i++) {
				counts[data[i]] = 1 + (counts[data[i]] || 0);
				
			}
			
			
			positions.forEach(element =>{

				var weight = ((counts[element])/(data.length)*10)+1;
				

				var newdata = [data[0],element];

				L.polyline(newdata, {color:'red',weight:weight}).addTo(mymap);

			})


			
			
		},error:function(data){
			console.log(data);
		}
	})



});









/*** Map display ***/
let mymap = L.map('mapid');
let attribution = '&copy; <a href= "https://www.openstreetmap.org/copyright">OpenStreetMap</a>contributors ';
let tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
let tiles = L.tileLayer(tileUrl,{attribution});
tiles.addTo(mymap);
mymap.setView([40, 11], 2);

$(document).ready(function(){

	$.ajax({

		url:"http://localhost/Github_Project/includes/admin_4_map.inc.php",
		method: "GET",
		dataType:"JSON",
		success:function(data){

			
			/*** Creating the markers ***/
			
			console.log(data);
			

			for(var i=0; i<data.length;i++){
				L.marker(data[i],{title:"lat: "+data[i][0]+", lng: "+data[i][1]}).addTo(mymap);

			}


			/***Drawing lines between them ***/


			var counts = {};
			for (var i = 0; i < data.length; i++) {
				counts[data[i]] = 1 + (counts[data[i]] || 0);
			}


			data1 = new Array();
			data2 = new Array();
			data3 = new Array();
			data4 = new Array();
			data5 = new Array();

			

			for(var i=0; i<data.length;i++){

				if(counts[data[i]] < 0.1*(data.length)){

					data1.push(data[i]);

				}else if(counts[data[i]] < 0.2*(data.length)) {

					data2.push(data[i]);

				}else if(counts[data[i]] < 0.4*(data.length)){

					data3.push(data[i]);

				}else{

					data4.push(data[i]);
				}

			}


			if(data1.length !==0){
				var polyline1 = L.polyline(data1, {color:'green',weight:1}).addTo(mymap);
			}	
			if(data2.length !==0){
				var polyline2 = L.polyline(data2, {color:'red',weight:2}).addTo(mymap);
			}	
			if(data3.length !==0){
				var polyline3 = L.polyline(data3, {color:'black',weight:3}).addTo(mymap);
			}	
			if(data4.length !==0){
				var polyline4 = L.polyline(data4, {color:'brown',weight:4}).addTo(mymap);
			}	
				
			


			
		},error:function(data){
			console.log(data);
		}
	})



});







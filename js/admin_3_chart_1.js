$(document).ready(function(){
    $.ajax({
        url:"http://localhost/Avody_Project/includes/chartjs_admin_3_1.inc.php",
        method: "GET",
        success: function(data) {

            console.log(data);

            var json = JSON.parse(data);
            var content_type = [];
            var time_to_live = [];
            for(var i=0; i<json.length; i++){
                content_type.push(json[i]['content_type']);
                if(json[i]['TTL']>=0){
                time_to_live.push(json[i]['TTL']);
            }}

           
            
            var chartdata = {
                labels: content_type,
                datasets : [
                {
                    label: 'Average TTL per content type (hours)',
                    backgroundColor:[
                    'rgba(1, 9, 3, 0.8)',
                    'rgba(104, 162, 235, 0.8)',
                    'rgba(255, 16, 6, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: 'rgba(0,0,55,.7)',
                    hoverBackgroundColor:'lightblue',
                    data:time_to_live


                }
                ]
            };

            
            var ctx = document.getElementById('myChart_1').getContext('2d');

            var myChart = new Chart(ctx,{
                type: 'bar',
                data:chartdata
            })



            
        },
        error: function(data) {
            console.log(data);
        }
    })


});
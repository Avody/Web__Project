$(document).ready(function(){
    $.ajax({
        url:"http://localhost/Github_Project/includes/chartjs_admin_2.inc.php",
        method: "GET",
        success: function(data) {
            var json = JSON.parse(data);
            console.log(json);
            var content_type = [];
            var avg_time = [];
            for(var i=0; i<json.length; i++){
                content_type.push(json[i]['content_type']);
                avg_time.push(json[i]['AVG(load_time)']);
            }
            
            var chartdata = {
                labels: content_type,
                datasets : [
                {
                    label: 'Response time / content-type (ms)',
                    backgroundColor:[
                    'rgba(1, 9, 3, 0.2),0.2)',
                    'rgba(104, 162, 235, 0.2)',
                    'rgba(255, 106, 6, 0.4)',
                    'rgba(75, 192, 192, 0.4)',
                    'rgba(153, 102, 255, 0.4)',
                    'rgba(255, 159, 64, 0.4)'
                    ],
                    borderColor: 'rgba(0,0,55,.7)',
                    hoverBackgroundColor:'lightblue',
                    data:avg_time

                }
                ]
            };
            var ctx = $("#myChart");

            var myChart = new Chart(ctx,{
                type: 'line',
                data:chartdata
            })
            
        },
        error: function(data) {
            console.log(data);
        }
    });
});
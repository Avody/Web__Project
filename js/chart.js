$(document).ready(function(){
    $.ajax({
        url:"http://localhost/Github_Project/includes/chartjs_db_calls.inc.php",
        method: "GET",
        success: function(data) {
            var json = JSON.parse(data);
            console.log(json);
            var method = [];
            var count = [];
            for(var i=0; i<json.length; i++){
                method.push(json[i]['method']);
                count.push(json[i]['count(method)']);
            }
            
            var chartdata = {
                labels: method,
                datasets : [
                {
                    label: 'Methods',
                    backgroundColor:[
                    'rgba(1, 9, 3, 0.2),0.8)',
                    'rgba(104, 162, 235, 0.8)',
                    'rgba(255, 106, 6, 0.4)',
                    'rgba(75, 192, 192, 0.4)',
                    'rgba(153, 102, 255, 0.4)',
                    'rgba(255, 159, 64, 0.4)'
                    ],
                    borderColor: 'white',
                    hoverBackgroundColor:'lightblue',
                    data:count

                }
                ]
            };
            var ctx = $("#myChart");

            var myChart = new Chart(ctx,{
                type: 'doughnut',
                data:chartdata
            })
            
        },
        error: function(data) {
            console.log(data);
        }
    });
});

/***** Chart 2 ****/

$(document).ready(function(){
    $.ajax({
        url:"http://localhost/Github_Project/includes/chartjs_db_calls_2.inc.php",
        method: "GET",
        success: function(data) {
            var json = JSON.parse(data);
            console.log(json);
            var status = [];
            var count = [];
            for(var i=0; i<json.length; i++){
                status.push(json[i]['status']);
                count.push(json[i]['count(status)']);
            }
            
            var chartdata = {
                labels: status,
                datasets : [
                {
                    label: 'Status',
                    backgroundColor:[
                    'rgba(1, 9, 3, 0.2),0.8)',
                    'rgba(104, 162, 235, 0.8)',
                    'rgba(255, 106, 6, 0.4)',
                    'rgba(75, 192, 192, 0.4)',
                    'rgba(153, 102, 255, 0.4)',
                    'rgba(255, 159, 64, 0.4)'
                    ],
                    borderColor: 'white',
                    hoverBackgroundColor:'lightblue',
                    data:count

                }
                ]
            };
            var ctx = $("#myChart2");

            var myChart = new Chart(ctx,{
                type: 'doughnut',
                data:chartdata
            })
            
        },
        error: function(data) {
            console.log(data);
        }
    });
});






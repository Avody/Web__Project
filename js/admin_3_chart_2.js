$(document).ready(function(){
    $.ajax({
        url:"http://localhost/Github_Project/includes/chartjs_admin_3_2.inc.php",
        method: "GET",
        success: function(data) {

            console.log(data);

            var json = JSON.parse(data);
            console.log(json);
            var presentage = [];
            
            presentage.push(json[0]['public']);
            presentage.push(json[0]['private']);
            presentage.push(json[0]['no_cache']);
            presentage.push(json[0]['no_store']);
  
            

           
            
            var chartdata2 = {
                labels: ['public','private','no-cache','no-store'],
                datasets : [
                {
                    label: 'Presentage of directives by content-type',
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
                    data:presentage


                }
                ]
            };

            
            var ctx2 = document.getElementById('myChart_2').getContext('2d');

            var myChart2 = new Chart(ctx2,{
                type: 'bar',
                data:chartdata2
            })



            
        },
        error: function(data) {
            console.log(data);
        }
    })


});
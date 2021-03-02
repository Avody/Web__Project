
var ctx = document.getElementById('myChart').getContext('2d');

Chart.defaults.global.defaultFontFamily='Lato';
Chart.defaults.global.defaultFontSize=10;
Chart.defaults.global.defaultFontColor='#000';

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [ "January","February","March","April","May"],
        datasets: [{
            label: '# of files ',
            data: [5,1,6,10,8],
            backgroundColor:[
                "red",
                "green",
                "blue",
                "cyan",
                "pink"


            ],
            borderColor: "#000",
            borderWidth: 1,
            hoverBorderColor:'#fff',
            hoverBorderWidth:3
        }]
    },
    options: {
        title:{
            display:true,
            text:"Files that have been uploaded",
            fontSize:20
        },
        legend:{
            display:true,
            position:"top",
            labels:{
                fontColor:"#000"
            }
        },
        layout:{
            padding:{
               
            }
        },
        tooltips:{
            enabled:true
        },
        

        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                    

                }
            }]
        }
    }
});

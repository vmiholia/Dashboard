var currentChart;
        function updateChart() {
         if(currentChart){currentChart.destroy();}
    $('#mycanvas').replaceWith('<canvas id="mycanvas"></canvas>');

         var classes = $("#classes").val();
         var subject = $("#subject").val();
         var student = $("#student").val();
         $.ajax({
          url: "student_performance_query.php?classes="+classes+"&subject="+subject+"&student="+student,
          method: "GET",
          success: function(data) {
            var avg__finalgrades = [];
            var itemnames = [];
            var firstname = [];
            var obj = JSON.parse(data);
            for(var i in obj) {
              avg__finalgrades.push(obj[i].avg__finalgrade);
              itemnames.push(obj[i].itemname);
            }
            console.log("efohe");
            var ctx= document.getElementById('mycanvas').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: itemnames,
          datasets: [{
            label: 'Marks ',
            data: avg__finalgrades,
            backgroundColor: [

            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',           
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',

            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)'
            ],
            borderColor: [

            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',           
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',

            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive:true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]            
          }
        }

      });
            // myChart.data.datasets=avg__finalgrades;
            // myChart.data.labels=itemnames;
            // myChart.update();

          },

          error: function(data) {
          }
        });
}
      /* $('#classes').on('change', updateChart)
       updateChart();
       $('#subject').on('change', updateChart)
       updateChart();
       $('#student').on('change', updateChart)
       updateChart();*/
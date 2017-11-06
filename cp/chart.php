<?php 
require('../includes/action/config.php');
$date="";$suits="";$shirts="";$trousers="";$blazers="";
$d1=date("Y-m-d",strtotime("-7 days"));
$d2=date("Y-m-d");
$sql=mysqli_query($con,"select sum(tot_amount) as amt,oh_date from order_history_master group by oh_date");
while($r=mysqli_fetch_array($sql))
{
	//$date.='"'.date('M d',strtotime($r['oh_date'])).'",';
      $date.='"'.$r['oh_date'].'",';

  $amt.=$r['amt'].',';
  
}
$date=trim($date,",");
$amt=trim($amt,",");

?>
<script src="<?php echo $homeurl;?>assets/chartjs/Chart.min.js"></script>
<script>
      $(function () {
        var areaChartData = {
          labels: [<?php echo $date;?>],
          datasets: [
            {
              label: "",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php echo $amt;?>]
            }
          ]
        };
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>",
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
  });
    </script>

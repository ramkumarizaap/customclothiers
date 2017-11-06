<?php 
require('../includes/action/config.php');
$date="";$amt="";$shirts="";$blazers="";$trousers="";
  $val=$_POST['val'];
  if($val==1)
  {
    $d1=date("Y-m-d",strtotime("-7 days"));
    $d2=date("Y-m-d");
    $sql=mysqli_query($con,"select sum(tot_amount) as amt,oh_date as t_date from order_history_master 
          WHERE oh_date <='".$d2."' AND oh_date >= '".$d1."' group by oh_date");

    
  }
  else if($val==2)
  {
      //$d1=date("Y-m-d",strtotime("-30 days")); $d2=date("Y-m-d");
    //$sql=mysqli_query($con,"select sum(tot_amount) as amt,oh_date  from order_history_master where oh_date >='".$d1."' and oh_date <='".$d2."' group by oh_date");
    $d1=date("Y-01-01");$d2=date("Y-12-31");
    $sql=mysqli_query($con,"select sum(tot_amount) as amt,MONTHNAME(oh_date) as t_date from order_history_master where oh_date >='".$d1."' and oh_date <='".$d2."' group by MONTH(oh_date)");
  }
   else if($val==3)
  {
    //$s=date("Y",strtotime("-10 years"));
     $d1=date("Y-01-01");$d2=date("Y-12-31");
    $sql=mysqli_query($con,"select sum(tot_amount) as amt,YEAR(oh_date) as t_date from order_history_master where oh_date >='".$d1."' and oh_date <='".$d2."' group by YEAR(oh_date)");
  }
/*while($r=mysqli_fetch_array($sql))
{
  $date.='"'.date('M d',strtotime($r['oh_date'])).'",';
  $amt.=$r['amt'].',';
}
$date=trim($date,",");
$amt=trim($amt,",");*/
while($r=mysqli_fetch_array($sql))
{
  $date.='"'.$r['t_date'].'",';
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
              label: "Sales",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php echo $amt;?>]
            },
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

<html>
<div id="chartContainer">
  <script src="/lib/d3.v4.3.0.js"></script>
  <script src="http://dimplejs.org/dist/dimple.v2.3.0.min.js"></script>
  <script type="text/javascript">
    var svg = dimple.newSvg("#chartContainer", 590, 400);
      d3.tsv("/data/example_data.tsv", function (data) {
        data = dimple.filterData(data, "Date", "01/12/2012");
        var myChart = new dimple.chart(svg, data);
        myChart.setBounds(60, 30, 500, 330)
        myChart.addMeasureAxis("x", "Unit Sales");
        myChart.addMeasureAxis("y", "Operating Profit");
        myChart.addSeries(["SKU", "Channel"], dimple.plot.bubble);
        myChart.addLegend(200, 10, 360, 20, "right");
        myChart.draw();
      });
  </script>
</div>
</html>
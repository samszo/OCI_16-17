<html>
<body>
<div id="chartContainer">
  <script src="/OCI_16-17/jeaneudesT/data/test/lib/d3.v4.3.0.js"></script>
  <script src="http://dimplejs.org/dist/dimple.v2.3.0.min.js"></script>
  <script type="text/javascript">
  </script>
</div>
<div id="Container">
 <script type="text/javascript">
  var url = "../../php/lecteurFlux.php?url=OCI1617data";
  var convert = {"j'men sors":12,"trop fort":16,"fort":15,"boffff":8,"pas très bon":10,"connais pas":2,"expert":18," ":0};
  freqData = []

  d3.csv(url, null, function(error,data)
  {
    freqData = [];
    data.forEach(function(d){
      var tab = {
        "Nom":"T J","Prenom":"J","C":15,
      }
      freqData.push(tab);
    });
  });


  // Make a simple dataset
  var freqData =  [
    { "Matiere":"HTML", },
    { "Matiere":"Javascript"},
    { "Matiere":"Java"},
    { "Matiere":"C"},
    { "Matiere":"J2EE"},
    { "Matiere":"Anglais"},
    { "Matiere":"SQL"},
    { "Matiere":"Web Design"},
    { "Matiere":"CSS"},
    { "Matiere":"PHP"},
    { "Matiere":"AJAX"},
    { "Matiere":"Responsive"},
    { "Matiere":"UML"},
    { "Matiere":"JOOMLA"},
    { "Matiere":"Wordpress"},
    { "Matiere":"Drupal"},
    { "Matiere":"SPIP"}, 
  ];

 var freqData2 =[];


  //var hipOrDullData = dimple.filterData([freqData, freqData2], "Nom", ["T", "T"]);

  var svg = dimple.newSvg("body", 6000, 800);
    var myChart = new dimple.chart(svg, freqData);
        myChart.setBounds(70, 30, 1500, 400)
        var x = myChart.addCategoryAxis("x", "Matiere");
         
        
        var myAxis = myChart.addMeasureAxis("y", "notes");


        myChart.addSeries("Channel", dimple.plot.bubble);
        myChart.addLegend(180, 10, 360, 20, "right");
        myChart.draw();
 </script>
</div>
</body>
</html>
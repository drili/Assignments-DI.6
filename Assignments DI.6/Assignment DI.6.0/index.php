<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title>Assignment DI.6.0</title>

            <script type="text/javascript" src="population.json"></script>
      </head>

      <body>
            <style media="screen">
                  .percentage {
                        color: green;
                  }
                  .divfloatright {
                        float: right
                  }
                  .populationp {
                        max-width: 400px;
                  }
            </style>
            <h1>Assignment DI.6.0 | Drilon Braha</h1>

            <h2>Data from https://www.dst.dk/en/Statistik/statistikbanken/api</h2>

            <div id="population">

            </div>

            <script type="text/javascript">
                  var jsonData = JSON.parse(JSON.stringify(populationData));
                  // console.log(jsonData.dataset.dimension.Tid.category);

                  var dataValue = jsonData.dataset.value;
                  var dataLabel = jsonData.dataset.dimension.Tid.category.label;
                  var dataIndex = jsonData.dataset.dimension.Tid.category.index;
                  console.log(dataIndex);
                  var startDate = 2008 - 0.25;

                  for (var i = 0; i < dataValue.length; i++) {
                        var len = dataValue.length;
                        var sum = dataValue[i];
                        var percentage = (dataValue[i] - dataValue[0]) / dataValue[0] * 100;
                        var increase = dataValue[i] - dataValue[0];

                        var x = document.createElement("div");
                        x.setAttribute("id", "populationobject");
                        x.innerHTML = "<p class='populationp'>" + 'Date: ' + (startDate += 0.25) + ' | Population: <i><span class="divfloatright">' + sum.toLocaleString() + '</span></i> ' + '<br>population increase: <span class="divfloatright">+' + increase.toLocaleString() + '</span><br> percentage increase: <span class="percentage divfloatright">' + percentage.toFixed(2) + '%</span>' + "</p> <hr>";
                        document.getElementById("population").appendChild(x);
                  }
            </script>
      </body>
</html>

<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title>Assignment DI.6.0</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
      </head>
      <body onload="myFunction()">
            <style media="screen">
                  th {
                        background-color: #eee;
                  }
            </style>

            <div id="loader">

            </div>

            <div class="container">
                  <div class="row">
                        <div class="col-lg-12">
                              <h1>Assignment DI.6.2 | Drilon Braha</h1>
                              <p>Using API:  <a href="https://api.census.gov/data/2013/language/examples.html">Language Statistics: ACS (2013)</a></p>
                              <div id="myDiv">
                                    <div id="root">
                                          <table id="roottable" style="width:100%">

                                          </table>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>

            <script type="text/javascript">
                  /*
                  Loader script
                  NOTE: due to API sometimes loading slow, I've created a loader to indicate
                  the user that the API is in the process of being loaded
                  */
                  var myVar;
                  randNumber = Math.floor(Math.random() * 1500 + 900);

                  function myFunction() {
                        myVar = setTimeout(showPage, randNumber);
                  }

                  function showPage() {
                        document.getElementById("loader").style.display = "none";
                        document.getElementById("myDiv").style.display = "block";
                  }
            </script>

            <script type="text/javascript">
                  // API script
                  const app = document.getElementById('root');

                  const container = document.createElement('div');
                  container.setAttribute('class', 'container');

                  app.appendChild(container);

                  var request = new XMLHttpRequest();
                  request.open('GET', 'https://api.census.gov/data/2013/language?get=NAME,EST,LANLABEL&for=state:*&LAN=625&key=94104689a4f4378cf5e0e9152f24a913c5421c39', true);
                  request.onload = function () {
                        var data = JSON.parse(this.response);
                        var x = document.createElement("tr");
                        x.setAttribute("id", "language");
                        x.innerHTML = "<th>" + data[0][0] + "</th>" + "<th>" + data[0][1] + "</th>" + "<th>" + data[0][2] + "</th>" + "<th>" + data[0][3] + "</th>" + "<th>" + data[0][4] + "</th>";
                        document.getElementById("roottable").appendChild(x);

                        console.log(data);
                        for (var i = 1; i < data.length; i++) {
                              var xName = document.createElement("tr");
                              xName.innerHTML = "<td>" + data[i][0] + "</td>" + "<td>" + data[i][1] + "</td>" + "<td>" + data[i][2] + "</td>" + "<td>" + data[i][3] + "</td>" + "<td>" + data[i][4] + "</td>";
                              document.getElementById("roottable").appendChild(xName);
                        }
                  }

                  request.send();
            </script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
</html>

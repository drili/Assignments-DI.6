<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title>Assignment DI.6.1</title>
            <link rel="stylesheet" href="style.css">
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>

      <body>
            <div class="container">
                  <div class="row">
                        <div class="col-lg-12">
                              <h1>Assignment DI.6.1 | Drilon Braha</h1>
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-lg-12 mt-5">
                              <header>
                                    <h4 class="text-secondary">5 Day Weather Forecast</h4>
                                    <?php $id = $_GET['id'];
                                          echo "ID: " . $id;
                                    ?>
                              </header>
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-lg-12 mt-5">
                              <div id="city">

                              </div>
                              <div id="forecast">

                              </div>
                        </div>
                  </div>

            </div>

            <script type="text/javascript">

                  var forecast = document.getElementById("forecast");
                  var city = document.getElementById("city");

                  var request = new XMLHttpRequest();
                  request.open('GET', 'https://api.openweathermap.org/data/2.5/forecast?id=' + <?php echo $id ?> + '&appid=910331982f2ec31129578d19f540741f', true);
                  request.onload = function () {
                        var data = JSON.parse(this.response);
                        var day = 1;

                        city.innerHTML = "<i>Forecast for " + data.city.name + "</i><hr><br>";
                        for (var i = 1; i < 6; i++) {
                              var xForecast = document.createElement("div");
                              xForecast.innerHTML = "Day " + day++ + "<br> Degrees: " + parseInt(data.list[i].main.temp - 273) + "<br> Weather: " + data.list[i].weather.descripion + " <br> Humidity level: " + data.list[i].main.humidity + "<br><br>";
                              document.getElementById("forecast").appendChild(xForecast);
                        }
                        // for (var i = 0; i < 5; i++) {
                        //       forecast.innerHTML = "Day 1 | " + " <br> Humidity level: " + data.list[i].main.humidity;
                        // }
                        console.log(data);
                  }

                  request.send();

                  // function responseBack(response) {
                  //       var jsonForecast = JSON.parse(response);
                  //
                  //
                  //       // cityName.innerHTML = "Weather for " + "<b>" + jsonWeather.name + "</b>" + " (" + jsonWeather.sys.country + ")";
                  //       // icon.src = "http://openweathermap.org/img/w/" + jsonWeather.weather[0].icon + ".png";
                  //       // temperature.innerHTML = "<h4>Degrees: " + parseInt(jsonWeather.main.temp - 273) + "°</h4>";
                  //       // humidity.innerHTML = "<b>Humidity level: </b>" + jsonWeather.main.humidity + "%";
                  //       // description.innerHTML = "<b>Description: </b>" + jsonWeather.weather[0].description;
                  //       // wind.innerHTML = "<b>Wind force: </b>" + jsonWeather.wind.speed + ", <i>wind direction: </i>" + jsonWeather.wind.deg + " deg";
                  //       console.log(jsonForecast);
                  //
                  //       forecast.innerHTML = "<a href=forecast.php?id=" + jsonWeather.id + ">Forecast</a>";
                  // }


            </script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
</html>

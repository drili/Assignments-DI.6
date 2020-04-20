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
                              <p>Git Test</p>
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-lg-12 mt-5">
                              <header>
                                    <h4 class="text-secondary">Search for any city</h4>
                                    <div class="search">
                                          <input type="text" placeholder="City Name..." id="search-txt">
                                          <a id="search-btn" href="#" class"btn">Search</a>
                                    </div>
                              </header>
                        </div>
                  </div>

                  <div class="row mt-5">
                        <div class="col-lg-6">
                              <div class="city-icon">
                                    <div class="city-icon-holder">
                                          <div id="city-name" class="bg-light"></div>

                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="row mt-3">
                        <div class="col-lg-6 d-flex flex-row d-flex align-items-center">
                              <div id="temp"></div>
                              <img src="" alt="" id="icon">
                        </div>

                  </div>

                  <div class="row mt-3">
                        <div class="col-lg-6">
                              <div class="humidity">
                                    <div id="humidity-div"></div>
                                    <div id="description"></div>
                                    <div id="wind"></div>
                              </div>
                        </div>
                  </div>

                  <div class="row mt-3">
                        <div class="col-lg-6">
                              <div id="forecast">

                              </div>
                        </div>
                  </div>
            </div>

            <script type="text/javascript">
                  const appKey = "910331982f2ec31129578d19f540741f";

                  var searchButton = document.getElementById("search-btn");
                  var searchInput = document.getElementById("search-txt");
                  var cityName = document.getElementById("city-name");
                  var temperature = document.getElementById("temp");
                  var humidity = document.getElementById("humidity-div");
                  var description = document.getElementById("description");

                  searchButton.addEventListener("click", weatherDetails);
                  searchInput.addEventListener("keyup", enterClick);

                  function enterClick(event) {
                        if (event.key === "Enter") {
                              weatherDetails();
                        }
                  }

                  function weatherDetails() {
                        if (searchInput.value === "") {

                        } else {
                              var searchLink = "https://api.openweathermap.org/data/2.5/weather?q=" + searchInput.value + "&appid="+appKey;
                              httpRequestAsync(searchLink, responseBack);
                        }
                  }

                  function responseBack(response) {
                        var jsonWeather = JSON.parse(response);

                        cityName.innerHTML = "Weather for " + "<b>" + jsonWeather.name + "</b>" + " (" + jsonWeather.sys.country + ")";
                        icon.src = "http://openweathermap.org/img/w/" + jsonWeather.weather[0].icon + ".png";
                        temperature.innerHTML = "<h4>Degrees: " + parseInt(jsonWeather.main.temp - 273) + "°</h4>";
                        humidity.innerHTML = "<b>Humidity level: </b>" + jsonWeather.main.humidity + "%";
                        description.innerHTML = "<b>Description: </b>" + jsonWeather.weather[0].description;
                        wind.innerHTML = "<b>Wind force: </b>" + jsonWeather.wind.speed + ", <i>wind direction: </i>" + jsonWeather.wind.deg + " deg";
                        console.log(jsonWeather);

                        forecast.innerHTML = "<a href=forecast.php?id=" + jsonWeather.id + ">See forecast</a>";
                  }

                  function httpRequestAsync(url, callback) {
                        // console.log("test");
                        var httpRequest = new XMLHttpRequest();
                        httpRequest.onreadystatechange = () => {
                              if (httpRequest.readyState == 4 && httpRequest.status == 200)
                              callback(httpRequest.responseText);
                        }
                        httpRequest.open("GET", url, true); // true for asynchronous
                        httpRequest.send();
                  }
            </script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
</html>

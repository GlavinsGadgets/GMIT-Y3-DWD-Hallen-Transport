<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Hallen Transport">
    <meta name="author" content="Eanna Glavin">

    <title>Hallen Transport & Delivery Home Page</title>
    <link rel="icon" href="Site-Assets/Images/Hallen-favicon-200px.png">

    <link rel="stylesheet" href="Site-Assets/CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="Site-Assets/CSS/Hallen-Main-Style.css" />

</head>
<body id="TOP">

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          
          <div class="col-6 text-center"> <a href="?" title="Hallen">
                    <h1 class="Hallen-Logo">Hallen Transport & Delivery</h1>
          </a> </div>

          <div class="col-4 d-flex justify-content-end align-items-center">
            
            <a class="btn btn-sm btn-outline-secondary" href="Employee/">Employee Login</a>
          </div>

        </div>
      </header>
    </div>

    <div class="jumbotron p-3 p-md-5 text-white rounded">
    <div id="map" class="map homemap"></div>
        

      <div class="col-md-6 px-0">
        <h1 class="display-12 font-italic">Wellcome to Hallen Transport</h1>
        <p class="lead my-3">Enter you tracking ID here: <input></p>
      </div>
    </div>

    <div class="container">
      <div class="col-12">
        <div class="container hp-images">
          <div class="row">

            <div class="col-3">
              <img src="Site-Assets/Images/hp-images/Crossing_Road_Quay_St.jpg" alt="Crossing_Road_Quay_St" onclick="openImg(this);">
              <div class="overlay">
                <div class="text">Reliable</div>
              </div>
            </div>
            <div class="col-3">
              <img src="Site-Assets/Images/hp-images/Dominick_Street_Upper.jpg" alt="Dominick_Street_Upper" onclick="openImg(this);">
              <div class="overlay">
                <div class="text">Real Time Tracking</div>
              </div>
            </div>
            <div class="col-3">
              <img src="Site-Assets/Images/hp-images/Druid_Lane.jpg" alt="Druid_Lane" onclick="openImg(this);">
              <div class="overlay">
                <div class="text">Next Day Delivery</div>
              </div>
            </div>
            <div class="col-3">
              <img src="Site-Assets/Images/hp-images/Fire_Station_Fr_Griffin_Rd.jpg" alt="Fire_Station_Fr_Griffin_Rd" onclick="openImg(this);">
              <div class="overlay">
                <div class="text">Top Class Customer Service</div>
              </div>
            </div>
          
          </div>
        </div>  
      </div>
    </div>

    <div class="w-100"></div>

    <footer class="blog-footer text-center">
      <p class="copyright">
          &copy; Hallen Transport 2018.
      </p>
      <p>
        <a href="#TOP">Back to top</a>
      </p>
    </footer>

    <!-- Frameworks & Scripts -->
    <script src="Site-Assets/JavaScript/jquery.min.js"></script>
    <script src="Site-Assets/JavaScript/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIdwkWQK4J12fki5XgoU81IqqiS-8d2g0"></script>
    <script src="Site-Assets/JavaScript/google-maps.js"></script>
</body>
</html>
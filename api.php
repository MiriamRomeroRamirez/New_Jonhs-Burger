<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        	<style>
            .map-container-2 {
              overflow: hidden;
              padding-bottom: 56.25%;
              position: relative;
              height: 0;
            }
        
            .map-container-2 iframe {
              left: 0;
              top: 0;
              height: 100%;
              width: 100%;
              position: absolute;
            }
          </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <h1>Restaurante Jonh´s burguer</h1>
      </div>
    </nav>
  <br>
  <br>
    <div class="container">
      <!-- Example row of columns -->

      <div class="row">
        <div class="col-md-8">
          <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 600px; width:50%;">
					</div>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2022</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <script>
          var customLabel = {
              restaurant: {
                  label: 'R'
              },
              bar: {
                  label: 'B'
              }
          };
      
          function initMap() {
              var map = new google.maps.Map(document.getElementById('map-container-google-2'), {
                  center: new google.maps.LatLng(16.0128538, -90.4508264),
                  zoom: 7,
              heading: 90,
              tilt: 45
              });
      
      
              var infoWindow = new google.maps.InfoWindow;
              downloadUrl('http://localhost/mapsbs/xml.php', function(data) {
                  var xml = data.responseXML;
                  var markers = xml.documentElement.getElementsByTagName('marker');
                  Array.prototype.forEach.call(markers, function(markerElem) {
                      var idmapa = markerElem.getAttribute('idmapa');
                      var persona = markerElem.getAttribute('persona');
                      var descripcion = markerElem.getAttribute('descripcion');
                     
                      var point = new google.maps.LatLng(
                          parseFloat(markerElem.getAttribute('lat')),
                          parseFloat(markerElem.getAttribute('lng')));
                      const contentString =
                          '<div id="content">' +
                          '<div id="siteNotice">' +
                          "</div>" +
                          '<center>'+
                          '<h1 id="firstHeading" class="firstHeading">'+ persona +  '</h1>' +
                          '</center>'+
                          '<br>'+
                          '<div id="bodyContent">' +
                          '<br>'+
                          "<p><b>" + descripcion + "</p>" +
                          "</p>" +
                          "</div>" +
                          "</div>";
      
      
                      //const image = "img/soldadoss.png";
                      //  var icon = customLabel[codigo] || {};
      
               
      
                      var marker = new google.maps.Marker({
                          map: map,
                          position: point,
                          //icon: image
                      });
                      marker.addListener('click', function() {
                          infoWindow.setContent(contentString);
                          infoWindow.open(map, marker);
                      });
                  });
              });
      
              // Una matriz con las coordenadas de los límites de Bucaramanga, extraídas manualmente de la base de datos GADM
      
             
      }
      
          function downloadUrl(url, callback) {
              var request = window.ActiveXObject ?
                  new ActiveXObject('Microsoft.XMLHTTP') :
                  new XMLHttpRequest;
              request.onreadystatechange = function() {
                  if (request.readyState == 4) {
                      request.onreadystatechange = doNothing;
                      callback(request, request.status);
                  }
              };
              request.open('GET', url, true);
              request.send(null);
          }
      
          function doNothing() {}
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAet6BC3A-TE6toXKEFBxLcFYscszuNKFw&callback=initMap"
              defer>
          </script>
    </body>
</html>
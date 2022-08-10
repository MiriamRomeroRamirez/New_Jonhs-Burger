 <div class="sufee-login d-flex align-content-center flex-wrap">
        
        <div class="container">
      <!-- Example row of columns -->
      
    <div class="row">
        
        <div class="col-md-8">
            <div class="login-content">
                <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px; width:50%;"></div>

        </div>
          
        </div>
        <div class="col-md-4">
        <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <a><img src="vistas/img/plantilla/logo-burger.png" alt="Logo"><h1>Jonh's Burgers</h1></a>
                    </a>
                </div>
                <div class="login-form bg-white">
                    <form method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" id="ingemail" name="ingemail" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="ingpassword" name="ingpassword" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Recordarmelo
                            </label>
                            <label class="pull-right">
                                <a href="#modalPassword" data-dismiss="modal" data-toggle="modal">Olvidastes tu password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Ingresar</button>
                         <?php

$login = new ControladorAdministrador();
$login->ctrIngresoAdministrador();

?>
                    </form>
                </div>
            </div>
          
       </div>
    </div>

      <hr>

      <footer>
        <p>&copy; Company 2022</p>
      </footer>
    </div> <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
</div>



<!--=====================================
VENTANA MODAL PARA OLVIDO DE CONTRASEÑA
======================================-->

<div class="modal fade modalFormulario" id="modalPassword" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="backColor">SOLICITUD DE NUEVA CONTRASEÑA</h4>



            <!--=====================================
            OLVIDO CONTRASEÑA
            ======================================-->

            <form method="post">

                <label class="text-muted">Escribe el correo electrónico con el que estás registrado y allí te enviaremos una nueva contraseña:</label>

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="fa fa-paper-plane"></i>

                        </span>

                        <input type="email" class="form-control input-lg" id="passEmail" name="passEmail" placeholder="Correo Electrónico" required>

                    </div>

                </div>

                <?php

$password = new ControladorAdministrador();
$password->ctrOlvidoPassword();

?>

                <input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

            </form>

        </div>

        <div class="modal-footer">

            ¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>

    </div>

</div>

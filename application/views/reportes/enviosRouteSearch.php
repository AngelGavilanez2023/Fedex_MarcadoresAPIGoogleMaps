<main>
  <div class="clearfix"></div>

    <div class="content-wrapper">
      <br><br>
      <h3><center><b>MAPS RUTA BUSCADOR DE ENVIO</b></center></h3>
      <div class="container">
        <!-- Buscador -->
        <form class="form-inline  text-right" method="post" action="<?php echo site_url(); ?>/reportes/enviosRouteSearch">
          <input type="search" name="search_term" id="search_term" class="form-control mr-sm-2" placeholder="Buscar envios (ID)" aria-label="Buscar"/>
          <button type="submit" class="btn btn-primary"><i class="icon-magnifier"></i></span></i></button>
        </form>
        <br>
        <div class="row">
          <div class="col-md-12">
              <div id="mapaPed" style="height:600px; width:110%; border-radius:25px; border: 5px solid purple;"></div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    function initMap() {
      var centro=new google.maps.LatLng(-0.9169304301515272, -78.63320280199586);
      var mapaPedidos=new google.maps.Map(
        document.getElementById('mapaPed'),
          {
            center:centro,
            zoom:2,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );

    <?php  if($results): ?>
      <?php  foreach($results as $lugarTemporal): ?>
        var coordenadaTemporal=new google.maps.LatLng(<?php echo $lugarTemporal->latitud_suc;?>,<?php echo $lugarTemporal->longitud_suc;?>);
        var marcador = new google.maps.Marker({
          position:coordenadaTemporal,
          title:"<?php echo $lugarTemporal->detalle_env;?>",
          icon: "<?php echo base_url(); ?>/assets/imgFedex/markAmarillo.png",
          map: mapaPedidos
        });

        var coordenadaTemporal1=new google.maps.LatLng(<?php echo $lugarTemporal->latitud_env;?>,<?php echo $lugarTemporal->longitud_env;?>);
        var marcador = new google.maps.Marker({
          position:coordenadaTemporal1,
          title:"<?php echo $lugarTemporal->detalle_env;?>",
          icon: "<?php echo base_url(); ?>/assets/imgFedex/markAmarillo.png",
          map: mapaPedidos
        });

        // Crea una ruta con dos puntos
        var routeCoordinates = [
          { lat: <?php echo $lugarTemporal->latitud_suc;?>, lng: <?php echo $lugarTemporal->longitud_suc;?> }, // Primer punto
          { lat: <?php echo $lugarTemporal->latitud_env;?>, lng: <?php echo $lugarTemporal->longitud_env;?> }  // Segundo punto
        ];

        var routePath = new google.maps.Polyline({
          path: routeCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 5.0,
          strokeWeight: 2
        });
        routePath.setMap(mapaPedidos);
      <?php endforeach; ?>
      <?php endif; ?>
    }//cierre de la funcion
    </script>
</main>

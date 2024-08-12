
<div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">

    <div class="row ">

      <div class="container">
        <div class="container">
  <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <h3><center><b>MAPS DESTINO ENVIOS</b></center></h3>
        <div class="container">
          <!-- PRUEBA DE RUTAS -->
          <a href="<?php echo site_url('reportes/enviosRoute'); ?>">
            <button type="button" class="btn btn-primary"><i class="bi bi-globe" style="font-size: 18px; color:pink"></i>  Ver Rutas </button>
          </a>
          <br>
          <br>
          <!-- FIN BOTON PRUEBA -->
          <div class="row">
              <div class="col-md-12">
                  <div id="mapaPed" style="height:500px; width:100%; border-radius:25px; border: 5px solid purple;"></div>
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

  <?php  if($envios_api): ?>
    <?php  foreach($envios_api as $lugarTemporal): ?>
      var coordenadaTemporal=new google.maps.LatLng(<?php echo $lugarTemporal->latitud_env; ?>,<?php echo $lugarTemporal->longitud_env; ?>);
          var marcador = new google.maps.Marker({
            position:coordenadaTemporal,
            title:"<?php echo $lugarTemporal->id_env; ?>",
            icon: "<?php echo base_url(); ?>/assets/imgFedex/markAmarillo.png",
            map: mapaPedidos
          });
    <?php endforeach; ?>
  <?php endif; ?>

}//cierre de la funcion
</script>

  </div><!--End Row-->

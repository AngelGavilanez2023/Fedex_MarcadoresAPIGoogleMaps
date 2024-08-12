
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
        <h3><center><b>MAPS SUCURSALES</b></center></h3>
        <div class="container">
        <!-- Nuevo buscador -->
        <form class="form-inline  text-right" method="post" action="<?php echo site_url(); ?>/reportes/sucursalesSearch">
          <input type="search" name="search_term" id="search_term" class="form-control mr-sm-2" placeholder="Buscar sucursales (pais)" aria-label="Buscar"/>
          <button type="submit" class="btn btn-primary"><i class="icon-magnifier"></i></span></i></button>
        </form>
    <br>

    <div class="row">
        <div class="col-md-12">
            <div id="mapabase" style="height:500px; width:100%; border-radius:25px; border: 5px solid pink;"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function initMap() {
    var centro=new google.maps.LatLng(-0.9169304301515272, -78.63320280199586);
    var mapaSucursales=new google.maps.Map(
      document.getElementById('mapabase'),
        {
          center:centro,
          zoom:2,
          mapTypeId:google.maps.MapTypeId.ROADMAP
        }
      );

    <?php  if($sucursales_api): ?>
      <?php  foreach($sucursales_api as $lugarTemporal): ?>
        var coordenadaTemporal=new google.maps.LatLng(<?php echo $lugarTemporal->latitud_suc; ?>,<?php echo $lugarTemporal->longitud_suc; ?>);
            var marcador = new google.maps.Marker({
              position:coordenadaTemporal,
              title:"<?php echo $lugarTemporal->nombre_suc; ?>",
              icon: "<?php echo base_url(); ?>/assets/imgFedex/marker_sucursales.png",
              map: mapaSucursales
            });
      <?php endforeach; ?>
    <?php endif; ?>

  }//cierre de la funcion
</script>

  </div><!--End Row-->

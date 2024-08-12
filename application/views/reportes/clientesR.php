
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
        <h3><center><b>MAPS CLIENTES</b></center></h3>
        <div class="container">
    <div class="row"  style="display: flex; align-items:center; justify-content: center; ">
        <div class="col-md-12">
            <div id="mapabase" style="height:500px; width:100%; border-radius:25px; border: solid red;"></div>
        </div>
    </div>
</div>
  <script type="text/javascript">
    function initMap() {
      var centro=new google.maps.LatLng(-0.9169304301515272, -78.63320280199586);
      var mapaClientes=new google.maps.Map(
        document.getElementById('mapabase'),
          {
            center:centro,
            zoom:2,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );

      <?php  if($clientes_api): ?>
        <?php  foreach($clientes_api as $lugarTemporal): ?>
          var coordenadaTemporal=new google.maps.LatLng(<?php echo $lugarTemporal->latitud_cli; ?>,
            <?php echo $lugarTemporal->longitud_cli; ?>);
              var marcador = new google.maps.Marker({
                position:coordenadaTemporal,
                title:"<?php echo $lugarTemporal->apellidos_cli; ?> <?php echo $lugarTemporal->nombres_cli; ?>",
                icon: "<?php echo base_url(); ?>/assets/imgFedex/marker_clientes.png",
                map: mapaClientes
              });
        <?php endforeach; ?>
      <?php endif; ?>

    }//cierre de la funcion
  </script>


  </div><!--End Row-->

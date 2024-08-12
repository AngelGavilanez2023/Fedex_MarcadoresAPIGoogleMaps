<main>
  <div class="clearfix"></div>
    <div class="content-wrapper">
      <div class="row ">
        <div class="container">

          <div class="col-md-12 text-center">
            <h3><center><b>EDITAR ENVÍO</b></center></h3>
            <center><img src="<?php echo base_url('assets/imgFedex/icon_ped.png'); ?>" alt="" style="border-color:brown"></center>
          </div>
        </div>
        <br>

        <div class="container">
          <form class="" id="frm_nuevo_pedido" action="<?php echo site_url(); ?>/Envios/procesarActualizacion" method="post">
            <div class="row">
              <div class="col-md-2">
                <label for="">ID ENVIO</label>
                <!-- <input type="hidden" placeholder="Ingrese matriz" class="form-control"  name="id_cli" value="$valor" readonly id="id_cli"> -->
                <br>
                <input type="Text" readonly class="form-control" name="id_env" id="id_env" value="<?php echo $datos->id_env;?>">
              </div>
              <div class="col-md-2">
                <label for="">ID</label>
                <!-- <input type="hidden" placeholder="Ingrese matriz" class="form-control"  name="id_cli" value="$valor" readonly id="id_cli"> -->
                <br>
                <input type="Text" readonly class="form-control" name="id_cli" id="id_cli" value="<?php echo $datos->id_cli;?>">
              </div>
              <div class="col-md-2">
                <label for="">CLIENTE</label>
                <br>
                <input type="Text" readonly class="form-control" name="nombres_cli" id="nombres_cli" value="<?php echo $datos->nombres_cli;?>">
              </div>
              <div class="col-md-3">
                <label for="">Fecha de envio:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="date" required  class="form-control" name="fecha_envio_env" value="<?php echo $datos->fecha_envio_env;?>" id="fecha_envio_env">
              </div>
              <div class="col-md-3">
                <label for="">Fecha de entrega:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="date"  required class="form-control" name="fecha_entrega_env" value="<?php echo $datos->fecha_entrega_env;?>" id="fecha_entrega_env">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <label for="">Estado del Pedido:</label>
                <br>
                <select type="text" required id="id_est" name="id_est" class="form-control">
                  <option  value="<?php echo $datos->id_est;?>"><?php echo $datos->nombre_est;?></option>
                  <?php foreach ($estados as $valores){ ?>
                      <option  value="<?php echo $valores->id_est;?>"><?php echo $valores->nombre_est;?></option>
                  <?php } ?>
                </select>
                <!-- <input type="" readonly class="form-control" required name="id_est" value="1" id="id_est" > -->
              </div>
              <div class="col-md-3">
                <label for="">Peso de paquete (Kg):
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <br>
                <input type="number" step="0.01" required placeholder="Ingrese el peso del paquete en Kg" class="form-control" name="peso_env" id="peso_env" value="<?php echo $datos->peso_env;?>" >
              </div>
              <div class="col-md-3">
                <label for="">Costo de paquete:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <br>
                <input type="number" step="0.01" required placeholder="Ingrese el costo del paquete" class="form-control" name="costo_env" id="costo_env" value="<?php echo $datos->costo_env;?>" >
              </div>
              <div class="col-md-3">
                <label for="">Detalle de paquete:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <br>
                <input type="text" required placeholder="Ingrese el detalle del paquete" class="form-control" name="detalle_env" id="detalle_env" value="<?php echo $datos->detalle_env;?>" >
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <label for="">SUCURSAL ORIGEN:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <br>
                <select type="text" required id="id_suc" name="id_suc" class="form-control">
                  <option  value="<?php echo $datos->id_suc;?>"><?php echo $datos->nombre_suc;?></option>
                  <?php foreach ($sucursales as $valores){ ?>
                      <option  value="<?php echo $valores->id_suc;?>"><?php echo $valores->nombre_suc;?></option>
                  <?php } ?>
                </select>
                <!-- MAPA -->
                <!-- <label for="">Mapa sucursal</label>
                <div id=mapaSucursalOrigen style="height:200px; width:100%; border-radius:25px; border:solid purple;"></div> -->
              </div>
              <div class="col-md-6">
                <label for="">SUCURSAL DESTINO:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <br>
                <select type="text" required id="destino_env" name="destino_env" class="form-control">
                  <option  value="<?php echo $datos->nombre_suc;?>"><?php echo $datos->nombre_suc;?></option>
                  <?php foreach ($sucursales as $valores){ ?>
                      <option value="<?php echo $valores->nombre_suc;?>"><?php echo $valores->nombre_suc;?> </option>
                  <?php } ?>
                </select>
                <!-- MAPA -->
                <!-- <label for="">Mapa sucursal</label>
                <div id=mapaSucursalDestino style="height:200px; width:100%; border-radius:25px; border:solid purple;"></div> -->
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12 text-center">
                <label for=""><h5>UBICACION EXACTA DE ENTREGA</h5></label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="">Latitud:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <br>
                <input type="text" placeholder="Seleccione en el mapa" class="form-control" readonly  required name="latitud_env" id="latitud_env" value="<?php echo $datos->latitud_env;?>" >
              </div>
              <div class="col-md-6">
                <label for="">Longitud:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <br>
                <input type="text" placeholder="Seleccione en el mapa" class="form-control" readonly required  name="longitud_env" id="longitud_env" value="<?php echo $datos->longitud_env;?>" >
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <label for="">Marque ubicación en el Mapa</label>
                <div id=mapaUbicacion style="height:500px; width:100%; border-radius:25px; border:solid purple;"></div>
              </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" name="button"
                    class="btn btn-primary">
                      Guardar
                    </button>
                    &nbsp;
                    <a href="<?php echo site_url(); ?>/Envios/listado"
                      class="btn btn-danger">
                      Cancelar
                    </a>
                </div>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>

    <!-- <script type="text/javascript">
      function mostrarMapa(latitud_suc, longitud_suc) {
          //Definir y crear coordenada Central
          var coordenadas = {lat: parseFloat(latitud_suc), lng: parseFloat(longitud_suc)};
          var mapOrigen = new google.maps.Map(document.getElementById('mapaSucursalOrigen'), {
              zoom: 5,
              center: coordenadas
          });
          var marker = new google.maps.Marker({
              position: coordenadas,
              map: mapOrigen
          });
      }
    </script>


    <script>
    var selectSucursalOrigen = document.getElementById('id_suc');
    selectSucursal.addEventListener('change', function() {
        var sucursalId = this.value;

        // Realizar una petición AJAX para obtener las coordenadas de la sucursal seleccionada
        var request = new XMLHttpRequest();
        request.open('GET', '<?php echo site_url()?>/EnvioModel/obtener_coordenadas?sucursalId=' + sucursalId, true);
        request.onreadystatechange = function() {
            if (request.readyState === 4 && request.status === 200) {
                var response = JSON.parse(request.responseText);
                if (response.latitud_suc && response.longitud_suc) {
                    mostrarMapa(response.latitud_suc, response.longitud_suc);
                }
            }
        };
        request.send();
    });
    </script> -->

    <script type="text/javascript">
      function initMap(){
        //Definir y crear coordenada Central
        var centro=new google.maps.LatLng(<?php echo $datos->latitud_env;?>, <?php echo $datos->longitud_env;?>);
        //Mapa 3
        //Crear Objeto mapa
        var mapa1=new google.maps.Map(document.getElementById('mapaUbicacion'),
          {
            center:centro,
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        var marcador=new google.maps.Marker({
          position:centro,
          map:mapa1,
          title:"Seleccione la Ubicacion",
          icon:"<?php echo base_url();?>/assets/imgFedex/markRojo.png",
          draggable:true //Arrastrable
        });
        google.maps.event.addListener(marcador,'dragend', function(){
          // alert("Se termino el Drag");
          document.getElementById('latitud_env').value=this.getPosition().lat();
          document.getElementById('longitud_env').value=this.getPosition().lng();
        }); //Esta al pendiente del marcador
      }//Cierre de la funcion Init Map
    </script>

    <!-- //revisa bien el nombre # -->
    <script type="text/javascript">
      $('#frm_nuevo_pedido').validate({
        rules:{
          fecha_envio_env:{
            required:true,
            minlength:10,
            maxlength:10,
          },
          fecha_entrega_env:{
            required:true,
            minlength:3,
            maxlength:150,
          },
          peso_env:{
            required:true,
          },
          costo_env{
            required: true,
          },
          detalle_env{
            required:true,
            minlength:3,
            maxlength:150,
          },
          id_suc:{
            required:true,
          },
          destino_env:{
            required:true,
          },
          latitud_env:{
            required:true,
            minlength:3,
            maxlength:150,
          },
          longitud_env:{
            required:true,
            minlength:3,
            maxlength:150,
          }
        },
        messages:{
          fecha_envio_env:{
            required:"Por Favor ingrese la fecha de ingreso del envío",
            minlength:"Ingrese una fecha correcta",
            maxlength:"Ingrese una fecha correcta",
          },
          fecha_entrega_env:{
            required:"Por Favor ingrese la fecha de entrega del envío",
            minlength:"Ingrese una fecha correcta",
            maxlength:"Ingrese una fecha correcta",
          },
          peso_env:{
            required: "Ingrese el peso del envío",
          },
          costo_env:{
            required: "Ingrese el costo del envío",,
          },
          detalle_env:{
            required: "Ingrese el detalle del envío",,
          },
          id_suc:{
            required:"Por Favor seleccione la sucursal ORIGEN",
          },
          destino_env:{
            required:"Por Favor seleccione la sucursal DESTINO",
          },
          longitud_env:{
            required:"Por Favor ingrese la longitud envío",
          },
          latitud_env:{
            required:"Por Favor ingrese la longitud envío",
          }
        }
      });
    </script>
</main>

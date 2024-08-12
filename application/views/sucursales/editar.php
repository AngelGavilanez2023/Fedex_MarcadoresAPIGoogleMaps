
<div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">

    <div class="row ">
      <div class="container">
        <div class="container">
  <div class="row">
      <div class="col-md-12">
        <h3><center><b>EDITAR SUCURSAL</b></center></h3>
        <center><img src="<?php echo base_url('assets/imgFedex/icon_sucursales.png'); ?>" alt=""></center>
        <form  class="" id="frm_nuevo_sucursal" action="<?php echo site_url();?>/Sucursales/procesarActualizacion" method="post">

        <div class="row">
            <div class="col-md-4">
                <label for="">Nombre:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="text" required placeholder="Ingrese el nombre" class="form-control" name="nombre_suc" value="<?php echo $sucursalEditar->nombre_suc ?>" id="nombre_suc">
            </div>
            <div class="col-md-4">
                <label for="">Direccion:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="text" required placeholder="Ingrese la dirección" class="form-control" name="direccion_suc" value="<?php echo $sucursalEditar->direccion_suc ?>" id="direccion_suc">
            </div>
            <div class="col-md-4">
                <label for="">Ciudad:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="text" required placeholder="Ingrese la ciudad" class="form-control" name="ciudad_suc" value="<?php echo $sucursalEditar->ciudad_suc ?>" id="ciudad_suc">
            </div>
        </div> <!-- </div> FIN ROW 1 -->

        <br>
        <div class="row">
            <div class="col-md-6">
              <label for="">Pais:
                <span class="obligatorio">(Obligatorio)</span>
              </label>
              <br>
              <select type="text" required id="id_pai" name="id_pai" class="form-control">
                <option disabled selected hidden value="">Seleccione el Pais:</option>
                <?php foreach ($paises as $valores){ ?>
                    <option  value="<?php echo $valores->id_pai;?>"><?php echo $valores->nombre_pai;?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
                <label for="">Teléfono:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="number" required placeholder="Ingrese el Nro. telefónico" class="form-control" name="telefono_suc" value="<?php echo $sucursalEditar->telefono_suc ?>" id="telefono_suc">
            </div>
        </div> <!-- FIN ROW 2 -->

        <br>
        <div class="row">
            <div class="col-md-6">
                <label for="">Latitud:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="float" required placeholder="Ingrese la latitud" class="form-control" readonly name="latitud_suc" value="<?php echo $sucursalEditar->latitud_suc ?>" id="latitud_suc">
            </div>
            <div class="col-md-6">
                <label for="">Longitud:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="float" required placeholder="Ingrese la longitud" class="form-control" readonly name="longitud_suc" value="<?php echo $sucursalEditar->longitud_suc ?>" id="longitud_suc">
            </div>
        </div> <!-- FIN ROW 3 -->
        <div class="row">
            <div class="col-md-12">
                <!-- <label for="">FEDEX MATRIZ:</label> -->
                <input type="hidden" required placeholder="Ingrese matriz" class="form-control"  name="id_fed" value="1" readonly id="id_fed">
            </div>
        </div> <!-- FIN ROW 3 -->

        <br>
        <div class="row">
          <div class="col-md-12">
            <label for="" >Marcar (Latitud y Longitud) SUCURSALES:</label>

            <div id="mapaUbicacion" style="height:300px; width:100%; border:2px solid white;"></div>
          </div>
        </div> <!-- FIN ROW 3 -->

        <script type="text/javascript">
          function initMap() {
            var centro=new google.maps.LatLng(-1.6413130933745723,
              -78.64946783526815);
            var mapa1=new google.maps.Map(
              document.getElementById('mapaUbicacion'),
              {
                center:centro,
                zoom:7,
                mapTypeId:google.maps.MapTypeId.ROADMAP
              }

            );
            var marcador = new google.maps.Marker({
              position:centro,
              map:mapa1,
              title:"Seleccione la direccion",
              icon: "<?php echo base_url(); ?>/assets/imgFedex/marker_sucursales.png",
              //CODIGO nuevo
              draggable:true
            });
            //CODIGO nuevo
            google.maps.event.addListener(marcador,
              'dragend',function(){
                // alert("Se termino el DRAG");
                document.getElementById('latitud_suc').value=
                this.getPosition().lat();
                document.getElementById('longitud_suc').value=
                this.getPosition().lng();
            });
          }//fin function init map
        </script>

        <br>
        <div class="col-md-12 text-center">
            <button type="submit" name="buttom" class="btn btn-primary">
                <b>GUARDAR</b>
            </button>
            &nbsp;
            <a href="<?php echo site_url('sucursales/listado'); ?>" class="btn btn-danger">
                <b>CANCELAR</b>
            </a>
        </div>  <!-- FIN ROW 4 -->

</form>

<script type="text/javascript">
    $('#frm_nuevo_sucursal').validate({
      rules:{
        nombre_suc:{
          required:true,
          minlength:10,
          maxlength:150,
        },
        direccion_suc:{
          required:true,
          minlength:3,
          maxlength:150,
        },
        ciudad_suc:{
          required:true,
          minlength:3,
          maxlength:150,
        },
        pais_suc:{
          required:true,
          minlength:3,
          maxlength:150,
        },
        telefono_suc:{
          required:true,
           minlength:10,
           maxlength:10,
           digits:true,
        },
        latitud_suc:{
          required:true,
          minlength:3,
          maxlength:150,
        },
        longitud_suc:{
          required:true,
          minlength:3,
          maxlength:150
        }
      },
      messages:{
        nombre_suc:{
          required:"Por favor ingrese nombre",
          minlength:"El nombre debe tener al menos 5 caracteres",
          maxlength:"Nombre incorrecto",
        },
        direccion_suc:{
          required:"Por favor ingrese una dirección correcta",
          minlength:"Ingrese una dirección correcta",
          maxlength:"Ingrese una dirección correcta",
        },
        pais_suc:{
          required:"Por favor ingresa el pais",
          minlength:"La ciudad debe tener al menos 8 caracteres",
          maxlength:"Ciudad Incorrecta",
        },
        ciudad_suc:{
          required:"Por favor ingresa la ciudad",
          minlength:"La ciudad debe tener al menos 8 caracteres",
          maxlength:"Ciudad Incorrecta",
        },
        telefono_suc:{
          required:"Por favor Ingrese el numero de telefono",
          minlength:"Nro. de telefono incorrecta, ingrese 10 digitos",
          maxlength:"Nro. de telefono incorrecta, ingrese 10 digitos",
          number:"Este campo solo acepta numeros"
        },
        latitud_suc:{
          required:"Por favor ingrese la latitud",
        },
        longitud_suc:{
          required:"Por favor ingrese la longitud",
        }
      }
    });
  </script>
  </div><!--End Row-->

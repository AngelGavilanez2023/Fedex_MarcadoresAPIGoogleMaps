
<div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">

    <div class="row ">
      <div class="container">
    <div class="row">
        <div class="col-md-12">
          <h3><center><b>INGRESAR NUEVO CLIENTE</b></center></h3>
          <center><img src="<?php echo base_url('assets/imgFedex/icon_clientes.png'); ?>" alt=""></center>
          <form  class="" id="frm_nuevo_cliente" action="<?php echo site_url(); ?>/clientes/guardar" method="post">

          <div class="row">
              <div class="col-md-4">
                  <label for="">Cédula:
                    <span class="obligatorio">(Obligatorio)</span>
                  </label>
                  <input type="number" required min="99999999" placeholder="Ingresar cédula" class="form-control" name="cedula_cli" value="" id="cedula_cli">
              </div>
              <div class="col-md-4">
                  <label for="">Apellidos:
                    <span class="obligatorio">(Obligatorio)</span>
                  </label>
                  <input type="text" required placeholder="Ingresar apellidos" class="form-control" name="apellidos_cli" value="" id="apellidos_cli">
              </div>
              <div class="col-md-4">
                  <label for="">Nombres:
                    <span class="obligatorio">(Obligatorio)</span>
                  </label>
                  <input type="text" required placeholder="Ingresar nombres" class="form-control" name="nombres_cli" value="" id="nombres_cli">
              </div>
          </div> <!-- </div> FIN ROW 1 -->

          <br>
          <div class="row">
            <div class="col-md-4">
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
            <div class="col-md-4">
                <label for="">Ciudad:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="text" required placeholder="Ingrese Ciudad" class="form-control" name="ciudad_cli" value="" id="ciudad_cli">
            </div>
            <div class="col-md-4">
                <label for="">Direccion:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <input type="text" required placeholder="Ingresar Dirección" class="form-control" name="direccion_cli" value="" id="direccion_cli">
            </div>
          </div> <!-- FIN ROW 2 -->

          <br>
          <div class="row">
              <div class="col-md-6">
                  <label for="">Teléfono:
                    <span class="obligatorio">(Obligatorio)</span>
                  </label>
                  <input type="number" required placeholder="Ingrese el Teléfono" min="99999999" class="form-control" name="telefono_cli" value="" id="telefono_cli">
              </div>
              <div class="col-md-6">
                <label for="">Email:
                  <span class="obligatorio">(Obligatorio)</span>
                </label>
                <div class="input-group">
                  <span class="input-group-addon" id="sizing-addon2"></span>
                  <input type="text" required class="form-control" placeholder="Ingresar Correo Electronico" aria-describedby="sizing-addon2" name="email_cli" value="" id="email_cli">
                </div>
              </div>

          </div> <!-- FIN ROW 3 -->

          <br>
          <div class="row">
              <div class="col-md-6">
                  <label for="">Latitud:
                    <span class="obligatorio">(Obligatorio)</span>
                  </label>
                  <input type="" required placeholder="Ingrese la latitud" class="form-control" readonly name="latitud_cli" value="" id="latitud_cli">
              </div>
              <div class="col-md-6">
                  <label for="">Longitud:
                    <span class="obligatorio">(Obligatorio)</span>
                  </label>
                  <input type="" required placeholder="Ingrese la longitud" class="form-control" readonly name="longitud_cli" value="" id="longitud_cli">
              </div>
          </div>

          <br>
          <div class="row">
            <div class="col-md-12">
              <label for="" >Marcar (Latitud y Longitud) CLIENTE:</label>
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
                icon: "<?php echo base_url(); ?>/assets/imgFedex/marker_clientes.png",
                //CODIGO nuevo
                draggable:true
              });
              //CODIGO nuevo
              google.maps.event.addListener(marcador,
                'dragend',function(){
                  // alert("Se termino el DRAG");
                  document.getElementById('latitud_cli').value=
                  this.getPosition().lat();
                  document.getElementById('longitud_cli').value=
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
              <a href="<?php echo site_url('clientes/listado'); ?>" class="btn btn-danger">
                  <b>CANCELAR</b>
              </a>
          </div>  <!-- FIN ROW 4 -->
  </form>

  <script type="text/javascript">
  $("#frm_nuevo_cliente").validate({
    rules:{
      cedula_cli:{
        required:true,
        minlength:10,
        maxlength:10,
        digits:true
      },
      apellidos_cli:{
        required:true,
        minlength:3,
        maxlength:150
      },
      nombres_cli:{
        required:true,
        minlength:3,
        maxlength:150
      },
      direccion_cli:{
        required:true,
        minlength:3,
        maxlength:150
      },
      ciudad_cli:{
        required:true,
        minlength:3,
        maxlength:150,
        letras:true

      },
      telefono_cli:{
        required:true,
        minlength:10,
        maxlength:10,
        digits:true

      },
      pais_cli:{
        required:true,
        minlength:3,
        maxlength:150
      },
      latitud_cli:{
        required:true

      },
      longitud_cli:{
        required:true
      }
    },
    messages:{
      cedula_cli:{
        required:"Por favor Ingrese el numero de cedula",
        minlength:"Cedula incorrecta, ingrese 10 digitos",
        maxlength:"Cedula incorrecta, ingrese 10 digitos",
        number:"Este campo solo acepta numeros"
      },
      apellidos_cli:{
        required:"Por favor ingrese el apellido del cliente",
        minlength:"El apellido debe tener al menos 3 caracteres",
        maxlength:"Apellido incorrecto"

      },
      nombres_cli:{
        required:"Por favor ingresa el nombre del cliente",
        minlength:"El nombre debe tener al menos 3 caracteres",
        maxlength:"Nombre incorrecto"

      },
      direccion_cli:{
        required:"Por favor ingresa la Dirección",
        minlength:"La Dirección debe tener al menos 3 caracteres",
        maxlength:"Dirección incorrecta"
      },
      ciudad_cli:{
        required:"Por favor Ingrese la Ciudad",
        minlength:"La ciudad debe tener al menos 3 caracteres",
        maxlength:"Ciudad incorrecta"


      },
      pais_cli:{
        required:"Por favor ingrese el país",
        minlength:"El pais debe tener al menos 3 caracteres",
        maxlength:"Direccion incorrecta"
      },
      telefono_cli:{
        required:"Por favor ingrese el numero de telefono",
        minlength:"La telefono debe tener al menos 10 caracteres",
        maxlength:"Numero incorrecto"
      },
      email_cli:{
        required:"Por favor ingrese el correo electronico",
      },
      latitud_cli:{
        required:"Por favor ingrese la latitud del Cliente",
        maxlength:"Numero incorrecto"
      },
      longitud_cli:{
        required:"Por favor ingrese la longitud del Cliente",
        maxlength:"Numero incorrecto"
      }
    }
  });
</script>

    </div><!--End Row-->

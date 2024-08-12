<div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">

  <!--Start Dashboard Content-->

  <div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"></h5>
                    <div class="" style="height:3px;">
                       <div class="" style="width:55%"></div>
                    </div>
                    <a href="<?php echo site_url('clientes/nuevo'); ?>">
                      <button type="button" class="btn btn-primary">
                        <i class="bi bi-person-add" style="font-size: 22px;"></i>
                        Agregar Clientes</button>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"></h5>
                    <div class="" style="height:3px;">
                       <div class="" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font"></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"></h5>
                    <div class="" style="height:3px;">
                       <div class="" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font"></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"></h5>
                    <div class="" style="height:3px;">
                       <div class="" style="width:55%"></div>
                    </div>
                    <form class="form-inline" method="post" action="<?php echo site_url(); ?>/Clientes/listadoSearch">
                      <div class="form-group">
                        <input type="search" name="search_term" id="search_term" class="form-control" placeholder="Buscar cliente" aria-label="Buscar"/>
                        <button type="submit" class="btn btn-primary"><i class="icon-magnifier"></i></button>
                      </div>

                    </form>
                  <p class="mb-0 text-white small-font"></p>
                </div>
            </div>
        </div>
    </div>
  </div>


	<div class="row">

	 <div class="col-12 col-lg-12">
	   <div class="card">
	     <div class="card-header">
         <h3><center>Listado de Clientes</center></h1>
    		  <div class="card-action">
                 <div class="dropdown">
                 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                 </a>

                  </div>
          </div>
		   </div>
	       <div class="table-responsive">
                 <table class="table align-items-center table-flush   table-bordered table-hover ">

                   <br>
                 <?php if ($clientes): ?>
                         <thead style="background-color: #F03867;">
                             <tr>
                                 <th>ID CLIENTE</th>
                                 <th>CEDULA</th>
                                 <th>APELLIDOS</th>
                                 <th>NOMBRES</th>
                                 <th>DIRECCION</th>
                                 <th>CIUDAD</th>
                                 <th>PAIS</th>
                                 <th>TELEFONO</th>
                                 <th>EMAIL</th>
                                 <th>LATIDUD</th>
                                 <th>LONGITUD</th>
                                 <th>PEDIDO</th>
                                 <th>ACCIONES</th>

                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($clientes as $filaTemporal): ?>
                                 <tr>
                                     <td>
                                         <?php echo $filaTemporal->id_cli; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->cedula_cli; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->apellidos_cli; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->nombres_cli; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->direccion_cli; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->ciudad_cli; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->nombre_pai; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->telefono_cli; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->email_cli; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->latitud_cli; ?>
                                     </td>
                                     <td>
                                         <?php echo $filaTemporal->longitud_cli; ?>
                                     </td>
                                     <td class="text-center">
                                         <!-- <?php $idCliente=$filaTemporal->id_cli?>
                                         <?php $nombre=$filaTemporal->nombres_cli?> -->

                                         <a href="<?php echo site_url(); ?>/Envios/nuevo/<?php echo $filaTemporal->id_cli;?>"
                                           title="NUEVO ENVIO" style="color:purple;"
                                           onclick="return confirm('¿Desea ingresar un pedido para este cliente?');"
                                           style="color:purple;">

                                           <i class="bi bi-truck" style="font-size: 22px; color:pink"></i>
                                         </a>
                                     </td>
                                     <td class="text-center">
                                         <a href="<?php echo site_url(); ?>/Clientes/editar/<?php echo $filaTemporal->id_cli;?>"
                                           title="Editar Cliente"
                                           onclick="return confirm('¿Desea editar los datos de este cliente?');">

                                           <i class="bi bi-pencil-square" style="font-size: 22px;"></i>
                                         </a>
                                         &nbsp;&nbsp;&nbsp;

                                         <a href="<?php echo site_url(); ?>/clientes/eliminar/<?php echo $filaTemporal->id_cli; ?>"
                                           title="Eliminar Cliente" style="color:red;"
                                           onclick="return confirm('Estás seguro que desea eliminar este cliente?');"
                                           style="color:red;">
                                           <i class="bi bi-trash" style="font-size: 22px;"></i>
                                         </a>

                                     </td>
                                 </tr>

                             <?php endforeach; ?>
                         </tbody>

                 <?php else: ?>
                     <h1><center>Ups No hay Clientes</center></h1>
                 <?php endif; ?>

                 </table>
               </div>
	   </div>
	 </div>
	</div><!--End Row-->

      <!--End Dashboard Content-->

	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->

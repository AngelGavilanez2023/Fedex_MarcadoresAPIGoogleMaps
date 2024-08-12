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
                    <a href="<?php echo site_url('clientes/listado'); ?>">
                      <button type="button" class="btn btn-primary">
                        <i class="bi bi-truck" style="font-size: 22px; color:pink"></i>
                        Agregar Envíos </button>
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

                </div>
            </div>
        </div>
    </div>
 </div>



	<div class="row">
	 <div class="col-12 col-lg-12">
	   <div class="card">
	     <div class="card-header">
         <h3><center>Listado De Envíos</center</h3>
    		  <div class="card-action">
                 <div class="dropdown">
                 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                 </a>

                  </div>
          </div>
		   </div>
	       <div class="table-responsive">
                 <table class="table align-items-center table-flush table-bordered table-hover">

                       <br>
                       <?php if ($datos): ?>
                          <thead style="background-color: #B1914D ">
                            <tr>
                              <th>ID ENVIO</th>
                              <th>ID CLIENTE</th>
                              <th>NOMBRE CLIENTE</th>
                              <th>FECHA ENVIO</th>
                              <th>FECHA EST. ENTREGA</th>
                              <th>SUCURSAL ORIGEN</th>
                              <th>SUCURSAL DESTINO</th>
                              <th>ESTADO ACTUAL</th>
                              <th>PESO KG</th>
                              <th>ACCIONES</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($datos as $filaTemporal): ?>
                              <tr>
                                <td><?php echo $filaTemporal->id_env?></td>
                                <td><?php echo $filaTemporal->id_cli?></td>
                                <td><?php echo $filaTemporal->nombres_cli?></td>
                                <td><?php echo $filaTemporal->fecha_envio_env?></td>
                                <td><?php echo $filaTemporal->fecha_entrega_env?></td>

                                <td><?php echo $filaTemporal->nombre_suc?></td>
                                <td><?php echo $filaTemporal->destino_env?></td>

                                <td><?php echo $filaTemporal->nombre_est?></td>
                                <td><?php echo $filaTemporal->peso_env?></td>

                                <td class="text-center">
                                  <a href="<?php echo site_url("Reportes/enviosRouteSel/$filaTemporal->id_env")?>" title="Ver Ruta Envio">
                                    <i class="bi bi-globe-americas"></i>
                                  </a>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a href="<?php echo site_url("envios/editar/$filaTemporal->id_env")?>" title="Editar Envio" onclick="return confirm ('¿Esta seguro que desea editar este envio?');">
                                    <i class="bi bi-pencil-square"></i>
                                  </a>

                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a href="<?php echo site_url("Envios/eliminar/$filaTemporal->id_env")?>"  title="Eliminar Envio" onclick="return confirm ('¿Esta seguro que desea eliminar este pedido?');" style="color:red">
                                   <i class="bi bi-trash"></i>
                                 </a>
                               </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      <?php else: ?>
                        <h1><center>Ups No existen Envíos</center></h1>
                      <?php endif; ?>
                    </div>

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

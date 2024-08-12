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
                    <a href="<?php echo site_url('sucursales/nuevo'); ?>">
                      <button type="button" class="btn btn-primary">
                        <i class="bi bi-house-add"style="font-size: 22px;"></i>
                        Agregar Sucursales</button>
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
         <h3><center>Listado Sucursales</center</h3>
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
                       <?php if ($sucursales): ?>
                               <thead style="background-color: #DF3DBF;">
                                   <tr>
                                       <th>ID</th>
                                       <th>NOMBRE</th>
                                       <th>DIRECCION</th>
                                       <th>CIUDAD</th>
                                       <th>PAIS</th>
                                       <th>TELEFONO</th>
                                       <th>LATITUD</th>
                                       <th>LONGITUD</th>
                                       <th>ACCIONES</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <?php foreach ($sucursales as $filaTemporal): ?>
                                       <tr>
                                           <td>
                                               <?php echo $filaTemporal->id_suc; ?>
                                           </td>
                                           <td>
                                               <?php echo $filaTemporal->nombre_suc; ?>
                                           </td>
                                           <td>
                                               <?php echo $filaTemporal->direccion_suc; ?>
                                           </td>
                                           <td>
                                               <?php echo $filaTemporal->ciudad_suc; ?>
                                           </td>
                                           <td>
                                               <?php echo $filaTemporal->nombre_pai; ?>
                                           </td>
                                           <td>
                                               <?php echo $filaTemporal->telefono_suc; ?>
                                           </td>
                                           <td>
                                               <?php echo $filaTemporal->latitud_suc; ?>
                                           </td>
                                           <td>
                                               <?php echo $filaTemporal->longitud_suc; ?>
                                           </td>

                                           <td class="text-center">

                                               <a href="<?php echo site_url(); ?>/Sucursales/editar/<?php echo $filaTemporal->id_suc;?>"
                                                 title="Editar Sucursal"
                                                 onclick="return confirm('¿Desea editar los datos de esta Sucursal?');"
                                                 <i class="bi bi-pencil-square" style="font-size: 22px;"></i>
                                               </a>
                                               &nbsp;&nbsp;&nbsp;

                                               <a href="<?php echo site_url(); ?>/sucursales/eliminar/<?php echo $filaTemporal->id_suc; ?>"
                                                 title="Eliminar Sucursal" style="color:red;"
                                                 onclick="return confirm('Estás seguro de eliminar esta sucursal?');"
                                                 style="color:red;">
                                                 <i class="bi bi-trash" style="font-size: 22px;"></i>
                                               </a>

                                           </td>
                                       </tr>

                                   <?php endforeach; ?>
                               </tbody>

                       <?php else: ?>
                           <h1><center>Ups No existen sucursales</center></h1>
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

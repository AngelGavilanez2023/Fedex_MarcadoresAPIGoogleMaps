<script type="text/javascript">
	$("#menu-tipos").addClass("mm-active");
  // $("#submenu-destinatarios").addClass("mm-active");
  // $("#menu-desechos-peligrosos").attr("aria-expanded","true");
  // $("#menu-desechos-peligrosos").parent().addClass("mm-active");
</script>


      <div class="page-title-heading">
          <div class="page-title-icon">
              <i class="pe-7s-albums">
              </i>
          </div>
          <div>
						Tipos
          </div>
      </div>

		</div>
	</div>





  <?php
  foreach($css_files as $file): ?>
     <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

  <?php endforeach; ?>


  <?php foreach($js_files as $file): ?>

     <script src="<?php echo $file; ?>"></script>
  <?php endforeach; ?>

	<div class="row">
  	<div class="col-md-11">
  		<?php echo $output; ?>
  	</div>
  </div>
</div>
  <script>
     $("input").prop("accept","image/*");
		 setTimeout(
		 function(){
			 $("#cke_field-descripcion_tip").css("width","100px !important");
		 },1000);
  </script>

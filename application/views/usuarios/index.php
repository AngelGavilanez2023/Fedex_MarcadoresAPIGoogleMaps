<script type="text/javascript">
	$("#menu-usuarios").addClass("mm-active");
  // $("#submenu-destinatarios").addClass("mm-active");
  // $("#menu-desechos-peligrosos").attr("aria-expanded","true");
  // $("#menu-desechos-peligrosos").parent().addClass("mm-active");
</script>


      <div class="page-title-heading">
          <div class="page-title-icon">
              <i class="pe-7s-users">
              </i>
          </div>
          <div>
						Usuarios
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


  <?php echo $output; ?>

</div>
  <script>
     $("input").prop("accept","image/*");
  </script>


<script type="text/javascript">
    $("#ingresar").addClass("active");
</script>

<section class="our-facts">
  <div class="section-heading">
    <h2 style="font-size: 23px"><center>Ingresar al sistema</center></h2>
  </div>
   <div class="container" style=" border-radius: 35px; border: solid white;   justify-content: center; width: 400px ; font-size: 17px">
       <form action="<?php echo site_url('/seguridad/autenticar');  ?>"  method="post" style="padding-left:30px; padding-right:30px; padding-bottom:30px; padding-top: 30px;">
       <center><img src="<?php echo base_url('assets/imgFedex/icon_login.png'); ?>"style="height:90px; width:90px" alt=""></center>

       <div class="form-group row">
         <label for="text1" class="col-4 col-form-label" style="color:white;">Email:</label>
         <input id="email" name="email" placeholder="Ingrese su email" type="text" class="form-control input-sm " required style="border:1px solid #C5C5FF; font-size: 17px;">
       </div>
       <div class="form-group row">
           <label for="text" class="col-4 col-form-label" style="color:white;">Contraseña:</label>
           <input id="clave" name="clave" placeholder="Ingrese su Contraseña" type="password" class="form-control input-sm " required style="border:1px solid #C5C5FF; font-size: 17px">
       </div>
       <div class="form-group row">
         <label for="text" class="col-4 col-form-label"></label>
           <button name="submit" type="submit" class="btn btn-light btn-lg btn-block" style="background-color:#C5C5FF; border-radius:15px;">
             <i class="bi bi-box-arrow-in-right"></i>
             <b style="font-size: 16px; color:black;">Ingresar al Sistema</b>
           </button>
       </div>

</form>

     </div>
 </section>





<?php if ($this->session->flashdata('email')): ?>
  <script type="text/javascript">
      iziToast.error({
        title: 'Error',
        message: 'El email o contraseña ingresados son incorrectos',
        position:'topRight'
      });
      $("#email").val("<?php echo $this->session->flashdata('email'); ?>");
      $("clave").focus();
  </script>
<?php endif; ?>


<!--
<?php if ($this->session->flashdata('salir')): ?>
  <script type="text/javascript">
      iziToast.info({
        title: 'Información',
        message: '<?php echo $this->session->flashdata('salir'); ?>',
        position:'topRight'
      });
  </script>
<?php endif; ?> -->

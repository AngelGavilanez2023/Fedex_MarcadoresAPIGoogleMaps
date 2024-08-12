<?php

	$this->set_css($this->default_theme_path.'/flexigrid/css/flexigrid.css');
	$this->set_js_lib($this->default_theme_path.'/flexigrid/js/jquery.form.js');
    $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
	$this->set_js_config($this->default_theme_path.'/flexigrid/js/flexigrid-add.js');

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<div class="flexigrid crud-form" style='width: 100%;' data-unique-hash="<?php echo $unique_hash; ?>">
	<div class="mDiv">
		<div class="ftitle" style=" color:white; background-color:#6C757D;">
			<div class='ftitle-center' style="text-transform: uppercase;">
				 <i class="fa fa-save"></i> <?php echo $this->l('form_add'); ?> <?php echo $subject?>
			</div>
			<div class='clear'></div>
		</div>
		<!-- <div title="<?php echo $this->l('minimize_maximize');?>" class="ptogtitle">
			<span></span>
		</div> -->
	</div>
<div id='main-table-box'>
	<?php echo form_open( $insert_url, 'method="post" id="crudForm"  enctype="multipart/form-data"'); ?>
		<div class='form-div'>
			<?php
			$counter = 0;
				foreach($fields as $field)
				{
					$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
					$counter++;
			?>
			<div class='row form-field-box <?php echo $even_odd?>' id="<?php echo $field->field_name; ?>_field_box">
				<div class='col-md-3 form-display-as-box' id="<?php echo $field->field_name; ?>_display_as_box">
					<b><?php echo $input_fields[$field->field_name]->display_as; ?></b> <?php echo ($input_fields[$field->field_name]->required)? "<span class='required requerido'> *</span> " : ""; ?> :
				</div>
				<div class='col-md-8 form-input-box' id="<?php echo $field->field_name; ?>_input_box">
					<?php echo $input_fields[$field->field_name]->input?>
				</div>
				<div class='clear'></div>
			</div>
			<?php }?>
			<!-- Start of hidden inputs -->
				<?php
					foreach($hidden_fields as $hidden_field){
						echo $hidden_field->input;
					}
				?>
			<!-- End of hidden inputs -->
			<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>

			<div class="row">
				<div class="col-md-3">

				</div>
				<div class="col-md-8">
					<div id='report-error' class='report-div error'></div>
					<div id='report-success' class='report-div success'></div>
				</div>
			</div>





		</div>
		<div class="pDiv">
			<div class="row">


		<div class="col-md-3">

		</div>

		<div class="col-md-8">
			<!-- <div class='form-button-box'>
				<input id="form-button-save" type='submit' value='<?php echo $this->l('form_save'); ?>'  class="btn btn-large"/>
			</div> -->
<?php 	if(!$this->unset_back_to_list) { ?>
			<div class='form-button-box'>
				<button type="button" name="button"  id="save-and-go-back-button"  class="btn btn-large btn-success">
					<!-- <?php echo $this->l('form_save_and_go_back'); ?> -->
					&nbsp; &nbsp; &nbsp; <b> <i class="fa fa-save"></i> Guardar </b> &nbsp; &nbsp; &nbsp;
				</button>
			</div>
			<div class='form-button-box'>

				<button type="button" name="button"  id="cancel-button" class="btn btn-large btn-warning" style="color:white;">
						<!-- <?php echo $this->l('form_cancel'); ?> -->
						&nbsp; &nbsp; &nbsp; <b> <i class="fa fa-times"></i> Cancelar </b> &nbsp; &nbsp; &nbsp;
				</button>
			</div>
<?php 	} ?>
			<div class='form-button-box'>
				<div class='small-loading' id='FormLoading'><?php echo $this->l('form_insert_loading'); ?></div>
			</div>
			<div class='clear'></div>
		</div>
		</div>
		</div>
	<?php echo form_close(); ?>
</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_add_form = "<?php echo $this->l('alert_add_form')?>";
	var message_insert_error = "<?php echo $this->l('insert_error')?>";
</script>


<script type="text/javascript">
	$(".form-control").prop("placeholder","Por favor complete este campo");
</script>

<style media="screen">
		input{
			height:35px !important;
			border-radius:20px !important;
			padding-left: 10px !important;
			width:100% !important;
			border:1px solid #6C757D !important;
		}
</style>

<?php

	$column_width = (int)(80/count($columns));

	if(!empty($list)){
?><div class="bDiv" >
	<div class="row">
		<div class="col-md-12">

	<div class="table-responsive">
		<table cellspacing="0" cellpadding="0" border="0" id="flex1" class="">
		<thead>
			<tr class='hDiv' style="color:black;">
				<?php foreach($columns as $column){?>
				<th style="border:1px solid black;" width='<?php echo $column_width?>%'>
					<div class="text-center field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]?><?php }?>"
						rel='<?php echo $column->field_name?>'>
						<?php echo $column->display_as?>
					</div>
				</th>
				<?php }?>
				<?php if(!$unset_delete || !$unset_edit || !$unset_read || !$unset_clone || !empty($actions)){?>
				<th style="border:1px solid black;" align="center" abbr="tools" axis="col1" class="" width='20%'>
					<div class="text-center">
						<?php echo $this->l('list_actions'); ?>
					</div>
				</th>
				<?php }?>
			</tr>
		</thead>
		<tbody>

<?php foreach($list as $num_row => $row){ ?>
		<?php $iAuxiliarList=1; ?>
		<tr  <?php if($num_row % 2 == 1){?>class="erow"<?php }?>>
			<?php foreach($columns as $column){?>
			<td style="border:1px solid black;" width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>'>
				<div

				<?php if ($iAuxiliarList==1): ?>
						 class='text-center'
				<?php else: ?>
						 class='text-center'
				<?php endif; ?>

			  <?php $iAuxiliarList++; ?>


				><?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?></div>
			</td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td align="center" width='20%' class="text-center" style="border:1px solid black;">
				<div class='tools text-center'>
				<center>

					<?php if(!$unset_read){?>
						<a href='<?php echo $row->read_url?>'
							title='<?php echo $this->l('list_view')?> <?php echo $subject?>'
							class="edit_button">
							<span class='fa fa-eye'></span>
					 </a>
					<?php }?>

					<?php if(!$unset_edit){?>
						<a href='<?php echo $row->edit_url?>'
							title='<?php echo $this->l('list_edit')?> <?php echo $subject?>'
							 class="edit_button">
							 <span class='fa fa-pen'></span>
						 </a>
				<?php }?>

					<?php if(!$unset_delete){?>
											<a href='<?php echo $row->delete_url?>'
												 title='<?php echo $this->l('list_delete')?> <?php echo $subject?>'
												 class="delete-row" >
													<i class="fa fa-trash"> </i>
											</a>
										<?php }?>

										<?php if(!$unset_clone){?>
												<a href='<?php echo $row->clone_url?>'
													 title='Clone <?php echo $subject?>'
													 class="clone_button btn btn-light">
													 <span class='clone-icon'></span>
												</a>
										<?php }?>

					<?php
					if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){
							$action = $actions[$action_unique_id];
					?>
							<a href="<?php echo $action_url; ?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>"><?php
								if(!empty($action->image_url))
								{
									?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label?>" /><?php
								}
							?></a>
					<?php }
					}
					?>


				</center>
                    <div class='clear'></div>
				</div>
			</td>
			<?php }?>
		</tr>
<?php } ?>
		</tbody>
		</table>
		</div>
		</div>
		</div>
	</div>
<?php }else{?>
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->l('list_no_items'); ?>
	<br/>
	<br/>
<?php }?>


<style media="screen">
		th{
			vertical-align: middle !important;
			border: 1px solid white;
			text-transform: uppercase;
		}
</style>

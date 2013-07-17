<div class="span12">
	<?php if ($data->statement_letter != '') { ?>
		<embed src="<?php echo 'upload/sppd/'.$data->support_letter;?>" width="970" height="275">
	<?php } else {
		echo 'File belum diupload';
	} ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Upload',
		    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		    'size'=>'large', // null, 'large', 'small' or 'mini'
		    'url'=>array('upload','id'=>$data->id),
		)); ?>
	</div>	
</div>	
<?php
/* @var $this KasController */
/* @var $data Kas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_kas')); ?>:</b>
	<?php echo CHtml::encode($data->code_kas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kas')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_proyek')); ?>:</b>
	<?php echo CHtml::encode($data->code_proyek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proyek_desc')); ?>:</b>
	<?php echo CHtml::encode($data->proyek_desc); ?>
	<br />


</div>
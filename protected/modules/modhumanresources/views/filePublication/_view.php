<?php
/* @var $this FilePublicationController */
/* @var $data FilePublication */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version_date')); ?>:</b>
	<?php echo CHtml::encode($data->version_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_upload')); ?>:</b>
	<?php echo CHtml::encode($data->file_upload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('craeted_by')); ?>:</b>
	<?php echo CHtml::encode($data->craeted_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />


</div>
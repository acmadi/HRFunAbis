<?php
/* @var $this ElbicodeController */
/* @var $data Elbicode */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('elbi')); ?>:</b>
	<?php echo CHtml::encode($data->elbi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('elbi_desc')); ?>:</b>
	<?php echo CHtml::encode($data->elbi_desc); ?>
	<br />


</div>
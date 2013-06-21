<?php
/* @var $this PersonelMandaysController */
/* @var $data PersonelMandays */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode(Finance::model()->getMonth($data->month)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mandays')); ?>:</b>
	<?php echo CHtml::encode($data->mandays); ?>
	<br />


</div>
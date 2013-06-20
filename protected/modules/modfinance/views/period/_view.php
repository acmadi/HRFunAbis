<?php
/* @var $this PeriodController */
/* @var $data Period */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_tag')); ?>:</b>
	<?php echo CHtml::encode($data->period_tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_start')); ?>:</b>
	<?php echo CHtml::encode($data->period_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_finish')); ?>:</b>
	<?php echo CHtml::encode($data->period_finish); ?>
	<br />


</div>
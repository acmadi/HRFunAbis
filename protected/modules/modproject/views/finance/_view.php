<?php
/* @var $this FinanceController */
/* @var $data Finance */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_number')); ?>:</b>
	<?php echo CHtml::encode($data->project_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('elbi')); ?>:</b>
	<?php echo CHtml::encode($data->elbi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('elbi_desc')); ?>:</b>
	<?php echo CHtml::encode($data->elbi_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_month')); ?>:</b>
	<?php //echo CHtml::encode($data->period_month); ?>
	<?php echo CHtml::encode(Finance::model()->getMonth($data->period_month)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit')); ?>:</b>
	<?php echo CHtml::encode($data->debit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit')); ?>:</b>
	<?php echo CHtml::encode($data->credit); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	*/ ?>

</div>
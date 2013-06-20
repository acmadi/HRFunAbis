<?php
/* @var $this ProcurementController */
/* @var $data Procurement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_number')); ?>:</b>
	<?php echo CHtml::encode($data->project_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendor')); ?>:</b>
	<?php echo CHtml::encode($data->vendor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract')); ?>:</b>
	<?php echo CHtml::encode($data->contract); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_start_date')); ?>:</b>
	<?php echo CHtml::encode($data->contract_start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_end_date')); ?>:</b>
	<?php echo CHtml::encode($data->contract_end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_month')); ?>:</b>
	<?php echo CHtml::encode($data->period_month); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('item')); ?>:</b>
	<?php echo CHtml::encode($data->item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_price')); ?>:</b>
	<?php echo CHtml::encode($data->unit_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_price')); ?>:</b>
	<?php echo CHtml::encode($data->total_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	*/ ?>

</div>
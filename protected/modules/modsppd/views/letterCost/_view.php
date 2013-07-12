<?php
/* @var $this LetterCostController */
/* @var $data LetterCost */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('airport_tax_cost')); ?>:</b>
	<?php echo CHtml::encode($data->airport_tax_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('airport_tax_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->airport_tax_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('laundry_cost')); ?>:</b>
	<?php echo CHtml::encode($data->laundry_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('laundry_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->laundry_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('airline_cost')); ?>:</b>
	<?php echo CHtml::encode($data->airline_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('airline_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->airline_quantity); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_cost')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transportation_cost')); ?>:</b>
	<?php echo CHtml::encode($data->transportation_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transportation_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->transportation_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_to_cost')); ?>:</b>
	<?php echo CHtml::encode($data->from_to_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_to_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->from_to_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lumpsum_cost')); ?>:</b>
	<?php echo CHtml::encode($data->lumpsum_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lumpsum_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->lumpsum_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	*/ ?>

</div>
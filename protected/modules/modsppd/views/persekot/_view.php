<?php
/* @var $this PersekotController */
/* @var $data Persekot */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sppd_id')); ?>:</b>
	<?php echo CHtml::encode($data->sppd_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paid_to')); ?>:</b>
	<?php echo CHtml::encode($data->paid_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('received_from')); ?>:</b>
	<?php echo CHtml::encode($data->received_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount_in_words')); ?>:</b>
	<?php echo CHtml::encode($data->amount_in_words); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_giro_date')); ?>:</b>
	<?php echo CHtml::encode($data->check_giro_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('check_giro_number')); ?>:</b>
	<?php echo CHtml::encode($data->check_giro_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_code')); ?>:</b>
	<?php echo CHtml::encode($data->currency_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_code')); ?>:</b>
	<?php echo CHtml::encode($data->bank_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('journal_number')); ?>:</b>
	<?php echo CHtml::encode($data->journal_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voucher_number')); ?>:</b>
	<?php echo CHtml::encode($data->voucher_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voucher_date')); ?>:</b>
	<?php echo CHtml::encode($data->voucher_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	*/ ?>

</div>
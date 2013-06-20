<?php
/* @var $this KasSaldoController */
/* @var $data KasSaldo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_kas')); ?>:</b>
	<?php echo CHtml::encode($data->code_kas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('akumulasi_saldo')); ?>:</b>
	<?php echo CHtml::encode($data->akumulasi_saldo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transaksi')); ?>:</b>
	<?php echo CHtml::encode($data->transaksi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	*/ ?>

</div>
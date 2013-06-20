<?php
/* @var $this RekeningController */
/* @var $data Rekening */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('akun')); ?>:</b>
	<?php echo CHtml::encode($data->akun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_rek')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_rek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank')); ?>:</b>
	<?php echo CHtml::encode($data->bank); ?>
	<br />


</div>
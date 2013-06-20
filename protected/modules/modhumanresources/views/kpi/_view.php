<?php
/* @var $this KpiController */
/* @var $data Kpi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finish')); ?>:</b>
	<?php echo CHtml::encode($data->finish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sasaran_kerja')); ?>:</b>
	<?php echo CHtml::encode($data->sasaran_kerja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bentuk_target')); ?>:</b>
	<?php echo CHtml::encode($data->bentuk_target); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bobot')); ?>:</b>
	<?php echo CHtml::encode($data->bobot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai')); ?>:</b>
	<?php echo CHtml::encode($data->nilai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_kinerja')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_kinerja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	*/ ?>

</div>
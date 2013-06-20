<?php
/* @var $this TestTableController */
/* @var $data TestTable */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('test')); ?>:</b>
	<?php echo CHtml::encode($data->test); ?>
	<br />


</div>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->department), array('view', 'id'=>$data->department)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_office')); ?>:</b>
	<?php echo CHtml::encode($data->branch_office); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>
<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_en')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->status_en), array('view', 'id'=>$data->status_en)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>
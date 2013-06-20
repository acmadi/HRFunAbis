<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_type')); ?>:</b>
	<?php echo CHtml::encode($data->request_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_date')); ?>:</b>
	<?php echo CHtml::encode($data->request_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_by')); ?>:</b>
	<?php echo CHtml::encode($data->request_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_phone_email')); ?>:</b>
	<?php echo CHtml::encode($data->request_phone_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_division')); ?>:</b>
	<?php echo CHtml::encode($data->request_division); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_issue')); ?>:</b>
	<?php echo CHtml::encode($data->request_issue); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('request_description')); ?>:</b>
	<?php echo CHtml::encode($data->request_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_solved_by')); ?>:</b>
	<?php echo CHtml::encode($data->request_solved_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_answer')); ?>:</b>
	<?php echo CHtml::encode($data->request_answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_attachment')); ?>:</b>
	<?php echo CHtml::encode($data->request_attachment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_close_date')); ?>:</b>
	<?php echo CHtml::encode($data->request_close_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	*/ ?>

</div>
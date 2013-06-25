<div class="row-fluid">
  <div class="span6">
  
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Project",
		));
		
	?>

	<?php
		 $this->widget('editable.EditableDetailView', array(
		'data' => $model,
		//you can define any default params for child EditableFields
		'url' => $this->createUrl('project/ajaxupdate'), //common submit url for all fields
		'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
		'emptytext' => 'no value',
		'attributes'=>array(
			'number',
			'name',
			'owner',
			'description',
			'version',
			'version_date',
			'status',
			'status_date',
			'location',
			)
		));
	?>

	<?php $this->endWidget();?>
  </div>
  <div class="span6">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Project",
		));
		
	?>

	<?php
		 $this->widget('editable.EditableDetailView', array(
		'data' => $model,
		//you can define any default params for child EditableFields
		'url' => $this->createUrl('project/ajaxupdate'), //common submit url for all fields
		'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
		'emptytext' => 'no value',
		'attributes'=>array(
			'location',
			'plan_start_date',
			'plan_end_date',
			'act_start_date',
			'act_end_date',
			'duration',
			'spmk_date',
			'amount',
			'pic',
			)
		));
	?>
	<?php $this->endWidget();?>
	</div>	
</div>	
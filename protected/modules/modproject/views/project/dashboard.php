<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
);
?>

<div class="row-fluid">
  <div class="span9">
  	<?php $this->widget('application.extensions.projectSCurve.ProjectSCurve');?>
	
	<?php
		// $this->beginWidget('zii.widgets.CPortlet', array(
			// 'title'=>"<i class='icon-user'></i> S Curve",
		// ));
		
	?>
  	<?php 
		// $this->widget('application.extensions.morris.MorrisChartWidget', array(
			// 'id'      => 'myChartElement',
			// 'options' => array(
				// 'chartType' => 'Line',
				// 'data'      => array(
					// array('y' => 2006, 'a' => 100, 'b' => 90),
					// array('y' => 2007, 'a' => 40, 'b' => 60),
					// array('y' => 2008, 'a' => 50, 'b' => 10),
					// array('y' => 2009, 'a' => 60, 'b' => 50),
					// array('y' => 2010, 'a' => 60, 'b' => 40),
				// ),
				// 'xkey'      => 'y',
				// 'ykeys'     => array('a', 'b'),
				// 'labels'    => array('Plan', 'Actual'),
			// ),
		// ));
	?>	
	<?php //$this->endWidget();?>
  </div>
  <div class="span3">
		<?php $this->widget('ext.egauge.EGauge',array('value'=>$model->progress));?>	
  </div>
</div>

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
<div class="row-fluid">
	<div class="span12">
	
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Detail",
		));
		
	?>
	
	<?php 
	$tabs = array(
		array('id' => 'tab1', 'label' => 'Progress', 'content' => $this->renderPartial('pages/_progress', array('data' => $progress), true), 'active' => true),
		array('id' => 'tab2', 'label' => 'Task', 'content' => $this->renderPartial('pages/_tasks', array('data' => $tasks), true), 'active' => false),
		array('id' => 'tab3', 'label' => 'Document', 'content' => $this->renderPartial('pages/_tasks', array('data' => $tasks), true), 'active' => false),
		array('id' => 'tab4', 'label' => 'Finance', 'content' => $this->renderPartial('pages/_tasks', array('data' => $tasks), true), 'active' => false),
		array('id' => 'tab5', 'label' => 'Procurement', 'content' => $this->renderPartial('pages/_tasks', array('data' => $tasks), true), 'active' => false),
	);

	$this->widget('bootstrap.widgets.TbWizard', array(
		'id' => 'mytabs',
		'type' => 'tabs',
		'placement'=> 'top',
		'tabs' => $tabs,
		//'htmlOptions' => array('class'=>'span20'),
	));
	?>

	<?php $this->endWidget();?>
	</div>
</div>	


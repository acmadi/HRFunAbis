<?php
$this->breadcrumbs=array(
	'Menu Nesteds'=>array('index'),
	$model->title,
);

$this->menu=array(
	// array('label'=>'List Organization', 'url'=>array('index')),
	// array('label'=>'Create Organization', 'url'=>array('create')),
	array('label'=>'Update', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Delete Organization', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage Organization', 'url'=>array('admin')),
	array('label'=>'Add KPI', 'url'=>array('kpi/create', 'id_org'=>$model->id)),
);
?>

<h3><?php echo Yii::t('ui', 'View Organization #');?><?php echo $model->id; ?></h3>

<?php $this->renderPartial('../flashMessage/flash_message_detail');?>
<br>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'title',
		// 'lft',
		// 'url',
		// 'visible',
		// 'task',
		array(
		'name'=>'pic',
		'value'=>Employee::model()->getName($model->pic),
		),
	),
)); ?>


<br>
<h3><?php echo Yii::t('ui', 'KPI');?></h3>

<?php echo CHtml::ajaxLink(Yii::t('kpi','Create Entries'),array('kpi/addNew', 'id_org'=>$model->id),
								array('onclick'=>'$("#entriesDialog").dialog("open"); return false;',
									   'update'=>'#entriesDialog'
									),array('id'=>'showEntriesDialog'));?>
									
<br>
<br>
<?php $this->renderPartial('_kpi',array('kpi'=>$kpi,)); ?>

<div class = "grid_16">
	<div id="entriesDialog"></div>
</div>
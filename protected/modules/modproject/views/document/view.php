<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'Create Document', 'url'=>array('create')),
	array('label'=>'Update Document', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Document', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Document', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>View Document #<?php echo $model->id; ?></h1>
</div>

<?php $this->widget('editable.EditableDetailView', array(
	'data'=>$model,
	'url' => $this->createUrl('document/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'project_number',
		'type',
		'task_id',
		'document_number',
		'version',
		'version_date',
		'owner',
		'distribution',
		'document_description',
		'file_attached',
		'created_date',
		'created_by',
	),
)); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'info', 'type'=>'primary', 'label'=>'Download','url'=>array('document/download', 'id' => $model->id))); ?>
	</div>

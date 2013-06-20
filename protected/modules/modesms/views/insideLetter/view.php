<?php
/* @var $this InsideLetterController */
/* @var $model InsideLetter */

$this->breadcrumbs=array(
	'Inside Letters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List InsideLetter', 'url'=>array('index')),
	array('label'=>'Create InsideLetter', 'url'=>array('create')),
	array('label'=>'Update InsideLetter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InsideLetter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InsideLetter', 'url'=>array('admin')),
);
?>
<div class="well well-small">
<h1>Surat #<?php echo $model->number; ?></h1>
</div>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Kop Surat')); ?>
<?php
	 $this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('insideLetter/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'number',
		'subject',
		'date',
		'version',
		'version_date',
	   )
	));
?>
<?php $this->endWidget(); ?>
	
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Dari dan Ke')); ?>
<?php
	 $this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('insideLetter/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'inisiator',
		'ferivicator',
		'to_company',
		'to_contact',
		'to_position',
		'to_address',
	   )
	));
?>
<?php $this->endWidget(); ?>
	
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Isi')); ?>	
<?php 
	$this->widget('application.extensions.cleditor.ECLEditor', array(
		'model'=>$model,
		'attribute'=>'content', //Model attribute name. Nome do atributo do modelo.
		'options'=>array(
			'width'=>'850',
			'height'=>500,
			'useCSS'=>true,
		),
		'value'=>$model->content, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
	));
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttons'=>array(
		array('label'=>'Export to Pdf', 'url'=>array('/modesms/insideLetter/viewPdf&id='.$model->id), 'htmlOptions'=>array('target'=>'_blank'))
	),
)); ?>

<?php $this->endWidget(); ?>	
<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
	$tabParameters['tab1'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
<?php
/* @var $this OutsideLetterController */
/* @var $model OutsideLetter */

$this->breadcrumbs=array(
	'Outside Letters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OutsideLetter', 'url'=>array('index')),
	array('label'=>'Create OutsideLetter', 'url'=>array('create')),
	array('label'=>'Update OutsideLetter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OutsideLetter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OutsideLetter', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Surat Masuk : <?php echo $model->number; ?></h1>
</div>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Kop Surat')); ?>
<?php
	 $this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('outsideLetter/ajaxupdate'), //common submit url for all fields
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
	'url' => $this->createUrl('outsideLetter/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'to',
		'to_division',
		'from_company',
		'from_contact',
		'from_position',
	   )
	));
?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Isi Surat')); ?>
<?php 
	$this->widget('application.extensions.cleditor.ECLEditor', array(
		'model'=>$model,
		'attribute'=>'summary', //Model attribute name. Nome do atributo do modelo.
		'options'=>array(
			'width'=>'850',
			'height'=>250,
			'useCSS'=>true,
		),
		'value'=>$model->summary, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
	));
?>			
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Lihat Surat')); ?>	

<embed src="<?php echo Yii::app()->baseUrl.$model->file_upload;//Yii::app()->baseUrl .'/upload/gateway.pdf';?>" width="850" height="575">

<?php $this->endWidget(); ?>


<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
	$tabParameters['tab1'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>

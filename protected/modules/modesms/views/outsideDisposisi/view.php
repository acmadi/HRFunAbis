<?php
/* @var $this OutsideDisposisiController */
/* @var $model OutsideDisposisi */

$this->breadcrumbs=array(
	'Outside Disposisis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OutsideDisposisi', 'url'=>array('index')),
	array('label'=>'Create OutsideDisposisi', 'url'=>array('create')),
	array('label'=>'Update OutsideDisposisi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OutsideDisposisi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OutsideDisposisi', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Disposisi",
		));		
?>

<div class="row-fluid">
  	<div class="span12">
	
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Surat')); ?>
	<?php
		 $this->widget('editable.EditableDetailView', array(
		'data' => $model,
		'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
		'emptytext' => 'no value',
		'attributes'=>array(
			'number',
			'subject',
			'summary',
			'disposisi_task',
			'disposisi_from',
			//'disposisi_verified',
			'disposisi_to',
		   )
		));
	?>
	<?php $this->endWidget(); ?>
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Attach')); ?>
		<embed src="<?php echo Yii::app()->baseUrl.$surat->file_upload;//Yii::app()->baseUrl .'/upload/gateway.pdf';?>" width="950" height="375">
	<?php $this->endWidget(); ?>
	
	<?php
	$tabParameters = array();
	foreach($this->clips as $key=>$clip)
		$tabParameters['tab1'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
	?>
	<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons'=>array(
				array('label'=>'Disposisikan Surat', 'url'=>array('/modesms/outsideDisposisi/disposisi', 'id'=> $model->id))
			),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons'=>array(
				array('label'=>'|', 'url'=>array('#'))
			),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons'=>array(
				array('label'=>'Buat Sppd(next)', 'url'=>array('/modesms/outsideDisposisi/disposisi', 'id'=> $model->id))
			),
		)); ?>
		
	</div>

	</div>
</div>
<?php $this->endWidget(); ?>
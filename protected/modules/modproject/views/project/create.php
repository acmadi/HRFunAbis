<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects'=>array('create'),
	'Create',
)));

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Proyek',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
	$this->endWidget();
?>
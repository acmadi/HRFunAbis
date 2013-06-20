<?php
/* @var $this DisposisiTreeController */
/* @var $model DisposisiTree */

$this->breadcrumbs=array(
	'Disposisi Trees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DisposisiTree', 'url'=>array('index')),
	array('label'=>'Manage DisposisiTree', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Tambah Hierarcy</h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
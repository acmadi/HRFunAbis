<?php
/* @var $this PersonelController */
/* @var $model Personel */

$this->breadcrumbs=array(
	'Personels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Personel', 'url'=>array('index')),
	array('label'=>'Manage Personel', 'url'=>array('admin')),
);
?>

<h1>Create Personel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
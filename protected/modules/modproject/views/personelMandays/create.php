<?php
/* @var $this PersonelMandaysController */
/* @var $model PersonelMandays */

$this->breadcrumbs=array(
	'Personel Mandays'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PersonelMandays', 'url'=>array('index')),
	array('label'=>'Manage PersonelMandays', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Tambah Hari Kerja</h1>
	<h5>ID Pegawai: <?php echo $model->employee_id?></h5>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
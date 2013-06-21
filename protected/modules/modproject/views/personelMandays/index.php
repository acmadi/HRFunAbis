<?php
/* @var $this PersonelMandaysController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Personel Mandays',
);

$this->menu=array(
	array('label'=>'Create PersonelMandays', 'url'=>array('create')),
	array('label'=>'Manage PersonelMandays', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Personel Mandays</h1>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

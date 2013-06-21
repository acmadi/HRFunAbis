<?php
/* @var $this ProgressController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Progresses',
);

$this->menu=array(
	array('label'=>'Create Progress', 'url'=>array('create')),
	array('label'=>'Manage Progress', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Progress',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Progress', 'url'=>array('/modproject/progress/create')),
				),
			),
	    ),
	));		
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php $this->endWidget();?>

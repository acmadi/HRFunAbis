<?php
/* @var $this ProcurementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Procurements',
);

$this->menu=array(
	array('label'=>'Create Procurement', 'url'=>array('create')),
	array('label'=>'Manage Procurement', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Pengadaan',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Pengadaan', 'url'=>array('/modproject/procurement/create')),
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
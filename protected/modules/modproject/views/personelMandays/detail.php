<?php

$this->breadcrumbs=array(
	'Project'=>array('/modproject/project'),
	'Manage',
);?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Kelola Hari Kerja Personil',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Hari Kerja', 'url'=>array('/modproject/personelmandays/create','employee_id'=>$_GET['employee_id'])),
				),
			),
	    ),
	));		
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'procurement-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
 		'employee_id',
 		'project_number',
 		'month',
 		'mandays',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget();?>
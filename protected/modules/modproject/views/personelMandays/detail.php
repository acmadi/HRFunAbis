<?php

$this->breadcrumbs=array(
	'Project'=>array('/modproject/project'),
	'Manage',
);?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Detail Hari Kerja Personil',
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

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th width="20%">No Proyek</th>
			<td><?php echo Yii::app()->session['project_number']?></td>
		</tr>
		<tr>
			<th width="20%">ID Personil</th>
			<td><?php echo $personel->employee_id?></td>
		</tr>
		<tr>
			<th width="20%">Nama Personil</th>
			<td><?php echo $personel->name?></td>
		</tr>
	</thead>
</table>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'procurement-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
 		'month',
 		'mandays',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget();?>
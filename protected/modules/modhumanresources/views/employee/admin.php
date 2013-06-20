
<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Employees'=>array('index'), 
	'Manage',
)));

$this->menu=array(
	array('label'=>'Create Employee', 'url'=>array('create')),
	array('label'=>'Exel', 'url'=>array('adminExel')),
);
?>

<?php 
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Data Pegawai',
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Tambah Pegawai', 'url'=>array('/modhumanresources/employee/create')),
				array('label'=>'Export', 'url'=>'#'),
			),
		),
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model), true),
	));
?>

<?php /*
<?php 
<div class="well well-small">
<h1>Manage Employees</h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'employee_id',
			//'htmlOptions'=>array('width'=>'50px'),
		),
		'name',
		'full_name',
		'pgassol_email',
		'phone_mobile',
		array(
			'type'=>'raw',
			'value'=>'CHtml::image( Yii::app()->baseUrl ."/".$data->photo,"no-pic",array("width"=>70,"height"=>70))',
			//'value'=>'Chtml::image("a/../news/".$data->id.$data->photo,"DORE",array("width"=>70,"height"=>70))',
		),
		//'department',
		array('name'=>'department', 'filter'=>array(CHtml::listData(Department::model()->findAll(), 'department', 'department'))),
		array('name'=>'position', 'filter'=>array(CHtml::listData(LevelPosition::model()->findAll(), 'position', 'position'))),
		//'position',
		//'address_current_1',
		/*
		'department',
		'position',
		'date_employee',
		'employee_status',
		'effective_date',
		'previous_employee_id',
		'gender',
		'place_of_birth',
		'birth_date',
		'religion',
		'blood_type',
		'rhesus',
		'ktp',
		'passport',
		'driver_licence',
		'jamsostek',
		'npwp',
		'phone_home',
		'phone_mobile',
		'address_current_1',
		'address_current_2',
		'address_ktp',
		'private_email',
		*//*
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<div class = "action">
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons'=>array(
				array('label'=>'Create', 'url'=>array('/modhumanresources/employee/create'))
			),
		)); ?>
	</div>
</div>

*/ ?>
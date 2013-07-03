<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Personil',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personel-grid',
	'dataProvider'=>$data->search(),
	'filter'=>$data,
	'columns'=>array(
		// 'id',
		// 'project_number',
		'employee_id',
		'name',
		'position',
		// 'position_task',
		'start_join',
		'end_join',
		'telepon',
		// 'email',
		// 'remarks',
		// 'created_by',
		// 'created_date',
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{mandays}{update}{delete}',
            'buttons'=> array(
            	'view'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/personel/view", array("id"=>$data->id))',
            		),
            	'mandays'=>array(
            		'label'=>'Mandays Detail',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/person.png',
		            'url'=>'Yii::app()->createUrl("modproject/personelmandays/detail", array("employee_id"=>$data->employee_id))',
            		),
            	'update'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/personel/update", array("id"=>$data->id))',
            		),
            	'delete'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/personel/delete", array("id"=>$data->id))',
            		),
	        	),
            'htmlOptions'=>array(
            	'width' => '80px'
            	),
		),
	),
)); ?>

<?php $this->endWidget();?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttons'=>array(
		array('label'=>'Create', 'url'=>array('/modproject/personel/create'))
	),
)); ?>
</div>
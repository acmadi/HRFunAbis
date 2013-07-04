<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Task',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array(
	'class'=>'bootstrap-widget-table',
	'style'=>'overflow-x:scroll'
	)
));?>

<?php 
$this->widget('ext.QTreeGridView.CQTreeGridView', array(
    'id'=>'task-grid',
    // 'cssFile'=>false,
    'ajaxUpdate' => false,
    'dataProvider'=>$data,
    'columns'=>array(
	        // 'id',
			// 'project_number',
    		array(
                'header'=>'No',
                'value'=>'$row+1',
		        ),
			array(
				'name'=>'code',
				'header'=>'Kode'
				),
			array(
				'name'=>'name',
				'header'=>'Nama',
				),
			// 'description',
			array(
				'name'=>'plan_start_date',
				'header'=>'Mulai(Plan)',
				),
			array(
				'name'=>'plan_end_date',
				'header'=>'Selesai(Plan)',
				),
			array(
				'name'=>'plan_progress',
				'header'=>'Progress(Plan)',
				),
			array(
				'name'=>'act_start_date',
				'header'=>'Mulai(Real)',
				),
			array(
				'name'=>'act_end_date',
				'header'=>'Selesai(Real)',
				),
			array(
				'name'=>'actual_progress',
				'header'=>'Progress(Real)',
				),
			// 'remarks',
			// 'created_date',
			// 'created_by',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{add}{delete}{attach}',
            'buttons'=> array(
            	'add'=>array(
            		'label'=>'Add Child Task',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/add.png',
		            'url'=>'Yii::app()->createUrl("modproject/task/create", array("id"=>$data->id))',
            		),
            	'view'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/task/view", array("id"=>$data->id))',
            		),
            	'update'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/task/update", array("id"=>$data->id))',
            		),
            	'delete'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/task/delete", array("id"=>$data->id))',
            		),
            	'attach'=>array(
            		'label'=>'Attach Document',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/attach.png',
		            'url'=>'Yii::app()->createUrl("modproject/document/create", array("task_id"=>$data->id))',
            		),
	        	),
            'htmlOptions'=>array(
            	'width' => '80px'
            	),
	        ),

	    ),
));
?>

<?php $this->endWidget();?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttons'=>array(
		array('label'=>'Create', 'url'=>array('/modproject/task/create'))
	),
)); ?>
</div>

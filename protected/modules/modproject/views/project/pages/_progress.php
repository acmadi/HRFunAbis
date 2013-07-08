<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Progress',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'progress-grid',
	'dataProvider'=>$data->search(),
	'filter'=>$data,
	'columns'=>array(
		array(
            'header'=>'No',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
        ),
		// 'id',
		// 'project_number',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'period_date',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
				'url' => $this->createUrl('progress/ajaxupdate'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'period_date_to',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
				'url' => $this->createUrl('progress/ajaxupdate'),
				'placement' => 'right',
			)
		),
		'period_week',
		// 'description',
		// 'termin_pgn',
		// 'termin_vendor',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'progress_plan',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
				'url' => $this->createUrl('progress/ajaxupdate'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'progress_actual',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
				'url' => $this->createUrl('progress/ajaxupdate'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'progress_this_week',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
				'url' => $this->createUrl('progress/ajaxupdate'),
				'placement' => 'right',
			)
		),
		// 'completed_work',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'work_remaining',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
				'url' => $this->createUrl('progress/ajaxupdate'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'reason_of_delay',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
				'url' => $this->createUrl('progress/ajaxupdate'),
				'placement' => 'right',
			)
		),
		'pic',
		// 'created_date',
		// 'created_by',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=> array(
            	'view'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/progress/view", array("id"=>$data->id))',
            		),
            	'update'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/progress/update", array("id"=>$data->id))',
            		),
            	'delete'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/progress/delete", array("id"=>$data->id))',
            		),
	        	),
            'htmlOptions'=>array(
            	'width' => '80px',
            	),
	        ),
		),
)); ?>

<?php $this->endWidget();?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttons'=>array(
		array('label'=>'Create', 'url'=>array('/modproject/progress/create'))
	),
)); ?>
</div>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Dokumen',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'document-grid',
	'dataProvider'=>$data->search(),
	'filter'=>$data,
	'columns'=>array(
		// 'id',
		// 'project_number',
		'type',
		'task_id',
		'document_number',
		'version',
		'version_date',
		'owner',
		'distribution',
		'document_description',
		'file_attached',
		// 'created_date',
		// 'created_by',
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}{download}',
			'buttons'=> array(
				'view'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/document/view", array("id"=>$data->id))',
            		),
				'update'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/document/update", array("id"=>$data->id))',
            		),
            	'delete'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/document/delete", array("id"=>$data->id))',
            		),
            	'download'=>array(
            		'label'=>'Download Document',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/download.png',
		            'url'=>'Yii::app()->createUrl("modproject/document/download", array("id"=>$data->id))',
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
		array('label'=>'Create', 'url'=>array('/modproject/document/create'))
	),
)); ?>
</div>
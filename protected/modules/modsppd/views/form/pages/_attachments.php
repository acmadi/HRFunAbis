<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Dokumen',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attachment-grid',
	'dataProvider'=>$data,
	// 'filter'=>$model,
	'columns'=>array(
		// 'id',
		// 'sppd_id',
		'name',
		'type',
		'attachment',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}{download}',
			'buttons'=> array(
				// 'view'=>array(
    //         		'url'=>'Yii::app()->createUrl("modsppd/attachment/view", array("id"=>$data->id))',
    //         		),
				'update'=>array(
            		'url'=>'Yii::app()->createUrl("modsppd/attachment/update", array("id"=>$data->id))',
            		),
            	'delete'=>array(
            		'url'=>'Yii::app()->createUrl("modsppd/attachment/delete", array("id"=>$data->id))',
            		),
            	'download'=>array(
            		'label'=>'Download Attachment',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/download.png',
		            'url'=>'Yii::app()->createUrl("modsppd/attachment/download", array("id"=>$data->id))',
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
		array('label'=>'Upload File', 'url'=>array('/modsppd/attachment/create','id'=>$sppd_id))
	),
)); ?>
</div>
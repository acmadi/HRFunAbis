<?php echo CHtml::form(array('batchDelete')); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'file-publication-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows'=>2,
	'columns'=>array(
		array(
            'class'=>'CCheckBoxColumn',  
            'id'=>'id',
        ),	
		array(
			'name'=>'name',
			'header'=>'JUDUL',
			'htmlOptions'=>array('width'=>'600px'),
		),
		array(
			'name'=>'version',
			'header'=>'VERSI',
			'htmlOptions'=>array('width'=>'100px'),
		),
		
		array(
			'name'=>'version_date',
			'header'=>'TANGGAL',
			'htmlOptions'=>array('width'=>'100px'),
		),
		
		array(
			'name'=>'version_date',
			'header'=>'TANGGAL',
			'htmlOptions'=>array('width'=>'100px'),
		),
		
		array(
			'class'=>'CLinkColumn',
			'label'=>'download',
			'urlExpression'=>'"index.php?r=modhumanresources/FilePublicationDownload/download&id=".$data->id',
			'header'=>'DOWNLOAD'
		  ),
	  
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Batch Delete', 'htmlOptions'=>array('onclick'=>'return confirm("Are you sure you want to delete all check item? ");'),)); ?>

<?php echo CHtml::form(array('batchDelete')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekening-dc-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows'=>2,
	'columns'=>array(
		array(
            'class'=>'CCheckBoxColumn',  
            'id'=>'id',
        ),
		//'outside_id',
		'number',
		'subject',
		
		array(
			'name'=>'disposisi_from',
			'value'=>'DisposisiTree::model()->getName($data->disposisi_from)',
		),
		
		array(
			'name'=>'disposisi_to',
			'filter'=>false,
			'value'=>'DisposisiTree::model()->getName($data->disposisi_to)',
		),
		
		// 'disposisi_to',
		'disposisi_task',
		/*
		'disposisi_verified',
		'created_date',
		'created_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<!--end batch delete-->
<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Batch Delete', 'htmlOptions'=>array('onclick'=>'return confirm("Are you sure you want to delete all check item? ");'),)); ?>

<?php 
// echo CHtml::submitButton('Batch Delete',array(
    // 'onclick'=>'return confirm("Are you sure you want to delete all check item? ");',
// )); ?>
<?php echo CHtml::endForm(); ?>
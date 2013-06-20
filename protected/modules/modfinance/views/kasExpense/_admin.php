<?php echo CHtml::form(array('batchSubmit')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kas-expense-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows'=>2,
	'columns'=>array(
		array(
            'class'=>'CCheckBoxColumn',  
            'id'=>'id',
        ),	
		array('name'=>'code_kas', 'filter'=>array(CHtml::listData(Kas::model()->findAll(), 'code_kas', 'nama_kas'))),
		array('name'=>'elbi', 'filter'=>array(CHtml::listData(Elbicode::model()->findAll(), 'elbi', 'elbi'))),
		// 'date',
		array(
            'name'=>'date',
            'class'=>'ext.EFilterDatePicker',
            'model'=>$model,
            'attribute'=>'date',
			'htmlOptions'=>array('width'=>'30px'),
            'options'=>array(
                'showAnim'=>'fade',
                'changeYear'=>true,
                'changeMonth'=>true,
                'dateFormat'=>'yy-mm-dd',
            ),
        ),
		'transaction',
		array(
			'name'=>'amount',
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->amount, \' \'))',
			'htmlOptions'=>array('style'=>'text-align: right;'),
		),
		
		array(
			'name'=>'ppn',
			'filter'=>false,
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->ppn, \' \'))',
			'htmlOptions'=>array('style'=>'text-align: right;'),
		),
		array(
			'name'=>'pph21',
			'filter'=>false,
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->pph21, \' \'))',
			'htmlOptions'=>array('style'=>'text-align: right;'),
		),
		
		array(
			'name'=>'pph23',
			'filter'=>false,
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->pph23, \' \'))',
			'htmlOptions'=>array('style'=>'text-align: right;'),
		),
		//'created_date',
		/*
		'created_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<!--end batch delete-->
<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Batch Delete', 'htmlOptions'=>array('onclick'=>'return confirm("Are you sure you want to delete all check item? ");'),)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Batch Submit', 'htmlOptions'=>array('onclick'=>'return confirm("Are you sure you want to submit all check item? ");'),)); ?>
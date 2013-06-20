<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kas-saldo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array
		(		
			'name'=>'id',
			'htmlOptions'=>array('width'=>'20px'),
		),
		array(
			'name'=>'code_kas',
			'filter'=>array(CHtml::listData(Kas::model()->findAll(), 'code_kas', 'nama_kas')),
			'header'=>'Kas',
			'htmlOptions'=>array('width'=>'60px'),
		),
		array(
			'name'=>'akumulasi_saldo',
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->akumulasi_saldo, \' \'))',
			'htmlOptions'=>array('style'=>'text-align: right;'),
		),
		array(
			'name'=>'transaksi',
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->transaksi, \' \'))',
			'htmlOptions'=>array('style'=>'text-align: right;'),
		),
		
		'description',
		'transac_date',
		'date',
		/*
		'created_by',
		'created_date',
		*/
	),
)); ?>

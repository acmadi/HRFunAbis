<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekening-saldo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array('width'=>'20px'),
		),
		//'nomor_rek',
		array(
			'name'=>'nomor_rek',
			'filter'=>array(CHtml::listData(Rekening::model()->findAll(), 'nomor_rek', 'nomor_rek')),
			'header'=>'NOREK',
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
		// array(
			// 'class'=>'CButtonColumn',
		// ),
	),
)); ?>

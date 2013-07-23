<div class="span12">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'rabnon-dinas-grid',
		'dataProvider'=>$data,
		// 'filter'=>$model,
		'columns'=>array(
			array(
	            'header'=>'No',
	            'value'=>'$row+1',       //  row is zero based
	            'htmlOptions' => array('style' => 'width:10px')
	        ),
			// 'id',
			// 'employee_id',
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'name',
				'editable' => array( //editable section
					'url' => $this->createUrl('rABNonDinas/ajaxupdate'),
					'placement' => 'left',
				),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'explanation',
				'footer' => 'Total',
				'footerHtmlOptions' => array('style'=>'font-weight:bold'),
				'editable' => array( //editable section
					'url' => $this->createUrl('rABNonDinas/ajaxupdate'),
					'placement' => 'left',
				),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'days',
				'editable' => array( //editable section
					'url' => $this->createUrl('rABNonDinas/ajaxupdate'),
					'placement' => 'left',
				),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'amount',
				'footer' => Yii::app()->numberFormatter->formatCurrency(RABNonDinas::model()->getTotal($sppd_id),''),
				'htmlOptions' => array('style' => 'text-align:right'),
				'footerHtmlOptions' => array('style' => 'text-align:right; font-weight:bold'),
				'editable' => array( //editable section
					'url' => $this->createUrl('rABNonDinas/ajaxupdate'),
					'placement' => 'left',
				),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'additional_description',
				'editable' => array( //editable section
					'url' => $this->createUrl('rABNonDinas/ajaxupdate'),
					'placement' => 'left',
				),
			),
			// 'created_date',
			// 'created_by',
			array(
				'class'=>'CButtonColumn',
				'buttons' => array(
					'view'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/rABNonDinas/view", array("id"=>$data->id))',
	            		),
	            	'update'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/rABNonDinas/update", array("id"=>$data->id))',
	            		),
	            	'delete'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/rABNonDinas/delete", array("id"=>$data->id))',
	            		),
					),
			),
		),
	)); ?>
</div>	
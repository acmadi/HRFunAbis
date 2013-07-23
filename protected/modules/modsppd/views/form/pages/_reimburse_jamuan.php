<div class="span12">
	<?php
		$this->beginWidget('bootstrap.widgets.TbBox', array(
		    'title' => 'Reimburse Jamuan',
		    'headerButtons' => array(
				array(
					'class' => 'bootstrap.widgets.TbButtonGroup',
					'buttons'=>array(
						array('label'=>'Tambah Reimburse', 'url'=>array('/modsppd/reimburseJamuan/create','id'=>$sppd_id)),
					),
				),
		    ),
		));		
	?>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'reimburse-jamuan-grid',
		'dataProvider'=>$data,
		// 'filter'=>$data,
		'columns'=>array(
			'id',
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'date',
				'editable' => array( //editable section
					'url' => $this->createUrl('reimburseJamuan/ajaxupdate'),
					'placement' => 'left',
				),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'transaction_description',
				'editable' => array( //editable section
					'url' => $this->createUrl('reimburseJamuan/ajaxupdate'),
					'placement' => 'left',
				),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'amount',
				'editable' => array( //editable section
					'url' => $this->createUrl('reimburseJamuan/ajaxupdate'),
					'placement' => 'left',
				),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'cc',
				'editable' => array( //editable section
					'url' => $this->createUrl('reimburseJamuan/ajaxupdate'),
					'placement' => 'left',
				),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'usage_type',
				'editable' => array( //editable section
					'url' => $this->createUrl('reimburseJamuan/ajaxupdate'),
					'placement' => 'left',
				),
			),
			/*
			'created_date',
			'created_by',
			*/
			array(
				'class'=>'CButtonColumn',
				'buttons' => array(
					'view'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/reimburseJamuan/view", array("id"=>$data->id))',
	            		),
	            	'update'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/reimburseJamuan/update", array("id"=>$data->id))',
	            		),
	            	'delete'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/reimburseJamuan/delete", array("id"=>$data->id))',
	            		),
					),
			),
		),
	)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Attach File',
		    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		    'size'=>'large', // null, 'large', 'small' or 'mini'
		    'url'=>array('attachment/create','id'=>$sppd_id, 'type'=>'JAMUAN'),
		)); ?>
	</div>

	<?php $this->endWidget() ?>
</div>
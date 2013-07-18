<div class="span12">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'personnel-grid',
		'dataProvider'=>$data,
		// 'filter'=>$model,
		'columns'=>array(
			// 'id',
			// 'sppd_id',
			'employee_id',
			'name',
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>
</div>	
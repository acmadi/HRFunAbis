<?php echo CHtml::form(array('batchDelete')); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inside-letter-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows'=>2,
	'columns'=>array(
		array(
            'class'=>'CCheckBoxColumn',  
            'id'=>'id',
        ),
		array(
			'name'=>'number',
			'header'=>'NOMOR',
			'htmlOptions'=>array('width'=>'50px'),
		),
		array(
			'name'=>'subject',
			'header'=>'JUDUL',
			'htmlOptions'=>array('width'=>'200px'),
		),
		array(
			'name'=>'inisiator',
			'header'=>'DIBUAT OLEH',
			'htmlOptions'=>array('width'=>'50px'),
		),
		array(
			'name'=>'to_division',
			'header'=>'UNTUK',
			'htmlOptions'=>array('width'=>'100px'),
		),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<!--end batch delete-->
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Batch Delete', 'htmlOptions'=>array('onclick'=>'return confirm("Are you sure you want to delete all check item? ");'),)); ?>

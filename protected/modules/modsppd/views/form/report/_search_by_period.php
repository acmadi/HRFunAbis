<?php $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'from_date',  // name of post parameter
	    'options'=>array(
	        'showAnim'=>'fold',
	        'dateFormat'=>'yy-mm-dd',
	    ),
	    'htmlOptions'=>array(
	        'class'=>'input-medium',
			'placeholder'=>(isset($_GET['from_date']))?$_GET['from_date']:'Dari Tanggal',
	    ),
	));
	?>

	<?php
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'to_date',  // name of post parameter
	    'options'=>array(
	        'showAnim'=>'fold',
	        'dateFormat'=>'yy-mm-dd',
	    ),
	    'htmlOptions'=>array(
	        'class'=>'input-medium',
			'placeholder'=>(isset($_GET['to_date']))?$_GET['to_date']:'Sampai Tanggal',
	    ),
	));
	?>

	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Search', 'htmlOptions'=> array(
																												'name'=>'filter',
																												'value'=>'BY_PERIOD',
																												),)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Download Report', 'htmlOptions'=> array(
																												'name'=>'download',
																												'value'=>'BY_PERIOD',
																												),)); ?>																								

<?php $this->endWidget();?>
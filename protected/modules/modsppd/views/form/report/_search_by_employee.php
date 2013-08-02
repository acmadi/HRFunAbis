<?php $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo CHtml::dropDownList('employee_id',(isset($_GET['employee_id']))?$_GET['employee_id']:'',CHtml::listData(Employee::model()->findAll(array('order'=>'name')),'employee_id','full_name'), array('empty'=>'pilih employee')); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Search', 'htmlOptions'=> array(
																												'name'=>'filter',
																												'value'=>'BY_EMPLOYEE',
																												),)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Download Report', 'htmlOptions'=> array(
																												'name'=>'download',
																												'value'=>'BY_EMPLOYEE',
																												),)); ?>																								

<?php $this->endWidget();?>
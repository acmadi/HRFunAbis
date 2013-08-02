<?php $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo CHtml::dropDownList('department',(isset($_GET['department']))?$_GET['department']:'',CHtml::listData(Department::model()->findAll(),'department','department'), array('empty'=>'pilih departemen')); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Search', 'htmlOptions'=> array(
																												'name'=>'filter',
																												'value'=>'BY_DEPARTMENT',
																												),)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Download Report', 'htmlOptions'=> array(
																												'name'=>'download',
																												'value'=>'BY_DEPARTMENT',
																												),)); ?>																								

<?php $this->endWidget();?>
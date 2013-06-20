<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->label($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="action">
		<?php 
			$this->widget('zii.widgets.jui.CJuiButton', array(
				'buttonType'=>'submit',
				'name'=>'btnSubmit',
				'value'=>'1',
				'caption'=>'Search',
			));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
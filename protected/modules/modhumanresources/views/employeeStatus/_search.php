<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->label($model,'status_en'); ?>
		<?php echo $form->textField($model,'status_en',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id',array('size'=>50,'maxlength'=>50)); ?>
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
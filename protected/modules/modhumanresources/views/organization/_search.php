<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'lft'); ?>
		<?php echo $form->textField($model,'lft',array('size'=>10,'maxlength'=>10)); ?>
	</div>


	<div class="simple">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'visible'); ?>
		<?php echo $form->textField($model,'visible'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'task'); ?>
		<?php echo $form->textField($model,'task',array('size'=>60,'maxlength'=>64)); ?>
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
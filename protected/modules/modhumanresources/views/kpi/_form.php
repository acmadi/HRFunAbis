<?php
/* @var $this KpiController */
/* @var $model Kpi */
/* @var $form CActiveForm */
?>

<div class="wide form">


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'have-fun-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data', //must required for file upload
    ),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sasaran_kerja'); ?>
		<?php echo $form->textArea($model,'sasaran_kerja',array('rows'=>6, 'cols'=>150)); ?>
		<?php echo $form->error($model,'sasaran_kerja'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bentuk_target'); ?>
		<?php echo $form->textArea($model,'bentuk_target',array('rows'=>6, 'cols'=>150)); ?>
		<?php echo $form->error($model,'bentuk_target'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'realisasi'); ?>
		<?php echo $form->textArea($model,'realisasi',array('rows'=>6, 'cols'=>150)); ?>
		<?php echo $form->error($model,'realisasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bobot'); ?>
		<?php echo $form->textField($model,'bobot',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'bobot'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'nilai'); ?>
		<?php //echo $form->textField($model,'nilai',array('size'=>11,'maxlength'=>11)); ?>
		<?php //echo $form->error($model,'nilai'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'nilai_kinerja'); ?>
		<?php //echo $form->textField($model,'nilai_kinerja',array('size'=>11,'maxlength'=>11)); ?>
		<?php //echo $form->error($model,'nilai_kinerja'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'created_date'); ?>
		<?php //echo $form->textField($model,'created_date'); ?>
		<?php //echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'update_by'); ?>
		<?php //echo $form->textField($model,'update_by',array('size'=>50,'maxlength'=>50)); ?>
		<?php //echo $form->error($model,'update_by'); ?>
	</div>

	<div class = "action">
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>	
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
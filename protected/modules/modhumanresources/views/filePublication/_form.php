<?php
/* @var $this FilePublicationController */
/* @var $model FilePublication */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-publication-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'version'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
			'name'=>CHtml::activeName($model,'version_date'),
			'value'=>$model->version_date,
			'options'=>array('dateFmt'=>'yyyy-MM-dd'),
		));
		?>
		<?php //echo $form->textField($model,'version_date'); ?>
		<?php echo $form->error($model,'version_date'); ?>
	</div>

	<div class="row">
		<?php 
			Yii::app()->user->setFlash('success', '<strong>Perhatian!</strong> Format file .PDF harus dalam satu rangkaian, ex : <strong>"Surat_Undangan_Kerjasama_PGN_DTIK_8_Maret_2013.pdf"</strong>');
			$this->widget('bootstrap.widgets.TbAlert', array(
			'block'=>true, // display a larger alert block?
			'fade'=>true, // use transitions?
			'closeText'=>'×', // close link text - if set to false, no close link is displayed
			'alerts'=>array( // configurations per alert type
			'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
			),
			));
		?>
		<?php echo $form->labelEx($model,'file_upload'); ?>
		<?php echo $form->fileField($model,'file_upload',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'file_upload'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>	
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
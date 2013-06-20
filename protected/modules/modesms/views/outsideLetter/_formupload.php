<?php
/* @var $this OutsideLetterController */
/* @var $model OutsideLetter */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'outside-letter-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

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
		
		<?php //echo $form->labelEx($model,'file_upload'); ?>
		<?php echo $form->fileField($model,'file_upload',array('size'=>60,'maxlength'=>200)); ?>
		
		<?php echo $form->error($model,'file_upload'); ?>
	</div>
		
	<div class = "action">
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Upload')); ?>
		</div>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->
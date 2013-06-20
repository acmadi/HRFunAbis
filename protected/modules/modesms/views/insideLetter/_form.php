<?php
/* @var $this InsideLetterController */
/* @var $model InsideLetter */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inside-letter-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Kop Surat')); ?>
	
		<div class="row">
			<?php echo $form->labelEx($model,'number'); ?>
			<?php echo $form->textField($model,'number',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'number'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'subject'); ?>
			<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'subject'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'date'); ?>
			<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'date'),
					'value'=>$model->date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
			<?php //echo $form->textField($model,'date'); ?>
			<?php echo $form->error($model,'date'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'version'); ?>
			<?php echo $form->textField($model,'version',array('size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'version'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'version_date'); ?>
			<?php //echo $form->textField($model,'version_date'); ?>
			<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'version_date'),
					'value'=>$model->version_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
			<?php echo $form->error($model,'version_date'); ?>
		</div>
	<?php $this->endWidget(); ?>
	
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Dari dan Ke')); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'inisiator'); ?>
			<?php echo $form->textField($model,'inisiator',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'inisiator'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'ferivicator'); ?>
			<?php echo $form->textField($model,'ferivicator',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ferivicator'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'to_division'); ?>
			<?php echo $form->textField($model,'to_division',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'to_division'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'to_company'); ?>
			<?php echo $form->textField($model,'to_company',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'to_company'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'to_contact'); ?>
			<?php echo $form->textField($model,'to_contact',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'to_contact'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'to_position'); ?>
			<?php echo $form->textField($model,'to_position',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'to_position'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'to_address'); ?>
			<?php echo $form->textField($model,'to_address',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'to_address'); ?>
		</div>
	<?php $this->endWidget(); ?>
	
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Isi')); ?>	
		<div class="row">
			<?php echo $form->labelEx($model,'content'); ?>
			<?php 
				$this->widget('application.extensions.cleditor.ECLEditor', array(
					'model'=>$model,
					'attribute'=>'content', //Model attribute name. Nome do atributo do modelo.
					'options'=>array(
						'width'=>'1000',
						'height'=>500,
						'useCSS'=>true,
					),
					'value'=>$model->content, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
				));
			?>
			<?php //echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'content'); ?>
		</div>
	<?php $this->endWidget(); ?>

	
	<?php
	$tabParameters = array();
	foreach($this->clips as $key=>$clip)
		$tabParameters['tab1'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
	?>
	 
	<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
	
	<div class = "action">
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>	
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
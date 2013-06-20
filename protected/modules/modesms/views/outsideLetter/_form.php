<?php
/* @var $this OutsideLetterController */
/* @var $model OutsideLetter */
/* @var $form CActiveForm */
?>

	<br/>
	<div class="wide form">
		<embed src="<?php echo Yii::app()->baseUrl.$model->file_upload;//Yii::app()->baseUrl .'/upload/gateway.pdf';?>" width="970" height="275">
	</div>


	<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'outside-letter-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
				<?php //echo $form->textField($model,'date'); ?>
				<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
						'name'=>CHtml::activeName($model,'date'),
						'value'=>$model->date,
						'options'=>array('dateFmt'=>'yyyy-MM-dd'),
					));
					?>
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
				<?php echo $form->labelEx($model,'to'); ?>
				<?php 
					$criteria = new CDbCriteria();
					$criteria->addCondition("parent_id = 0");	
				?>
				<?php echo $form->dropDownList($model,'to',CHtml::listData(DisposisiTree::model()->findAll($criteria), 'employee_id', 'name'), array('empty'=>'select tujuan')); ?>
				<?php //echo $form->textField($model,'to',array('size'=>50,'maxlength'=>50)); ?>
				<?php echo $form->error($model,'to'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'to_division'); ?>
				<?php echo $form->textField($model,'to_division',array('size'=>50,'maxlength'=>50)); ?>
				<?php echo $form->error($model,'to_division'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'from_company'); ?>
				<?php echo $form->textField($model,'from_company',array('size'=>50,'maxlength'=>50)); ?>
				<?php echo $form->error($model,'from_company'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'from_contact'); ?>
				<?php echo $form->textField($model,'from_contact',array('size'=>50,'maxlength'=>50)); ?>
				<?php echo $form->error($model,'from_contact'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'from_position'); ?>
				<?php echo $form->textField($model,'from_position',array('size'=>50,'maxlength'=>50)); ?>
				<?php echo $form->error($model,'from_position'); ?>
			</div>
		
		<?php $this->endWidget(); ?>
		<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Isi Surat')); ?>
		
			<div class="row">
				<?php echo $form->labelEx($model,'summary'); ?>
				<?php 
					$this->widget('application.extensions.cleditor.ECLEditor', array(
						'model'=>$model,
						'attribute'=>'summary', //Model attribute name. Nome do atributo do modelo.
						'options'=>array(
							'width'=>'950',
							'height'=>250,
							'useCSS'=>true,
						),
						'value'=>$model->summary, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
					));
				?>
					
				<?php //echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'summary'); ?>
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



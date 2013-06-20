<?php
// // $this->breadcrumbs=array(
	// // 'Dependents'=>array('index'),
	// // $model->name=>array('view','id'=>$model->id),
	// // 'Update',
// // );

// // $this->menu=array(
	// // // array('label'=>'List Dependent', 'url'=>array('index')),
	// // // array('label'=>'Create Dependent', 'url'=>array('create')),
	// // // array('label'=>'View Dependent', 'url'=>array('view', 'id'=>$model->id)),
	// // // array('label'=>'Manage Dependent', 'url'=>array('admin')),
// // );
?>

<h3><?php echo Yii::t('ui', 'Update Dependent ');?><?php echo $model->id; ?></h3>

<fieldset>
	<legend style="text-align:right;">
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'link',
			'name'=>'btnReload',
			'options'=>array('icons'=>'js:{secondary:"ui-icon-arrowrefresh-1-w"}'),
			'url'=>array('update', 'id'=>$model->employee_id),
		)); ?>
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'link',
			'name'=>'btnBack',
			'options'=>array('icons'=>'js:{secondary:"ui-icon-arrow-1-w"}'),
			'url'=>array('/modhumanresources/Dependent/dependent', array('employee_id'=>Yii::app()->session['employee_id'])),
		)); ?>
	</legend>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</fieldset>
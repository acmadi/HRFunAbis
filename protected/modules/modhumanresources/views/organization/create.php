<?php
$this->breadcrumbs=array(
	'Menu Nesteds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'Manage Organization', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Create Organization');?></h3>

<fieldset>
	<legend style="text-align:right;">
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'link',
			'name'=>'btnReload',
			'options'=>array('icons'=>'js:{secondary:"ui-icon-arrowrefresh-1-w"}'),
			'url'=>array('create'),
		)); ?>
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'link',
			'name'=>'btnBack',
			'options'=>array('icons'=>'js:{secondary:"ui-icon-extlink"}'),
			'url'=>array('admin'),
		)); ?>
	</legend>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</fieldset>	
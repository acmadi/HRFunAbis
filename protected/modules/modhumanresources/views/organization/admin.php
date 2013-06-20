<?php
$this->breadcrumbs=array(
	'Menu Nesteds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'Create Organization', 'url'=>array('create')),
);

?>

<h3><?php echo Yii::t('ui', 'Manage Menu Nesteds');?></h3>

<?php $this->renderPartial('../flashMessage/flash_message');?>
<?php $this->widget('zii.widgets.jui.CJuiButton', array(
	'buttonType'=>'link',
	'name'=>'btnNew',
	'caption'=>Yii::t('ui', 'New'),
	'options'=>array('icons'=>'js:{secondary:"ui-icon-extlink"}'),
	'url'=>array('create'),
)); ?>

<?php /*
<div class="tpanel">
<div class="toggle">
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'link',
			'name'=>'btnReload',
			'options'=>array('icons'=>'js:{secondary:"ui-icon-search"}'),
			'caption'=>Yii::t('ui', 'Advance Search'),
			'url'=>array('#'),
		)); ?>
</div>
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

*/?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'organization-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		'name'=>'year', 
		'filter'=>$model->getYears(),
		),
		'title',
		//'lft',
		///'visible',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
/* @var $this DisposisiTreeController */
/* @var $model DisposisiTree */

$this->breadcrumbs=array(
	'Disposisi Trees'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DisposisiTree', 'url'=>array('index')),
	array('label'=>'Create DisposisiTree', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('disposisi-tree-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
$this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Hierarcy Disposisi',
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Input Data', 'url'=>array('/modesms/disposisiTree/create')),
			),
		),
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model, 'dataProvider'=>$dataProvider), true),
	));
?>

<?php 
// $this->widget('ext.QTreeGridView.CQTreeGridView', array(
    // 'id'=>'category-grid',
    // // 'cssFile'=>false,
    // 'ajaxUpdate' => false,
    // 'dataProvider'=>$dataProvider,
    // 'filter'=>$model,
    // 'columns'=>array(
        // 'id',
        // 'employee_id',
        // 'name',
        // // array(
            // // 'name' => 'parent_id',
            // // 'value'=>'(($data->parent_id==0)?"No Parent" :$data->parentCategory->name)',
        // // ),
        // array(
            // 'class'=>'CButtonColumn',
            // 'template'=>'{view}{update}{delete}',
            // 'buttons'=>array
            // (
 
 
        // ),
    // ),
    // ),
// ));
?>


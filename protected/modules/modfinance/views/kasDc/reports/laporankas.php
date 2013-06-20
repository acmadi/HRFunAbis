<?php
/* @var $this KasDcController */
/* @var $model KasDc */

$this->breadcrumbs=array(
	'Kas Dcs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KasDc', 'url'=>array('index')),
	array('label'=>'Create KasDc', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rekening-dc-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--filter form-->
		
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
<?php
// if(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest))
// {
	// echo CHtml::dropDownList('code_kas','',CHtml::listData(SetupUserKas::model()->findAll(), 'code_kas', 'code_kas'), array('empty'=>'pilih kas')); 
// }
// else
// {
	$criteria = new CDbCriteria;  
	$criteria->addCondition('employee_id = :employee_id');
	$criteria->params = array(
			  ':employee_id' =>Yii::app()->user->getEmployeeID(),
			);

	echo CHtml::dropDownList('code_kas','',CHtml::listData(SetupUserKas::model()->findAll($criteria), 'code_kas', 'code_kas'), array('empty'=>'pilih kas')); 
// }	
?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'name'=>'from_date',  // name of post parameter
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions'=>array(
        'class'=>'input-small',
		'placeholder'=>'Dari Tanggal'
    ),
));
?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'to_date',
	'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions'=>array(
       'class'=>'input-small',
	   'placeholder'=>'Sampai'
    ),
));
?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Submit')); ?>
 
<?php $this->endWidget(); ?>
<!-- end filter form-->


<?php 
if(isset($kasdc))
{
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Laporan Kas',
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Export', 'url'=>array('/modfinance/KasDc/laporanKasPdf'), 'htmlOptions'=>array('target'=>'_blank')),
			),
		),
    ),
	'content'=> $this->renderPartial('reports/_laporankas', array('data' => $kasdc), true),
	));
}	
?>

<?php //$this->renderPartial('reports/_laporankas', array('data' => $kasdc));?>

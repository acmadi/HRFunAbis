<?php
/* @var $this RekeningDcController */
/* @var $model RekeningDc */

$this->breadcrumbs=array(
	'Rekening Dcs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RekeningDc', 'url'=>array('index')),
	array('label'=>'Create RekeningDc', 'url'=>array('create')),
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
	// echo CHtml::dropDownList('nomor_rek','',CHtml::listData(SetupUserBank::model()->findAll(), 'nomor_rek', 'nomor_rek'), array('empty'=>'pilih rekening')); 
// }
// else
// {
	$criteria = new CDbCriteria;  
	$criteria->addCondition('employee_id = :employee_id');
	$criteria->params = array(
			  ':employee_id' =>Yii::app()->user->getEmployeeID(),
			);
	echo CHtml::dropDownList('nomor_rek','',CHtml::listData(SetupUserBank::model()->findAll($criteria), 'nomor_rek', 'nomor_rek'), array('empty'=>'pilih rekening')); 
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

<?php 
if(isset($rekdc))
{
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Laporan Bank',
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Export', 'url'=>array('/modfinance/rekeningDc/laporanBankPdf'), 'htmlOptions'=>array('target'=>'_blank')),
			),
		),
    ),
	'content'=> $this->renderPartial('reports/_laporanbank', array('data' => $rekdc, 'saldo_akhir'=>$saldo_akhir), true),
	));
}
?>

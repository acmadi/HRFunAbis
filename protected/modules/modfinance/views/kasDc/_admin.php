<?php echo CHtml::form(array('batchDelete')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekening-dc-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows'=>2,
	'columns'=>array(
		array(
            'class'=>'CCheckBoxColumn',  
            'id'=>'id',
        ),
		array('name'=>'code_kas', 'filter'=>array(CHtml::listData(Kas::model()->findAll(), 'code_kas', 'nama_kas'))),
		array('name'=>'elbi', 'filter'=>array(CHtml::listData(Elbicode::model()->findAll(), 'elbi', 'elbi'))),
		// array(
			// 'name'=>'date',
			// 'htmlOptions'=>array('width'=>'30px'),
		// ),
		array(
            'name'=>'date',
            'class'=>'ext.EFilterDatePicker',
            'model'=>$model,
            'attribute'=>'date',
			'htmlOptions'=>array('width'=>'30px'),
            'options'=>array(
                'showAnim'=>'fade',
                'changeYear'=>true,
                'changeMonth'=>true,
                'dateFormat'=>'yy-mm-dd',
            ),
        ),
		array(
			'name'=>'transaction',
			'header'=>'Keterangan',
			'htmlOptions'=>array('width'=>'400px'),
		),
		array(
			'name'=>'currency',
			'htmlOptions'=>array('width'=>'20px'),
		),
		array(
			'name'=>'debit',
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->debit, \' \'))',
			'htmlOptions'=>array('style'=>'text-align: right;'),
		),
		array(
			'name'=>'credit',
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->credit, \' \'))',
			'htmlOptions'=>array('style'=>'text-align: right;'),
		),
		/*
		'transaction',
		'created_date',
		'created_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<!--end batch delete-->
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Batch Delete', 'htmlOptions'=>array('onclick'=>'return confirm("Are you sure you want to delete all check item? ");'),)); ?>

<?php 
// echo CHtml::submitButton('Batch Delete',array(
    // 'onclick'=>'return confirm("Are you sure you want to delete all check item? ");',
// )); ?>
<?php echo CHtml::endForm(); ?>

<!--date filter-->
<?php
//declare a 'fake' DatePicker widget to load CJuiDatepicker imports
// $this->widget('zii.widgets.jui.CJuiDatepicker', array('name' => 'CJuiDatepicker_no_filter', 'language' =>'en'), true);

// // declares a script binds the datepicker to fields you specify    
// Yii::app()->clientScript->registerScript('live_date_picker', "
	// $('input[name=\"".CHtml::activeName($model, 'date')."\"]').live('focus', function(){                                                
		// $(this).datepicker({
		// 'dateFormat':'yy-mm-dd',});  //include here your definitions for datepicker
		// });
	// ");
?>
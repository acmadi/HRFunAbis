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
		array(
			'name'=>'akun',
			'filter'=>array(CHtml::listData(Rekening::model()->findAll(), 'akun', 'akun')),
			'header'=>'COA',
			'htmlOptions'=>array('width'=>'30px'),
		),
		
		// array(
			// 'name'=>'kode_pembantu',
			// 'filter'=>array(CHtml::listData(Rekening::model()->findAll(), 'kode_pembantu', 'kode_pembantu')),
			// 'header'=>'BNT',
			// 'htmlOptions'=>array('width'=>'20px'),
		// ),

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
			'name'=>'nomor_rek',
			'filter'=>array(CHtml::listData(Rekening::model()->findAll(), 'nomor_rek', 'bank')),
			'header'=>'NOREK',
			'htmlOptions'=>array('width'=>'60px'),
		),
		array(
			'name'=>'currency',
			'header'=>'CUR',
			'htmlOptions'=>array('width'=>'20px'),
		),

		array(
			'name'=>'description',
			'htmlOptions'=>array('width'=>'400px'),
		),
		
		// array(
			// 'class' => 'editable.EditableColumn',
			// 'name' => 'debit',
			// 'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->debit, \' \'))',
			// 'headerHtmlOptions' => array('style' => 'width: 70px'),
			// 'editable' => array( //editable section
			// 'url' => $this->createUrl('rekeningDc/ajaxupdate'),
			// 'placement' => 'right',
			// )
		// ),
		
		// array(
			// 'class' => 'editable.EditableColumn',
			// 'name' => 'credit',
			// 'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->credit, \' \'))',
			// 'headerHtmlOptions' => array('style' => 'width: 70px'),
			// 'editable' => array( //editable section
			// 'url' => $this->createUrl('rekeningDc/ajaxupdate'),
			// 'placement' => 'right',
			// )
		// ),
		
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
		'description',
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

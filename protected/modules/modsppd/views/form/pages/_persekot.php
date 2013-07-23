<?php if ($data != null) { 
	$persekotdetaillist = PersekotDetail::model()->findAllByAttributes(array('parent_id' => $data->id));
	$persekotdetail = new CArrayDataProvider($persekotdetaillist,array(
					'id' => 'id',
					));

?>
<div class="span12">
	<div class="span6">
		<table class="table">
			<tr><td>DIBAYAR KEPADA</td><td>:</td><td>
			<?php
				$this->widget('editable.Editable', array(
				'type' => 'text',
				'name' => 'paid_to',
				'pk' => $data->id,
				'text' => $data->paid_to,
				'url' => $this->createUrl('persekot/ajaxupdate'),
				'title' => 'Dibayar Kepada',
				'placement' => 'right'
				));
			?>
				
			</td></tr>
			<tr><td>DITERIMA DARI</td><td>:</td><td><?php echo $data->received_from;?></td></tr>
			<tr><td>SEJUMLAH</td><td>:</td><td><?php echo Yii::app()->numberFormatter->formatCurrency($data->amount,'');?></td></tr>
			<tr><td>TERBILANG</td><td>:</td><td><?php echo $data->amount_in_words;?></td></tr>
		</table>
	</div>
	<div class="span6">
		<table class="table">
			<tr><td>Tanggal Voucher</td><td>:</td><td><?php echo $data->voucher_date;?></td></tr>
			<tr><td>Nomor Voucher</td><td>:</td><td><?php echo $data->voucher_number;?></td></tr>
			<tr><td>Nomor Journal</td><td>:</td><td><?php echo $data->journal_number;?></td></tr>
			<tr><td>Kode Bank</td><td>:</td><td><?php echo $data->bank_code;?></td></tr>
			<tr><td>Kode Valuta</td><td>:</td><td><?php echo $data->currency_code;?></td></tr>
			<tr><td>Nomor Cek/Giro</td><td>:</td><td><?php echo $data->check_giro_number;?></td></tr>
			<tr><td>Tanggal Cek/Giro</td><td>:</td><td><?php echo $data->check_giro_date;?></td></tr>
		</table>
	</div>	
</div>
<div class="span12">	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'persekot-detail-grid',
		'summaryText' => '',
		'dataProvider'=>$persekotdetail,
		// 'filter'=>$model,
		'columns'=>array(
			array(
	            'header'=>'No',
	            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
	            'htmlOptions' => array('style' => 'width:10px')
	        ),
			// 'id',
			'account_code',
			'description',
			array(
				'name'=>'debit',
				'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->debit,\'\'))',
				'htmlOptions' => array('style' => 'text-align:right')
			),
			array(
				'name'=>'credit',
				'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->credit,\'\'))',
				'htmlOptions' => array('style' => 'text-align:right')
			),
			// 'created_date',
			// 'created_by',
			array(
				'class'=>'CButtonColumn',
				'buttons' => array(
					'view'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/persekotDetail/view", array("id"=>$data->id))',
	            		),
	            	'update'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/persekotDetail/update", array("id"=>$data->id))',
	            		),
	            	'delete'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/persekotDetail/delete", array("id"=>$data->id))',
	            		),
					),
			),
		),
	)); ?>
</div>



<div class="span12">	
KETERANGAN : <?php
				$this->widget('editable.Editable', array(
				'type' => 'textarea',
				'name' => 'notes',
				'pk' => $data->id,
				'text' => $data->notes,
				'url' => $this->createUrl('persekot/ajaxupdate'),
				'title' => 'Enter Keterangan',
				'placement' => 'right'
				));
			?>

</div>	
<?php } else {
	echo 'Tidak Mengajukan Persekot';
}?>
<?php if ($data != null) { 
	$persekotdetaillist = PersekotDetail::model()->findAllByAttributes(array('parent_id' => $data->id));
	$persekotdetail = new CArrayDataProvider($persekotdetaillist,array(
					'id' => 'id',
					'pagination'=> false,
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
			<tr><td>DITERIMA DARI</td><td>:</td>
				<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'received_from',
					'pk' => $data->id,
					'text' => $data->received_from,
					'url' => $this->createUrl('persekot/ajaxupdate'),
					'title' => 'Diterima Dari',
					'placement' => 'right'
					));
				?>
				</td>
			</tr>
			<tr><td>SEJUMLAH</td><td>:</td>
				<td>
					<?php echo Yii::app()->numberFormatter->formatCurrency($data->amount,'');?>
				</td>
			</tr>
			<tr><td>TERBILANG</td><td>:</td>
				<td>
					<?php
						$this->widget('editable.Editable', array(
						'type' => 'text',
						'name' => 'amount_in_words',
						'pk' => $data->id,
						'text' => $data->amount_in_words,
						'url' => $this->createUrl('persekot/ajaxupdate'),
						'title' => 'Terbilang',
						'placement' => 'right'
						));
					?>
				</td>
			</tr>
		</table>
	</div>
	<div class="span6">
		<table class="table">
			<tr><td>Tanggal Voucher</td><td>:</td>
				<td>
					<?php
						$this->widget('editable.Editable', array(
						'type' => 'date',
						'name' => 'voucher_date',
						'pk' => $data->id,
						'text' => $data->voucher_date,
						'url' => $this->createUrl('persekot/ajaxupdate'),
						'title' => 'Tanggal Voucher',
						'placement' => 'left'
						));
					?>
				</td>
			</tr>
			<tr><td>Nomor Voucher</td><td>:</td>
				<td>
					<?php
						$this->widget('editable.Editable', array(
						'type' => 'text',
						'name' => 'voucher_number',
						'pk' => $data->id,
						'text' => $data->voucher_number,
						'url' => $this->createUrl('persekot/ajaxupdate'),
						'title' => 'Nomor Voucher',
						'placement' => 'left'
						));
					?>
				</td>
			</tr>
			<tr><td>Nomor Journal</td><td>:</td>
				<td>
					<?php
						$this->widget('editable.Editable', array(
						'type' => 'text',
						'name' => 'journal_number',
						'pk' => $data->id,
						'text' => $data->journal_number,
						'url' => $this->createUrl('persekot/ajaxupdate'),
						'title' => 'Nomor Jurnal',
						'placement' => 'left'
						));
					?>
				</td>
			</tr>
			<tr><td>Kode Bank</td><td>:</td>
				<td>
					<?php
						$this->widget('editable.Editable', array(
						'type' => 'text',
						'name' => 'bank_code',
						'pk' => $data->id,
						'text' => $data->bank_code,
						'url' => $this->createUrl('persekot/ajaxupdate'),
						'title' => 'Kode Bank',
						'placement' => 'left'
						));
					?>
				</td>
			</tr>
			<tr><td>Kode Valuta</td><td>:</td>
				<td>
					<?php
						$this->widget('editable.Editable', array(
						'type' => 'text',
						'name' => 'currency_code',
						'pk' => $data->id,
						'text' => $data->currency_code,
						'url' => $this->createUrl('persekot/ajaxupdate'),
						'title' => 'Kode Valuta',
						'placement' => 'left'
						));
					?>
				</td>
			</tr>
			<tr><td>Nomor Cek/Giro</td><td>:</td>
				<td>
					<?php
						$this->widget('editable.Editable', array(
						'type' => 'text',
						'name' => 'check_giro_number',
						'pk' => $data->id,
						'text' => $data->check_giro_number,
						'url' => $this->createUrl('persekot/ajaxupdate'),
						'title' => 'Nomor Cek/Giro',
						'placement' => 'left'
						));
					?>
				</td>
			</tr>
			<tr><td>Tanggal Cek/Giro</td><td>:</td>
				<td>
					<?php
						$this->widget('editable.Editable', array(
						'type' => 'date',
						'name' => 'check_giro_date',
						'pk' => $data->id,
						'text' => $data->check_giro_date,
						'url' => $this->createUrl('persekot/ajaxupdate'),
						'title' => 'Tanggal Cek/Giro',
						'placement' => 'left'
						));
					?>
				</td>
			</tr>
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
	            'value'=>'$row+1',       //  row is zero based
	            'htmlOptions' => array('style' => 'width:10px')
	        ),
			// 'id',
			'name',
			'account_code',
			array(
				'name' => 'description',
				'footer' => 'Total',
				'footerHtmlOptions' => array('style' => 'text-align:right; font-weight:bold'),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'debit',
				'footer' => Yii::app()->numberFormatter->formatCurrency(PersekotDetail::model()->getTotalDebit($data->id),''),
				'headerHtmlOptions' => array('style' => 'width: 110px'),
				'htmlOptions' => array('style' => 'text-align:right'),
				'footerHtmlOptions' => array('style' => 'text-align:right; font-weight:bold'),
				'editable' => array( //editable section
					'url' => $this->createUrl('persekotDetail/ajaxupdate'),
					'placement' => 'left',
				),
			),
			array(
				'class' => 'editable.EditableColumn',
				'name' => 'credit',
				'footer' => Yii::app()->numberFormatter->formatCurrency(PersekotDetail::model()->getTotalCredit($data->id),''),
				'headerHtmlOptions' => array('style' => 'width: 110px'),
				'htmlOptions' => array('style' => 'text-align:right'),
				'footerHtmlOptions' => array('style' => 'text-align:right; font-weight:bold'),
				'editable' => array( //editable section
					'url' => $this->createUrl('persekotDetail/ajaxupdate'),
					'placement' => 'left',
				),
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
<?php } ?>
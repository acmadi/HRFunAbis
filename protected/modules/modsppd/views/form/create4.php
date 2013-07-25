<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'SPPD'=>array('admin'),
	'Tambah SPPD',
	'Persekot'
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Manage Form', 'url'=>array('admin')),
);
?>

Step 4 of 4
<div class="progress progress-striped active">
  <div class="bar" style="width: 100%;"></div>
</div>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Kas dan Bank Voucher',
	));		
?>

<div class="row-fluid">
  <div class="span12">
	<div class="span6">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$persekot,
			'attributes'=>array(
				'paid_to',
				'received_from',
				array(
					'name'=>'amount',
					'value'=>Yii::app()->numberFormatter->formatCurrency($persekot->amount,''),
					),
				'amount_in_words',
			),
		)); ?>
	</div>
	<div class="span6">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$persekot,
			'attributes'=>array(
				'voucher_date',
				'voucher_number',
				'journal_number',
				'bank_code',
				'currency_code',
				'check_giro_number',
				'check_giro_date',
			),
		)); ?>
	</div>
  </div>
</div>
<?php $this->endWidget() ?>
<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Detail Persekot',
	));		
?>
<div class="row-fluid">
	<div class="span12">
		<table>
			<tr>
				<th>Kode Akun</th>
				<th>Uraian</th>
				<th>Debet</th>
				<th>Kredit</th>
			</tr>
			<tr>
				<td><?php echo $persekotdetail->account_code?></td>
				<td><?php echo $persekotdetail->description?></td>
				<td><?php echo Yii::app()->numberFormatter->formatCurrency($persekotdetail->debit,'')?></td>
				<td><?php echo $persekotdetail->credit?></td>
			</tr>
		</table>
	</div>
</div>
<?php $this->endWidget() ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Selesai',
	    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
	    'htmlOptions' => array(
	    					'style' => 'width:50px'
	    					),
	    'url'=>array('view','id'=>$model->id),
	)); ?>
</div>


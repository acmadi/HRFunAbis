<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Pengadaan',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>Vendor</th>
	<th>Kontrak</th>
	<th>Tanggal Mulai Kontrak</th>
	<th>Tanggal Berakhir Kontrak</th>
	<th>Periode Bulan</th>
	<th>Barang</th>
	<th>Harga Barang</th>
	<th>Jumlah</th>
	<th>Total Harga</th>
	<th>Lokasi</th>
</thead>
<tbody>
	<?php
		$count = 1;
		$total;
		foreach($data as $dt):
	?>

		<tr class = "<?php echo $count%2?'even':'odd';?>">
			<td>		
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'label'=>'delete',
					'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					'size'=>'mini', // null, 'large', 'small' or 'mini'
					'url'=>array('procurement/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>

			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'vendor',
					'pk' => $dt->id,
					'text' => $dt->vendor,
					'url' => $this->createUrl('/modproject/procurement/ajaxupdate'),
					'title' => 'Masukkan Vendor',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'contract',
					'pk' => $dt->id,
					'text' => $dt->contract,
					'url' => $this->createUrl('/modproject/procurement/ajaxupdate'),
					'title' => 'Masukkan Kontrak',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'contract_start_date',
					'pk' => $dt->id,
					'text' => $dt->contract_start_date,
					'url' => $this->createUrl('/modproject/procurement/ajaxupdate'),
					'title' => 'Masukkan Tanggal Mulai Kontrak',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'contract_end_date',
					'pk' => $dt->id,
					'text' => $dt->contract_end_date,
					'url' => $this->createUrl('/modproject/procurement/ajaxupdate'),
					'title' => 'Masukkan Tanggal Berakhir Kontrak',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'period_month',
					'pk' => $dt->id,
					'text' => $dt->period_month,
					'url' => $this->createUrl('/modproject/procurement/ajaxupdate'),
					'title' => 'Masukkan Bulan Periode',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'item',
					'pk' => $dt->id,
					'text' => $dt->item,
					'url' => $this->createUrl('/modproject/procurement/ajaxupdate'),
					'title' => 'Masukkan Barang',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'unit_price',
					'pk' => $dt->id,
					'text' => CHtml::encode(Yii::app()->numberFormatter->formatCurrency($dt->unit_price,'')),
					'url' => $this->createUrl('/modproject/procurement/ajaxupdate'),
					'title' => 'Masukkan Harga Barang',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'amount',
					'pk' => $dt->id,
					'text' => $dt->amount,
					'url' => $this->createUrl('/modproject/procurement/ajaxupdate'),
					'title' => 'Masukkan Jumlah',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php echo CHtml::encode(Yii::app()->numberFormatter->formatCurrency($dt->total_price,''))?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'location',
					'pk' => $dt->id,
					'text' => $dt->location,
					'url' => $this->createUrl('/modproject/procurement/ajaxupdate'),
					'title' => 'Masukkan Lokasi',
					'placement' => 'right'
					));
				?>
			</td>
		</tr>
	<?php
		$count++;
		endforeach;
	?>	
</tbody>
</table>
<?php $this->endWidget();?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttons'=>array(
		array('label'=>'Create', 'url'=>array('/modproject/procurement/create'))
	),
)); ?>
</div>
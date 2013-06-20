<div style="text-align: center;">
	<h4>
	Buku Bank<br/>
	<?php echo Rekening::model()->getBank(Yii::app()->session['nomor_rek']);?><br/>
	
	Periode :<br/>
	<?php echo date('d F Y',strtotime(Yii::app()->session['from_date'])).' sampai '.date('d F Y',strtotime(Yii::app()->session['to_date']));?>
	</h4>
</div>
<table class="gridtable">
<thead>
	<tr>
		<th width = "20">NO</th>
		<th width = "50">TANGGAL</th>
		<th width = "200">KETERANGAN</th>
		<th width = "200" style="text-align:right;">TRANSAKSI</th>
		<th width = "200" style="text-align:right;">SALDO</th>
		
		
	</tr>
</thead>
<tbody>
	<?php
		$count = 1;
		
		foreach($data as $dt):

		
	?>
		
		<tr class = "<?php echo $count%2?'even':'odd';?>">
			<td><?php echo $count; ?></td>
			<td><?php echo date('d/m/Y',strtotime($dt->date)); ?></td>
			<td><?php echo $dt->description; ?></td>
			<td style="text-align:right;"><?php echo CHtml::encode(Yii::app()->numberFormatter->formatCurrency($dt->transaksi, ' ')); ?></td>
			<td style="text-align:right;"><?php echo CHtml::encode(Yii::app()->numberFormatter->formatCurrency($dt->akumulasi_saldo, ' ')); ?></td>
		</tr>
	<?php
		$count++;
		
		endforeach;
	?>	
</tbody>

</table>


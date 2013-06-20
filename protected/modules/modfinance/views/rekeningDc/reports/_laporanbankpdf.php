<div style="text-align: center;">
	<h4>
	Laporan Bank<br/>
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
		<th width = "300">KETERANGAN</th>
		<th width = "200" style="text-align:right;">DEBIT</th>
		<th width = "200" style="text-align:right;">CREDIT</th>
		
		
	</tr>
</thead>
<tbody>
	<?php
		$count = 1;
		$totaldb = 0;
		$totalcr = 0;
		$elbi = '';
		
		foreach($data as $dt):
		$totalcr = $totalcr + $dt->credit;
		$totaldb = $totaldb + $dt->debit;
		
	?>
		
		<tr class = "<?php echo $count%2?'even':'odd';?>">
			<td><?php echo $count; ?></td>
			<td><?php echo date('d/m/Y',strtotime($dt->date)); ?></td>
			<td><?php echo $dt->description; ?></td>
			<td style="text-align:right;"><?php echo CHtml::encode(Yii::app()->numberFormatter->formatCurrency($dt->debit, ' ')); ?></td>
			<td style="text-align:right;"><?php echo CHtml::encode(Yii::app()->numberFormatter->formatCurrency($dt->credit, ' ')); ?></td>
		</tr>
	<?php
		$count++;
		
		endforeach;
		
		echo '<tr><td></td><td></td><td></td>';
		echo '<td style="text-align:right;"><b>'.CHtml::encode(Yii::app()->numberFormatter->formatCurrency($totaldb, ' ')).'</b></td>';
		echo '<td style="text-align:right;"><b>'.CHtml::encode(Yii::app()->numberFormatter->formatCurrency($totalcr, ' ')).'</b></td>';
		echo '</tr>';
		
		echo '<tr><td></td><td></td><td><b>Saldo Akhir</b></td>';
		echo '<td style="text-align:right;"><b>'.CHtml::encode(Yii::app()->numberFormatter->formatCurrency($saldo_akhir, ' ')).'</b></td>';
		echo '</tr>';
	?>	
</tbody>

</table>


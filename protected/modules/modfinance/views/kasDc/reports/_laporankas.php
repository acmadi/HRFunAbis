<div style="text-align: center;">
	<h4>
	Rekapitulasi Pengeluaran<br/>
	<?php if(isset($_GET['code_kas'])) echo Kas::model()->getKas($_GET['code_kas']);?><br/>
	Periode :<br/>
	<?php if(isset($_GET['code_kas'])) echo $_GET['from_date'].'&nbsp sampai &nbsp'.$_GET['to_date'];?><br/>
	</h4>
</div>
<table class="table">
<thead>
	<tr>
		<th width = "20">NO</th>
		<th width = "100">KODE EB</th>
		<th width = "100">TANGGAL</th>
		<th width = "300">KETERANGAN</th>
		<th width = "200">NOMINAL</th>
	</tr>
</thead>
<tbody>
	<?php
		$count = 1;
		$total = 0;
		$elbi = '';
		
		foreach($data as $dt):
	?>
		<?php
		if($elbi == '') 
		{
			$elbi = $dt->elbi;
			echo '<tr><td>'.$count.'</td><td>'.$dt->elbi.'</td><td>'.Elbicode::model()->getElbiName($dt->elbi).'</td><td></td><td></td></tr>';
		}
		if($dt->elbi != $elbi)
		{
			echo '<tr style="color: black; background: #F0F8FF;"><td></td><td></td><td></td><td><b>Total</b></td><td style="text-align:right;"><b>';
			echo CHtml::encode(Yii::app()->numberFormatter->formatCurrency($total, ' ')).'</b></td></tr>';
			$total = 0;
			$elbi = $dt->elbi;
			
			$count++;
			echo '<tr><td>'.$count.'</td><td>'.$dt->elbi.'</td><td>'.Elbicode::model()->getElbiName($dt->elbi).'</td><td></td><td></td></tr>';
		}
		?>
		
		<tr class = "<?php echo $count%2?'even':'odd';?>">
			<td><?php //echo $count; ?></td>
			<td><?php //echo $dt->elbi;?></td>
			<td><?php echo date('d/m/Y',strtotime($dt->date)); ?></td>
			<td><?php echo $dt->transaction; ?></td>
			<td style="text-align:right;">
				<?php 
					if($dt->debit == 0)
						echo CHtml::encode(Yii::app()->numberFormatter->formatCurrency($dt->credit, ' ')); 
					else 
						echo CHtml::encode(Yii::app()->numberFormatter->formatCurrency($dt->debit, ' ')); 
					
				?>
			</td>
		</tr>
	<?php
		if($dt->debit == 0)
			$total = $total + $dt->credit;
		else
			$total = $total + $dt->debit;
			
		endforeach;
		
		echo '<tr style="color: black; background: #F0F8FF;"><td></td><td></td><td></td><td><b>Total</b></td><td style="text-align:right;"><b>';
		echo CHtml::encode(Yii::app()->numberFormatter->formatCurrency($total, ' ')).'</b></td></tr>';
	?>	
</tbody>

</table>
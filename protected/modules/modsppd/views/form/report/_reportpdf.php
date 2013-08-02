<div style="text-align: center;">
	<h4>
	Rekapitulasi Surat Perintah Perjalanan Dinas<br/>
	</h4>
</div>
<table class="gridtable">
<thead>
	<tr>
		<th>No.</th>
		<th>name</th>
		<th>destination</th>
		<th>arrival</th>
		<th>sppd_type</th>
		<th>status</th>
		<th>amount</th>
		<th>kembali</th>
	</tr>
</thead>
<tbody>
	<?php
		$count = 1;
		foreach($data->getData() as $dt):
	?>
		<tr class = "<?php echo $count%2?'even':'odd';?>">
			<td><?php echo $count; ?></td>
			<td><?php echo $dt->name?></td>
			<td><?php echo $dt->destination?></td>
			<td><?php echo $dt->arrival?></td>
			<td><?php echo $dt->sppd_type?></td>
			<td><?php echo $dt->status?></td>
			<td><?php echo $totalAmount?></td>
			<td><?php echo $totalRemains?></td>
			<td></td>
			<td style="text-align:right;"></td>
			<td style="text-align:right;"></td>
		</tr>
	<?php
		$count++;	
		endforeach;
	?>	
</tbody>

</table>


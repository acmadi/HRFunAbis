<div class="grid-view">

<h3><?php echo 'KPI'; ?></h3>

<table class = "_detail">	
	<tbody>
<?php
	$count = 1;
	$total;
	foreach($kpi as $kp):
?>

	<tr class = "<?php echo $count%2?'even':'odd';?>">
		<td><?php echo $kp->number; ?></td>
		<td><?php echo $kp->work_target; ?></td>
	</tr>
	
<?php
	$count++;
	endforeach;
?>
	</tbody>
</table>

</div>
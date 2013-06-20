<div class="grid-view">

<table class = "_detail">
	<thead>
		<tr>
			<th>No</th>
			<th>Target Kerja</th>
			<th>Keterangan</th>
			<th>Action</th>
		</tr>
	</thead>	
	<tbody>
<?php
	$count = 1;
	$total;
	foreach($kpi as $kp):
?>

	<tr class = "<?php echo $count%2?'even':'odd';?>">
		<td><?php echo $kp->number; ?></td>
		<td><?php echo $kp->work_target; ?></td>
		<td><?php echo $kp->description; ?></td>
		<td>
			<?php $this->widget('zii.widgets.jui.CJuiButton', array(
				'buttonType'=>'link',
				'name'=>'btnDelete'.$count,
				'options'=>array('icons'=>'js:{secondary:"ui-icon-trash"}'),
				'url'=>array('kpi/delete', "id" =>$kp->id),
			)); ?>
		</td>
	</tr>
	
	
<?php
	$count++;
	endforeach;
?>
	</tbody>
</table>

</div>
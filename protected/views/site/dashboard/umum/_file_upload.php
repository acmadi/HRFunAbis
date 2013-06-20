<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Download File',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th>No</th>
	<th>Nama File</th>
	<th>Versi</th>
	<th>Tanggal</th>
	<th>Download</th>
</tr>
</thead>
<tbody>
	<?php
		$count = 1;
		$total;
		foreach($datafiles as $dt):
	?>

		<tr class = "<?php echo $count%2?'even':'odd';?>">
			<td><?php echo $count; ?></td>
			<td><?php echo $dt->name; ?></td>
			<td><?php echo $dt->version; ?></td>
			<td><?php echo date('d F Y', strtotime($dt->version_date)); ?></td>
			<td>
				<?php 
				echo Chtml::link('download',array('/modhumanresources/FilePublicationDownload/download','id'=>$dt->id));
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
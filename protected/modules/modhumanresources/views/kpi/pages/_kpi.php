<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Key Perform Indicator',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Sasaran Kerja</th>
	<th>Bentuk Target</th>
	<th>Realisasi</th>
	<th>Bobot</th>
	<th>Nilai</th>
	<th>Nilai Kinerja</th>
</tr>
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
					'url'=>array('/site/logout', "id" =>$dt->id),
				)); ?>

			</td>
			
			<td><?php echo $count; ?></td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'textarea',
					'name' => 'name',
					'pk' => $dt->id,
					'text' => $dt->sasaran_kerja,
					'url' => $this->createUrl('kpi/ajaxupdate'),
					'title' => 'Sasaran Kerja',
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'textarea',
					'name' => 'bentuk_target',
					'pk' => $dt->id,
					'text' => $dt->bentuk_target,
					'url' => $this->createUrl('kpi/ajaxupdate'),
					'title' => 'Bentuk Target',
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'textarea',
					'name' => 'realisasi',
					'pk' => $dt->id,
					'text' => $dt->realisasi,
					'url' => $this->createUrl('kpi/ajaxupdate'),
					'title' => 'Realisasi',
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'bobot',
					'pk' => $dt->id,
					'text' => $dt->bobot,
					'url' => $this->createUrl('kpi/ajaxupdate'),
					'title' => 'Realisasi',
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
		array('label'=>'Create', 'url'=>array('/modhumanresources/kpi/create'))
	),
)); ?>
</div>
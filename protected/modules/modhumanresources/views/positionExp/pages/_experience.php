<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Pengalaman Jabatan',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Jabatan</th>
	<th>Deskripsi Jabatan</th>
	<th>Mulai</th>
	<th>Selesai</th>
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
					'url'=>array('jobExperience/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>

			</td>
			<td><?php echo $count; ?></td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'position',
					'pk' => $dt->id,
					'text' => $dt->position,
					'url' => $this->createUrl('positionExp/ajaxupdate'),
					'title' => 'Enter Position',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'textarea',
					'name' => 'job_description',
					'pk' => $dt->id,
					'text' => $dt->job_description,
					'url' => $this->createUrl('positionExp/ajaxupdate'),
					'title' => 'Enter Description',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'date',
					'name' => 'period_start',
					'pk' => $dt->id,
					'text' => $dt->period_start,
					'url' => $this->createUrl('positionExp/ajaxupdate'),
					'title' => 'Enter Year',
					'placement' => 'left'
					));
				?>
			</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'date',
					'name' => 'period_finish',
					'pk' => $dt->id,
					'text' => $dt->period_finish,
					'url' => $this->createUrl('positionExp/ajaxupdate'),
					'title' => 'Enter Year',
					'placement' => 'left'
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
		array('label'=>'Create', 'url'=>array('/modhumanresources/positionExp/create'))
	),
)); ?>
</div>
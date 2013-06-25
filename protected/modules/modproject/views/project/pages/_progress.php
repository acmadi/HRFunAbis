<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Progress',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>Minggu</th>
	<th>Bulan</th>
	<th>Progress(act)</th>
	<th>Progress(plan)</th>
	<th>Progress Minggu ini</th>
	<th>Sisa Pekerjaan</th>
	<th>Alasan Keterlambatan</th>
	<th>PIC</th>
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
					'url'=>array('/modproject/progress/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>

			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'period_week',
					'pk' => $dt->id,
					'text' => $dt->period_week,
					'url' => $this->createUrl('/modproject/progress/ajaxupdate'),
					'title' => 'Masukkan Minggu Periode',
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
					'url' => $this->createUrl('/modproject/progress/ajaxupdate'),
					'title' => 'Masukkan Bulan Periode',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'progress_actual',
					'pk' => $dt->id,
					'text' => $dt->progress_actual,
					'url' => $this->createUrl('/modproject/progress/ajaxupdate'),
					'title' => 'Masukkan Progress Sebenarnya',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'progress_plan',
					'pk' => $dt->id,
					'text' => $dt->progress_plan,
					'url' => $this->createUrl('/modproject/progress/ajaxupdate'),
					'title' => 'Masukkan Rencana Progress',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'progress_this_week',
					'pk' => $dt->id,
					'text' => $dt->progress_this_week,
					'url' => $this->createUrl('/modproject/progress/ajaxupdate'),
					'title' => 'Masukkan Progress Minggu Ini',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'work_remaining',
					'pk' => $dt->id,
					'text' => $dt->work_remaining,
					'url' => $this->createUrl('/modproject/progress/ajaxupdate'),
					'title' => 'Masukkan Sisa Pekerjaan',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'reason_of_delay',
					'pk' => $dt->id,
					'text' => $dt->reason_of_delay,
					'url' => $this->createUrl('/modproject/progress/ajaxupdate'),
					'title' => 'Masukkan Alasan Keterlambatan',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'pic',
					'pk' => $dt->id,
					'text' => $dt->pic,
					'url' => $this->createUrl('/modproject/progress/ajaxupdate'),
					'title' => 'Masukkan PIC',
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
		array('label'=>'Create', 'url'=>array('/modproject/progress/create'))
	),
)); ?>
</div>
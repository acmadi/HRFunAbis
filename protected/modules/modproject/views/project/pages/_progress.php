<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Progress',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Tanggal Periode</th>
	<th>Minggu Periode</th>
	<th>Bulan Periode</th>
	<th>Tahun Periode</th>
	<th>Progress</th>
	<th>Deskripsi</th>
	<th>Termin PGN</th>
	<th>Termin Vendor</th>
	<th>Progress Actual</th>
	<th>Progress Plan</th>
	<th>Progress Minggu ini</th>
	<th>Pekerjaan Selesai</th>
	<th>Sisa Pekerjaan</th>
	<th>Alasan Keterlambatan</th>
	<th>PIC</th>
	<th>Tanggal Dibuat</th>
	<th>Dibuat Oleh</th>
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
					'url'=>array('progress/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>

			</td>
			
			<td><?php echo $count; ?></td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'period_date',
					'pk' => $dt->id,
					'text' => $dt->period_date,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Tanggal Periode',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'period_week',
					'pk' => $dt->id,
					'text' => $dt->period_week,
					'url' => $this->createUrl('progress/ajaxupdate'),
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
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Bulan Periode',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'period_year',
					'pk' => $dt->id,
					'text' => $dt->period_year,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Tahun Periode',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'progress',
					'pk' => $dt->id,
					'text' => $dt->progress,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Progress',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'description',
					'pk' => $dt->id,
					'text' => $dt->description,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Deskripsi',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'termin_pgn',
					'pk' => $dt->id,
					'text' => $dt->termin_pgn,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Termin PGN',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'termin_vendor',
					'pk' => $dt->id,
					'text' => $dt->termin_vendor,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Termin Vendor',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'period_date',
					'pk' => $dt->id,
					'text' => $dt->period_date,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Tanggal Periode',
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
					'url' => $this->createUrl('progress/ajaxupdate'),
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
					'url' => $this->createUrl('progress/ajaxupdate'),
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
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Progress Minggu Ini',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'completed_work',
					'pk' => $dt->id,
					'text' => $dt->completed_work,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Pekerjaan Selesai',
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
					'url' => $this->createUrl('progress/ajaxupdate'),
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
					'url' => $this->createUrl('progress/ajaxupdate'),
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
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan PIC',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'created_by',
					'pk' => $dt->id,
					'text' => $dt->created_by,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Dibuat Oleh',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'created_date',
					'pk' => $dt->id,
					'text' => $dt->created_date,
					'url' => $this->createUrl('progress/ajaxupdate'),
					'title' => 'Masukkan Tanggal Dibuat',
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
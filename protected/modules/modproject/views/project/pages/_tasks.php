<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Task',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Kode</th>
	<th>Nama</th>
	<th>Deskripsi</th>
	<th>Rencana Tanggal Mulai</th>
	<th>Rencana Tanggal Selesai</th>
	<th>Progress yang Diharapkan</th>
	<th>Tanggal Mulai</th>
	<th>Tanggal Selesai</th>
	<th>Progress</th>
	<th>Keterangan</th>
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
					'url'=>array('task/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>

			</td>
			
			<td><?php echo $count; ?></td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'code',
					'pk' => $dt->id,
					'text' => $dt->code,
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'name',
					'pk' => $dt->id,
					'text' => $dt->name,
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
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
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'plan_start_date',
					'pk' => $dt->id,
					'text' => $dt->plan_start_date,
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'plan_end_date',
					'pk' => $dt->id,
					'text' => $dt->plan_end_date,
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'plan_progress',
					'pk' => $dt->id,
					'text' => $dt->plan_progress,
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'act_start_date',
					'pk' => $dt->id,
					'text' => $dt->act_start_date,
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'act_end_date',
					'pk' => $dt->id,
					'text' => $dt->act_end_date,
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'actual_progress',
					'pk' => $dt->id,
					'text' => $dt->actual_progress,
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'remarks',
					'pk' => $dt->id,
					'text' => $dt->remarks,
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
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
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
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
					'url' => $this->createUrl('task/ajaxupdate'),
					'title' => 'Enter user name',
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
		array('label'=>'Create', 'url'=>array('/modproject/task/create'))
	),
)); ?>
</div>
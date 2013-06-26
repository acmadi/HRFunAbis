<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Personil',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>ID Pegawai</th>
	<th>Nama</th>
	<th>Posisi</th>
	<th>Mulai Kerja</th>
	<th>Selesai Kerja</th>
	<th>Telepon</th>
	<th>Total ManDays</th>
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
					'url'=>array('/modproject/personel/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>
			</td>
		
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'employee_id',
					'pk' => $dt->id,
					'text' => $dt->employee_id,
					'url' => $this->createUrl('/modproject/personel/ajaxupdate'),
					'title' => 'Masukkan ID Pegawai',
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
					'url' => $this->createUrl('/modproject/personel/ajaxupdate'),
					'title' => 'Masukkan Nama',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'position',
					'pk' => $dt->id,
					'text' => $dt->position,
					'url' => $this->createUrl('/modproject/personel/ajaxupdate'),
					'title' => 'Masukkan Jabatan',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'start_join',
					'pk' => $dt->id,
					'text' => $dt->start_join,
					'url' => $this->createUrl('/modproject/personel/ajaxupdate'),
					'title' => 'Masukkan Jabatan',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'end_join',
					'pk' => $dt->id,
					'text' => $dt->end_join,
					'url' => $this->createUrl('/modproject/personel/ajaxupdate'),
					'title' => 'Masukkan Jabatan',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'telepon',
					'pk' => $dt->id,
					'text' => $dt->telepon,
					'url' => $this->createUrl('/modproject/personel/ajaxupdate'),
					'title' => 'Masukkan Jabatan',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php echo PersonelMandays::model()->getTotalMandays($dt->employee_id); ?>
			</td>
			<td>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'label'=>'detail',
					'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					'size'=>'mini', // null, 'large', 'small' or 'mini'
					'url'=>array('/modproject/personelmandays/detail', "employee_id" =>$dt->employee_id),
					'htmlOptions' => array('target'=>'_blank')
				)); ?>
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
		array('label'=>'Create', 'url'=>array('/modproject/personel/create'))
	),
)); ?>
</div>
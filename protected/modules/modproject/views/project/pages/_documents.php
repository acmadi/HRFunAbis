<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Dokumen',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Tipe</th>
	<th>Task</th>
	<th>Nomor Dokumen</th>
	<th>Versi</th>
	<th>Tanggal Versi</th>
	<th>Pemilik</th>
	<th>Distribusi</th>
	<th>Deskripsi Dokumen</th>
	<th>Berkas Terlampir</th>
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
					'url'=>array('document/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>
			
				<?php $this->widget('bootstrap.widgets.TbButton', array(
				    'label'=>'Download',
				    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				    'size'=>'mini', // null, 'large', 'small' or 'mini'
				    'url'=>array('document/download', 'id'=>$dt->id)
				)); ?>
			</td>
			
			<td><?php echo $count; ?></td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'type',
					'pk' => $dt->id,
					'text' => $dt->type,
					'url' => $this->createUrl('document/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'task_id',
					'pk' => $dt->id,
					'text' => $dt->task_id,
					'url' => $this->createUrl('document/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'document_number',
					'pk' => $dt->id,
					'text' => $dt->document_number,
					'url' => $this->createUrl('document/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'version',
					'pk' => $dt->id,
					'text' => $dt->version,
					'url' => $this->createUrl('document/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'version_date',
					'pk' => $dt->id,
					'text' => $dt->version_date,
					'url' => $this->createUrl('document/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'owner',
					'pk' => $dt->id,
					'text' => $dt->owner,
					'url' => $this->createUrl('document/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'distribution',
					'pk' => $dt->id,
					'text' => $dt->distribution,
					'url' => $this->createUrl('document/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'document_description',
					'pk' => $dt->id,
					'text' => $dt->document_description,
					'url' => $this->createUrl('document/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'file_attached',
					'pk' => $dt->id,
					'text' => $dt->file_attached,
					'url' => $this->createUrl('document/ajaxupdate'),
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
					'url' => $this->createUrl('document/ajaxupdate'),
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
					'url' => $this->createUrl('document/ajaxupdate'),
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
		array('label'=>'Create', 'url'=>array('/modproject/document/create'))
	),
)); ?>
</div>
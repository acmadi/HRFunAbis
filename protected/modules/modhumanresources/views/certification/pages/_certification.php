<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Pendidikan Informal',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Jenis Sertifikat</th>
	<th>Nama Sertifikat</th>
	<th>Tahun</th>
	<th>Attachment</th>
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
					'url'=>array('certification/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
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
					'url' => $this->createUrl('certification/ajaxupdate'),
					'title' => 'Enter Type',
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'certification_name',
					'pk' => $dt->id,
					'text' => $dt->certification_name,
					'url' => $this->createUrl('certification/ajaxupdate'),
					'title' => 'Enter Certification',
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'date',
					'name' => 'year_certification',
					'pk' => $dt->id,
					'text' => $dt->year_certification,
					'url' => $this->createUrl('certification/ajaxupdate'),
					'title' => 'Enter Year',
					'placement' => 'left'
					));
				?>
			</td>
			<td>
				<?php 
				echo Chtml::link('download',array('certification/download','id'=>$dt->id));
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
		array('label'=>'Create', 'url'=>array('/modhumanresources/certification/create'))
	),
)); ?>
</div>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Kontak Emergency',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Nama</th>
	<th>Hubungan</th>
	<th>Alamat</th>
	<th>Telepon</th>
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
					'url'=>array('emergencyRecord/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>

			</td>
			<td><?php echo $count; ?></td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'name',
					'pk' => $dt->id,
					'text' => $dt->name,
					'url' => $this->createUrl('emergencyRecord/ajaxupdate'),
					'title' => 'Enter Name',
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'select',
					'name' => 'relationship',
					'pk' => $dt->id,
					'text' => $dt->relationship,
					'url' => $this->createUrl('emergencyRecord/ajaxupdate'),
					'title' => 'Enter relationship',
					'source'    => $model->getRelationshipOptions(),
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'textarea',
					'name' => 'address',
					'pk' => $dt->id,
					'text' => $dt->address,
					'url' => $this->createUrl('emergencyRecord/ajaxupdate'),
					'title' => 'Enter address',
					'placement' => 'left'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'phone',
					'pk' => $dt->id,
					'text' => $dt->phone,
					'url' => $this->createUrl('emergencyRecord/ajaxupdate'),
					'title' => 'Enter phone',
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
		array('label'=>'Create', 'url'=>array('/modhumanresources/emergencyRecord/create'))
	),
)); ?>
</div>
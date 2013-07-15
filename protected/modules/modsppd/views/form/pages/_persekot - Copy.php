<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Tanggungan',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Nama</th>
	<th>Hubungan</th>
	<th>Jenis Kelamin</th>
	<th>Tanggal Lahir</th>
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
					'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					'size'=>'mini', // null, 'large', 'small' or 'mini'
					'url'=>array('dependent/delete', "id" =>$dt->id),
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
					'url' => $this->createUrl('dependent/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php //echo $dt->relationship; 
					$this->widget('editable.Editable', array(
					'type' => 'select',
					'name' => 'relationship',
					'pk' => $dt->id,
					'text' => $dt->relationship,
					'url' => $this->createUrl('dependent/ajaxupdate'),
					'title' => 'Select Dependent',
					'source'    => Dependent::model()->getRelationshipOptions(),
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php  
					$this->widget('editable.Editable', array(
					'type' => 'select',
					'name' => 'gender',
					'pk' => $dt->id,
					'text' => $dt->gender,
					'url' => $this->createUrl('dependent/ajaxupdate'),
					'title' => 'Select Gender',
					'source'    => Dependent::model()->getGenderOptions(),
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'date',
					'name' => 'date_of_birth',
					'pk' => $dt->id,
					'text' => $dt->date_of_birth,
					'url' => $this->createUrl('dependent/ajaxupdate'),
					'title' => 'Select Date',
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
		array('label'=>'Create', 'url'=>array('/modhumanresources/dependent/create'))
	),
)); ?>
</div>
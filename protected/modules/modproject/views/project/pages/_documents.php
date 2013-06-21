<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Dokumen',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Nomor Dokumen</th>
	<th>Deskripsi Dokumen</th>
	<th></th>
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
					'url'=>array('dependent/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>

			</td>
			
			<td><?php echo $count; ?></td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'document_number',
					'pk' => $dt->id,
					'text' => $dt->document_number,
					'url' => $this->createUrl('dependent/ajaxupdate'),
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
					'url' => $this->createUrl('dependent/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
				    'label'=>'Download',
				    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				    'size'=>'mini', // null, 'large', 'small' or 'mini'
				    'url'=>array('document/download', 'id'=>$dt->id)
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
		array('label'=>'Create', 'url'=>array('/modproject/document/create'))
	),
)); ?>
</div>
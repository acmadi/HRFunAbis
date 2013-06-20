<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Informasi Pendidikan',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Universitas</th>
	<th>Fakultas</th>
	<th>Jurusan</th>
	<th>Kota</th>
	<th>Mulai</th>
	<th>Selesai</th>
	<th>Tingkat</th>
	<th>IPK</th>
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
					'url'=>array('education/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>

			</td>
			<td><?php echo $count; ?></td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'university',
					'pk' => $dt->id,
					'text' => $dt->university,
					'url' => $this->createUrl('education/ajaxupdate'),
					'title' => 'Enter University',
					'placement' => 'right'
					));
				?>
			</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'formal_edu',
					'pk' => $dt->id,
					'text' => $dt->formal_edu,
					'url' => $this->createUrl('education/ajaxupdate'),
					'title' => 'Enter formal edu',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'major',
					'pk' => $dt->id,
					'text' => $dt->major,
					'url' => $this->createUrl('education/ajaxupdate'),
					'title' => 'Enter major',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'town',
					'pk' => $dt->id,
					'text' => $dt->town,
					'url' => $this->createUrl('education/ajaxupdate'),
					'title' => 'Enter town',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'date',
					'name' => 'year_start',
					'pk' => $dt->id,
					'text' => $dt->year_start,
					'url' => $this->createUrl('education/ajaxupdate'),
					'title' => 'Enter Year',
					'placement' => 'left'
					));
				?>
			</td>
			
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'date',
					'name' => 'year_finish',
					'pk' => $dt->id,
					'text' => $dt->year_finish,
					'url' => $this->createUrl('education/ajaxupdate'),
					'title' => 'Enter Year',
					'placement' => 'left'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'select',
					'name' => 'strata',
					'pk' => $dt->id,
					'text' => $dt->strata,
					'url' => $this->createUrl('education/ajaxupdate'),
					'title' => 'Enter strata',
					'source' => $model->getStrataOptions(),
					'placement' => 'left'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'rating_type',
					'pk' => $dt->id,
					'text' => $dt->rating_type,
					'url' => $this->createUrl('education/ajaxupdate'),
					'title' => 'Enter Rating',
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
		array('label'=>'Create', 'url'=>array('/modhumanresources/education/create'))
	),
)); ?>
</div>
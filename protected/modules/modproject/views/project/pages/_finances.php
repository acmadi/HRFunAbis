<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Finansial',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>No</th>
	<th>Elbi</th>
	<th>Deskripsi Elbi</th>
	<th>Periode Bulan</th>
	<th>Debit</th>
	<th>Kredit</th>
	<th>Keterangan</th>
	<th>Dibuat oleh</th>
	<th>Tanggal Dibuat</th>
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
					'url'=>array('finance/delete', "id" =>$dt->id),
					'htmlOptions'=>array('confirm'=>'Are you sure to delete?'),
				)); ?>

			</td>
			
			<td><?php echo $count; ?></td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'elbi',
					'pk' => $dt->id,
					'text' => $dt->elbi,
					'url' => $this->createUrl('finance/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'elbi_desc',
					'pk' => $dt->id,
					'text' => $dt->elbi_desc,
					'url' => $this->createUrl('finance/ajaxupdate'),
					'title' => 'Enter user name',
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
					'url' => $this->createUrl('finance/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'debit',
					'pk' => $dt->id,
					'text' => $dt->debit,
					'url' => $this->createUrl('finance/ajaxupdate'),
					'title' => 'Enter user name',
					'placement' => 'right'
					));
				?>
			</td>

			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'credit',
					'pk' => $dt->id,
					'text' => $dt->credit,
					'url' => $this->createUrl('finance/ajaxupdate'),
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
					'url' => $this->createUrl('finance/ajaxupdate'),
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
					'url' => $this->createUrl('finance/ajaxupdate'),
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
					'url' => $this->createUrl('finance/ajaxupdate'),
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
		array('label'=>'Create', 'url'=>array('/modproject/finance/create'))
	),
)); ?>
</div>
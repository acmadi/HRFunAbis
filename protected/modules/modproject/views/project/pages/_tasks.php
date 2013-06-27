<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Task',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
	<th></th>
	<th>Penomoran</th>
	<th>Task</th>
	<th>Mulai(plan)</th>
	<th>Selesai(plan)</th>
	<th>Progress(plan)</th>
	<th>Mulai(real)</th>
	<th>Selesai(real)</th>
	<th>Progress(real)</th>
	<th>Keterangan</th>
</thead>
<tbody>
	<?php
		$count = 1;
		$total;
		foreach($data as $dt):
	?>

		<tr class = "<?php echo $count%2?'even':'odd';?>">
			<td>		
			    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			    	'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					'size'=>'mini', // null, 'large', 'small' or 'mini'
				    'buttons'=>array(
				        array('label'=>'Del', 'url'=>array('/modproject/task/delete', "id" =>$dt->id), 'htmlOptions'=>array('confirm'=>'Are you sure to delete?')),
		                array('label'=>'Add Doc', 'url'=>array('/modproject/document/create', "id" =>$dt->id))
				    ),
				)); ?>

			</td>
			
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'code',
					'pk' => $dt->id,
					'text' => $dt->code,
					'url' => $this->createUrl('/modproject/task/ajaxupdate'),
					'title' => 'Masukkan Kode',
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
					'url' => $this->createUrl('/modproject/task/ajaxupdate'),
					'title' => 'Masukkan Nama',
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
					'url' => $this->createUrl('/modproject/task/ajaxupdate'),
					'title' => 'Masukkan Rencana Tanggal Mulai',
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
					'url' => $this->createUrl('/modproject/task/ajaxupdate'),
					'title' => 'Masukkan Rencana Tanggal Berakhir',
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
					'url' => $this->createUrl('/modproject/task/ajaxupdate'),
					'title' => 'Masukkan Rencana Progress',
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
					'url' => $this->createUrl('/modproject/task/ajaxupdate'),
					'title' => 'Masukkan Tanggal Mulai Sebenarnya',
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
					'url' => $this->createUrl('/modproject/task/ajaxupdate'),
					'title' => 'Masukkan Tanggal Berakhir Sebenarnya',
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
					'url' => $this->createUrl('/modproject/task/ajaxupdate'),
					'title' => 'Masukkan Progress Sebenarnya',
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
					'url' => $this->createUrl('/modproject/task/ajaxupdate'),
					'title' => 'Masukkan Keterangan',
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


<?php 
// $this->widget('ext.QTreeGridView.CQTreeGridView', array(
//     'id'=>'task-grid',
//     // 'cssFile'=>false,
//     'ajaxUpdate' => false,
//     'dataProvider'=>$taskData,
//     'columns'=>array(
// 	        'id',
// 			// 'project_number',
// 			// 'code',
// 			'name',
// 			// 'description',
// 			// 'plan_start_date',
// 			// 'plan_end_date',
// 			// 'plan_progress',
// 			// 'act_start_date',
// 			// 'act_end_date',
// 			// 'actual_progress',
// 			// 'remarks',
// 			// 'created_date',
// 			// 'created_by',
//         array(
//             'class'=>'CButtonColumn',
//             'template'=>'{view}{update}{add}{delete}',
//             'buttons'=> array(
//             	'add'=>array(
//             		'label'=>'Add Task',
//             		'imageUrl'=>Yii::app()->request->baseUrl.'/images/add.png',
// 		            'url'=>'Yii::app()->createUrl("modproject/task/create", array("id"=>$data->id))',
//             		),
// 	        	)
// 	        ),
// 	    ),
// ));
?>

<?php $this->endWidget();?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttons'=>array(
		array('label'=>'Create', 'url'=>array('/modproject/task/create'))
	),
)); ?>
</div>
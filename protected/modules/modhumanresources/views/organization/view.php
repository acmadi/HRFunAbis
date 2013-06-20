<?php
$this->breadcrumbs=array(
	'Menu Nesteds'=>array('index'),
	$model->title,
);

$this->menu=array(
	// array('label'=>'List Organization', 'url'=>array('index')),
	// array('label'=>'Create Organization', 'url'=>array('create')),
	array('label'=>'Update', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Delete Organization', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage Organization', 'url'=>array('admin')),
	array('label'=>'Add KPI', 'url'=>array('kpi/create', 'id_org'=>$model->id)),
);
?>

<h3><?php echo $model->title; ?></h3>

<table>
	<tr>
		<td>
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					//'id',
					'title',
					// 'lft',
					// 'url',
					// 'visible',
					// 'task',
					//'pic',
					array(
					'name'=>'pic',
					'value'=>Employee::model()->getName($model->pic),
					),
				),
			)); ?>
		</td>
		<td>
		</td>
		<td rowspan="2">
			<?php
			echo CHtml::image( Yii::app()->baseUrl."/".Employee::model()->getPhoto($model->pic),"DORE",array("width"=>120,"height"=>150));
			?>
		</td>
	</tr>	
	<tr>
		<td>
		<?php $this->renderPartial('__kpi',array('kpi'=>$kpi,)); ?>
		</td>
		<td>
		</td>
	</tr>	
</table>

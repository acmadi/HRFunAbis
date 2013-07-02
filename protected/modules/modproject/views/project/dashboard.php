<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
);
?>

<table class="table table-striped table-bordered">
  <tbody>
	<tr>
		<td width="20%">Nomor Proyek</td>
	  	<td><?php echo $model->number?></td>
	</tr>		
	<tr>
		<td width="20%">Nama Proyek</td>
		<td><?php echo $model->name?></td>
	</tr>
  </tbody>
</table>
<div class="row-fluid">

  <div class="span9">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Kurva S",
		));
		
	?>	
	<?php $this->widget('application.extensions.projectSCurve.ProjectSCurve');?>
	<?php $this->endWidget();?>
 </div>
  <div class="span3">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Progress",
		));
		
	?>		
		<table>
			<tr><td style = "text-align:center"><?php $this->widget('ext.egauge.EGauge',array('value'=>$model->progress));?>Realisasi</td></tr>
			<tr><td style = "text-align:center"><?php $this->widget('ext.egauge.EGauge',array('value'=>$model->progress_plan));?>Plan</td></tr>
		</table>
	<?php $this->endWidget();?>	
  </div>
  
</div>


<div class="row-fluid">
  <div class="span12">
	<?php 
	$tab0 = true;
	$tab1 = false;if(isset($_GET['progress'])) {$tab1 = true; $tab0 = false;}
	$tab2 = false;if(isset($_GET['task'])) {$tab2 = true; $tab0 = false;}
	$tab3 = false;if(isset($_GET['document'])) {$tab3 = true; $tab0 = false;}
	$tab4 = false;if(isset($_GET['finance'])) {$tab4 = true; $tab0 = false;}
	$tab5 = false;if(isset($_GET['procurement'])) {$tab5 = true; $tab0 = false;}
	$tab6 = false;if(isset($_GET['personel'])) {$tab6 = true; $tab0 = false;}
	
	$tabs = array(
		array('id' => 'tab0', 'label' => 'Info', 'content' => $this->renderPartial('pages/_info', array('model' => $model), true), 'active' => $tab0),
		array('id' => 'tab1', 'label' => 'Progress', 'content' => $this->renderPartial('pages/_progress', array('data' => $progress), true), 'active' => $tab1),
		array('id' => 'tab2', 'label' => 'Task', 'content' => $this->renderPartial('pages/_tasks', array('data' => $tasks), true), 'active' => $tab2),
		array('id' => 'tab3', 'label' => 'Document', 'content' => $this->renderPartial('pages/_documents', array('data' => $documents), true), 'active' => $tab3),
		array('id' => 'tab4', 'label' => 'Finance', 'content' => $this->renderPartial('pages/_finances', array('data' => $finances), true), 'active' => $tab4),
		array('id' => 'tab5', 'label' => 'Procurement', 'content' => $this->renderPartial('pages/_procurements', array('data' => $procurements), true), 'active' => $tab5),
		array('id' => 'tab6', 'label' => 'Personel', 'content' => $this->renderPartial('pages/_personels', array('data' => $personels), true), 'active' => $tab6),

	);

	$this->widget('bootstrap.widgets.TbWizard', array(
		'id' => 'mytabs',
		'type' => 'tabs',
		'placement'=> 'top',
		'tabs' => $tabs,
		//'htmlOptions' => array('class'=>'span20'),
	));
	?>
  </div>
</div>
<?php
// $this->breadcrumbs=array(
	// 'Dependents'=>array('index'),
	// 'Create',
// );

// $this->menu=array(
	// array('label'=>'List Dependent', 'url'=>array('index')),
	// array('label'=>'Manage Dependent', 'url'=>array('admin')),
// );
?>

<div class="well well-small">
	<h1>Tambah Informasi Tanggungan</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

	
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
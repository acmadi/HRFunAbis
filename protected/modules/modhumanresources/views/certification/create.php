<?php
// $this->breadcrumbs=array(
	// 'Certifications'=>array('index'),
	// 'Create',
// );

// $this->menu=array(
	// array('label'=>'List Certification', 'url'=>array('index')),
	// array('label'=>'Manage Certification', 'url'=>array('admin')),
// );
?>

<div class="well well-small">
	<h1>Tambah Pendidikan Informal</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>
	
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
// $this->breadcrumbs=array(
	// 'Job Experiences'=>array('index'),
	// 'Create',
// );

// $this->menu=array(
	// array('label'=>'List JobExperience', 'url'=>array('index')),
	// array('label'=>'Manage JobExperience', 'url'=>array('admin')),
// );
?>

<div class="well well-small">
	<h1>Tambah Pengalaman Keproyekan</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

	
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
// $this->breadcrumbs=array(
	// 'Educations'=>array('index'),
	// 'Create',
// );

// $this->menu=array(
	// array('label'=>'List Education', 'url'=>array('index')),
	// array('label'=>'Manage Education', 'url'=>array('admin')),
// );
?>

<div class="well well-small">
	<h1>Tambah Informasi Pendidikan</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

	
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
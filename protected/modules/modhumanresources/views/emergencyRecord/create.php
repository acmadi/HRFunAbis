<?php
// $this->breadcrumbs=array(
	// 'Emergency Records'=>array('index'),
	// 'Create',
// );

// $this->menu=array(
	// array('label'=>'List EmergencyRecord', 'url'=>array('index')),
	// array('label'=>'Manage EmergencyRecord', 'url'=>array('admin')),
// );
?>

<div class="well well-small">
	<h1>Tambah Kontak Emergensi</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

	
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
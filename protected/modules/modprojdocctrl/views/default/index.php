<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Project and Document Control',
);
?>
<h1>Project and Document Control</h1>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Project', 'url'=>'#', 'active'=>true),
        array('label'=>'Document', 'url'=>array('/modprojdocctrl/document')),
        array('label'=>'Messages', 'url'=>'#'),
    ),
)); ?>
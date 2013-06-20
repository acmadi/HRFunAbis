
<div id="mtreeview" style="width: 250px;border: 1px solid GRAY;float:left">
<?php
	$this->widget('application.extensions.MTreeView.MTreeView',array(
		'collapsed' => true,
		'animated' => 'fast',
		'htmlOptions' => array(
			'class' => 'treeview-famfamfam', //there are some classes that ready to use
		),
		'table' => 'hr_organization', //what table the menu would come from
		'hierModel' => 'nestedSet', //hierarchy model of the table
		'conditions' => array('t1.visible=:visible', array(':visible' => 1)), 
		'fields' => array(
			'text' => 'title',
			'alt' => false,
			'icon' => false,
			'tooltip' => false,
			'task' => false,
			'url' => array('/modhumanresources/organization/view', array('id' => 'id'))
		),
		'ajaxOptions'=>array('update'=>'#mtreeview-target')
	));
?>
</div>
<div id="mtreeview-target" style="border: 1px solid gray;margin-left: 260px;min-height: 300px">
Click the link to view detail
</div>
<p>&nbsp;</p>
<hr>
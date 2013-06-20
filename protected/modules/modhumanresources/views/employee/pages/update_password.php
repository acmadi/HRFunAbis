<?php 
	Yii::app()->user->setFlash('danger', '<strong>Perhatian!</strong> Sistem akan mengubah username dan password setelah tombol <strong>submit</strong>');
	$this->widget('bootstrap.widgets.TbAlert', array(
	'block'=>true, // display a larger alert block?
	'fade'=>true, // use transitions?
	'closeText'=>'×', // close link text - if set to false, no close link is displayed
	'alerts'=>array( // configurations per alert type
	'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
	),
	));
?>
		
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

<table>
	<tr><td><b>New Username</b> </td><td><input id="Employee_username" style="margin-bottom: 15px;" type="text" name="username" size="30" /></td></tr>
	<tr><td><b>New Password</b> </td><td><input id="Employee_new_password" style="margin-bottom: 15px;" type="password" name="newPassword" size="30" /></td></tr>
	<tr><td></td><td><?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Submit')); ?></td></tr>
</table>
 
<?php $this->endWidget(); ?>
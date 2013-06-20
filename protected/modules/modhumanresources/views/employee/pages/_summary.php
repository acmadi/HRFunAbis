<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Identitas')); ?>
	<div class = "span-10">
	<?php
		 $this->widget('editable.EditableDetailView', array(
		'data' => $data,
		//you can define any default params for child EditableFields
		'url' => $this->createUrl('employee/ajaxupdate'), //common submit url for all fields
		'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
		'emptytext' => 'no value',
		'attributes'=>array(
			//'employee_id',
			'name',
			'full_name',
			'pgassol_email',
			array(
				'name'=>'department',
				'editable' => array(
					'type' => 'select',
					'source' => CHtml::listData(Department::model()->findAll(), 'department', 'department'),
				)
			),
			
			array(
				'name'=>'position',
				'editable' => array(
					'type' => 'select',
					'source' => CHtml::listData(LevelPosition::model()->findAll(), 'position', 'position'),
				)
			),
		   )
		));
	?>
	</div>
	<div class = "span-10">
	<?php 
	if($data->photo == '')
	{
		$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$data,
		'attributes'=>array(
			 array(
				'name'=>'photo',
				'type'=>'raw',
				'value'=>CHtml::image( Yii::app()->baseUrl .'/photo/nopic.jpg',"no-pic",array("width"=>120,"height"=>150)),
			 ),
			),
		));
	}
	else
	{
		$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$data,
			'attributes'=>array(
				 array(
					'name'=>'photo',
					'type'=>'raw',
					'value'=>CHtml::image( Yii::app()->baseUrl .'/'.$data->photo,"no-pic",array("width"=>320,"height"=>250)),
				 ),
			),
		)); 
	}
	?>
	</div>
	<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons'=>array(
			array('label'=>'Update', 'url'=>array('/modhumanresources/employee/update', 'id'=>$data->employee_id))
		),
	)); ?>
	
						
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Personal Info')); ?>
		<?php  $this->widget('editable.EditableDetailView', array(
		'data' => $data,
		//you can define any default params for child EditableFields
		'url' => $this->createUrl('employee/ajaxupdate'), //common submit url for all fields
		'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
		'emptytext' => 'no value',
		'attributes'=>array(
			array('name'=>'birth_date', 'value'=> CHtml::encode(date('F, d Y', strtotime($data->birth_date)))),
			'place_of_birth',
			array(
				'name'=>'gender',
				'editable' => array(
					'type' => 'select',
					'source' => $data->getGenderOptions(),
				)
			),
			array(
				'name'=>'religion',
				'editable' => array(
					'type' => 'select',
					'source' => $data->getReligionOptions(),
				)
			),
			
			array(
				'name'=>'blood_type',
				'editable' => array(
					'type' => 'select',
					'source' => $data->getBloodOptions(),
				)
			),
			
			array(
				'name'=>'marital_status',
				'editable' => array(
					'type' => 'select',
					'source' => $data->getMaritalOptions(),
				)
			),
			'number_of_dependent',
		),
	)); ?>	
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Kartu Identitas')); ?>
	<?php 
	// $this->widget('bootstrap.widgets.TbDetailView', array(
		// 'data'=>$data,
		// 'attributes'=>array(
			// 'ktp',
			// 'passport',
			// 'driver_licence',
			// 'jamsostek',
			// 'npwp',
		// ),
	// )); ?>
	<?php
		 $this->widget('editable.EditableDetailView', array(
		'data' => $data,
		//you can define any default params for child EditableFields
		'url' => $this->createUrl('employee/ajaxupdate'), //common submit url for all fields
		'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
		'emptytext' => 'no value',
		'attributes'=>array(
			'ktp',
			'passport',
			'driver_licence',
			'jamsostek',
			'npwp',
			)
		));
	?>
			
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Kontak')); ?>
	<?php $this->widget('editable.EditableDetailView', array(
		'data' => $data,
		//you can define any default params for child EditableFields
		'url' => $this->createUrl('employee/ajaxupdate'), //common submit url for all fields
		'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
		'emptytext' => 'no value',
		'attributes'=>array(
			'phone_home',
			'phone_mobile',
			'private_email',
		),
	)); ?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Alamat')); ?>
	<?php $this->widget('editable.EditableDetailView', array(
		'data' => $data,
		//you can define any default params for child EditableFields
		'url' => $this->createUrl('employee/ajaxupdate'), //common submit url for all fields
		'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
		'emptytext' => 'no value',
		'attributes'=>array(
			array( 
				'name' => 'address_current_1',
				'editable' => array(
					'type' => 'textarea',
				)
			),
			array( 
				'name' => 'address_current_2',
				'editable' => array(
					'type' => 'textarea',
				)
			),
			array( 
				'name' => 'address_ktp',
				'editable' => array(
					'type' => 'textarea',
				)
			),
		),
	)); ?>
<?php $this->endWidget(); ?>
 
<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab1'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
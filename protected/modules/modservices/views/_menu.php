<div class="btn-toolbar">
    <div class="btn-toolbar">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
			array('label'=>'Admin', 'url'=>array('/modadmin/user/admin'))
        ),
    )); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Action', 'items'=>array(
                array('label'=>'Create', 'url'=>array('/modadmin/user/create')),
            )),
        ),
    )); ?>
	</div>
</div>
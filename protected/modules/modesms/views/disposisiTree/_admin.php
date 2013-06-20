<?php 
$this->widget('ext.QTreeGridView.CQTreeGridView', array(
    'id'=>'disposisi-tree-grid',
    // 'cssFile'=>false,
    'ajaxUpdate' => false,
    'dataProvider'=>$dataProvider,
    'filter'=>$model,
    'columns'=>array(
        //'id',
        'employee_id',
        'name',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
		),
    ),
));
?>
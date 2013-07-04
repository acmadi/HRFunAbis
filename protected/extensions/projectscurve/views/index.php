<?php 
$this->widget('application.extensions.EFlot.EFlotGraphWidget', 
    array(
        'data'=>array(
            array(
                'label'=> '% Realisasi', 
                'data'=>$line1,
                'lines'=>array('show'=>true, 'fill'=>true),
                'points'=>array('show'=>true),
            ),
			array(
                'label'=> '% Rencana', 
                'data'=>$line2,
                'lines'=>array('show'=>true, 'fill'=>true),
                'points'=>array('show'=>true),
            ),	
        ),
		
        'options'=>array(
                'legend'=>array(
                    'position'=>'nw',
                    'show'=>true,
                    'margin'=>10,
                    'backgroundOpacity'=> 0.1
                    ),
        ),
        'htmlOptions'=>array(
               'style'=>'width:auto;height:400px;'
        )
    )
);

?>
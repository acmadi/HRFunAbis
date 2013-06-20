<?php if(Yii::app()->user->hasFlash('flash_message_detail')): ?>
	<div id="message"
       style="
				height:15px;
				color:red;
				font-weight:bold;font-size:10px;
				text-align:center;
				position:relative;
				background-color:#DDDDDD;
				-moz-border-radius: 2px;
				-webkit-border-radius: 2px; 
				border-radius: 2px;
				border:solid red 2px;"
	   >
           <?php echo Yii::app()->user->getFlash('flash_message_detail'); ?>
           <?php
           Yii::app()->clientScript->registerScript(
               'myHideEffect',
               '$("#message").animate({opacity: 0}, 3000).fadeOut(500);',
               CClientScript::POS_READY
           );
	echo '</div>';
		   endif;
	?>
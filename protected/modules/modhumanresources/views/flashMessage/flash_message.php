<?php if(Yii::app()->user->hasFlash('flash_message')): ?>

	<div id="message"
       style="
				height:35px;
				color:red;
				font-weight:bold;font-size:10px;
				text-align:center;
				position:relative;
				background-color:#DDDDDD;
				-moz-border-radius: 6px;
				-webkit-border-radius: 6px; 
				border-radius: 6px;
				border:solid red 2px;"
	   >
		   <br>	
	   <?php echo Yii::app()->user->getFlash('flash_message'); ?>
	   <?php
	   Yii::app()->clientScript->registerScript(
		   'myHideEffect',
		   '$("#message").animate({opacity: 0}, 3000).fadeOut(500);',
		   CClientScript::POS_READY
	   );
echo '</div>';
	   endif;
?>
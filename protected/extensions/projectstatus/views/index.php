<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Project Status",
	));
?>

	<table class="table table-striped table-bordered">
	  <tbody>
		<?php foreach($project as $prj) { ?>
		<tr>
		  <td width="20%"><?php echo $prj->number?></td>
		  <td width="50%"><?php echo $prj->name?></td>
		  <td>
			 <?php echo $prj->progress;?>%
			<div class="progress progress-info">
			  <div class="bar" style="width: <?php echo $prj->progress;?>%"></div>
			</div>
		  </td>
		</tr>
		<?php }?>
		
	  </tbody>
	</table>
		
<?php $this->endWidget();?>	

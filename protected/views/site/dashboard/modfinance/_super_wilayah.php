
<div class="row-fluid">
  <div class="span6">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"<i class='icon-check'></i> Daftar Kas",
		));
		
	?>
  		<table class="table">
			<thead>
			<tr>	
				<th>No</th>
				<th>Kas</th>
				<th>Nama Kas</th>
				<th>Go</th>
			</tr>
			</thead>
			<tbody>

			<?php
				$count = 1;
				foreach($datakas as $dt):
			?>
			<tr>
				<td><?php echo $count;?></td>
				<td><?php echo $dt->code_kas;?></td>
				<td><?php echo Kas::model()->getKas($dt->code_kas);?></td>
				<td>
					<?php $this->widget('bootstrap.widgets.TbButton', array(
							'label'=>'Go',
							'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
							'size'=>'mini', // null, 'large', 'small' or 'mini'
							'url'=>array('modfinance/kasDc/admin', "kas" =>$dt->code_kas),
						)); ?>
				</td>
			</tr>
			<?php
				$count++;
				endforeach;
			?>	

			</tbody>
		</table>

	<?php $this->endWidget();?>
  </div>
  <div class="span6">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"<i class='icon-info-sign'></i> Daftar Bank",
		));
		
	?>
    <table class="table">
		<thead>
		<tr>	
			<th>No</th>
			<th>Bank</th>
			<th>Nama Bank</th>
			<th>Go</th>
		</tr>
		</thead>
		<tbody>

		<?php
			$count1 = 1;
			foreach($databank as $dt):
		?>
		<tr>
			<td><?php echo $count1;?></td>
			<td><?php echo $dt->nomor_rek;?></td>
			<td><?php echo Rekening::model()->getBank($dt->nomor_rek);?></td>
			<td>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
						'label'=>'Go',
						'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
						'size'=>'mini', // null, 'large', 'small' or 'mini'
						'url'=>array('modfinance/rekeningDc/admin', "bank" =>$dt->nomor_rek),
					)); ?>
			</td>
		</tr>
		<?php
			$count1++;
			endforeach;
		?>	

		</tbody>
	</table>
	
        
    <?php $this->endWidget();?>
  </div>
</div>
<div class="span12">
	<div class="span6">
		<table class="table">
			<tr><td>DIBAYAR KEPADA</td><td>:</td><td>
			<?php
				$this->widget('editable.Editable', array(
				'type' => 'text',
				'name' => 'paid_to',
				'pk' => $data->id,
				'text' => $data->paid_to,
				'url' => $this->createUrl('persekot/ajaxupdate'),
				'title' => 'Dibayar Kepada',
				'placement' => 'right'
				));
			?>
				
			<?php //echo $data->paid_to;?></td></tr>
			<tr><td>DITERIMA DARI</td><td>:</td><td><?php echo $data->paid_to;?></td></tr>
			<tr><td>SEJUMLAH</td><td>:</td><td><?php echo $data->paid_to;?></td></tr>
			<tr><td>TERBILANG</td><td>:</td><td><?php echo $data->paid_to;?></td></tr>
		</table>
	</div>
	<div class="span6">
		<table class="table">
			<tr><td>Tanggal Voucher</td><td>:</td><td><?php echo $data->paid_to;?></td></tr>
			<tr><td>Nomor Voucher</td><td>:</td><td><?php echo $data->paid_to;?></td></tr>
			<tr><td>Nomor Journaltd><td>:</td><td><?php echo $data->paid_to;?></td></tr>
			<tr><td>Kode Bank</td><td>:</td><td><?php echo $data->paid_to;?></td></tr>
			<tr><td>Kode Valuta</td><td>:</td><td><?php echo $data->paid_to;?></td></tr>
			<tr><td>Nomor Cek/Giro</td><td>:</td><td><?php echo $data->paid_to;?></td></tr>
			<tr><td>Tanggal Cek/Giro</td><td>:</td><td><?php echo $data->paid_to;?></td></tr>
		</table>
	</div>	
</div>
<div class="span12">	
</div>	

<div class="span12">	
KETERANGAN : <?php
				$this->widget('editable.Editable', array(
				'type' => 'textarea',
				'name' => 'notes',
				'pk' => $data->id,
				'text' => $data->notes,
				'url' => $this->createUrl('persekot/ajaxupdate'),
				'title' => 'Enter Keterangan',
				'placement' => 'right'
				));
			?>

</div>	
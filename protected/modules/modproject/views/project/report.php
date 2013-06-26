<style type="text/css">
	.freeze {
		position: absolute;
		width:100px;
		height: 50px;
	}

	.temp {
		overflow-x:scroll;
		overflow-y:scroll;
		width:100%;
	}
	td {
		width: auto;
	}
</style>

<?php
$this->breadcrumbs=array(
	'Projects'=>array('view','id'=>$project->id),
	'Report',
);?>

<table class="table table-striped table-bordered">
  <tbody>
	<tr>
		<td colspan="2" width="20%">Pekerjaan</td>
		<td>Outstanding</td>
	</tr>		
	<tr>
		<td colspan="2"><?php echo $project->name?></td>
		<td rowspan="6"></td>
	</tr>
	<tr>
		<td>START</td>
		<td><?php echo $project->plan_start_date?></td>
	</tr>
	<tr>
		<td>END</td>
		<td><?php echo $project->plan_end_date?></td>
	</tr>
	<tr>
		<td>DURASI</td>
		<td><?php echo $project->duration?></td>
	</tr>
	<tr>
		<td>KONTRAK</td>
		<td><?php echo $project->amount?></td>
	</tr>
	<tr>
		<td>KODE</td>
		<td><?php echo $project->number?></td>
	</tr>
  </tbody>
</table>

<!-- Keuangan -->
<div class="temp">	
	<table class="table table-striped table-bordered">
		<tr>
			<td colspan="3">Keuangan</td>
			<td>Januari</td>
			<td>Februari</td>
			<td>Maret</td>
			<td>April</td>
			<td>Mei</td>
			<td>Juni</td>
			<td>Juli</td>
			<td>Agustus</td>
			<td>September</td>
			<td>Oktober</td>
			<td>November</td>
			<td>Desember</td>
		</tr>
		<?php 
			$i = 1;
			foreach($finances as $finance) { ?>
		<tr>
			<td><?php echo $i?></td>
			<td><?php echo $finance->elbi?></td>
			<td><?php echo $finance->elbi_desc?></td>
			<?php for ($j=1; $j <= 12; $j++) { 
				echo '<td>'.(($finance->period_month == $j)?$finance->debit:'').'</td>';
			} ?>
		</tr>
		<?php
			$i++; 
			} ?>
		<tr>
			<td colspan="15"></td>
		</tr>
		<tr>
			<td colspan="3">Pendapatan (DPP)</td>
			<?php for ($i=0; $i < 12; $i++) { 
				echo "<td></td>";
			} ?>
		</tr>
			<tr>
			<td colspan="3">PPN</td>
			<?php for ($i=0; $i < 12; $i++) { 
				echo "<td></td>";
			} ?>
		</tr>
		<tr>
			<td></td>
			<td colspan="2">BEBAN OPERASI</td>
			<?php for ($i=0; $i < 12; $i++) { 
				echo "<td></td>";
			} ?>
		</tr>
		<?php for ($i=0; $i < 4; $i++) { ?>
		<tr>
			<td></td>
			<td colspan="2">Total Biaya blabla</td>
			<?php for ($j=0; $j < 12; $j++) { 
				echo "<td></td>";
			} ?>
		</tr>
		<?php } ?>
	</table>
</div>

<!-- Personil -->
<br/>
<div class="temp">
	<table class="table table-striped table-bordered">
		<tr>
			<td colspan="4">Personil</td>
			<td colspan="12"></td>
		</tr>
		<tr>
			<td>No</td>
			<td>Posisi</td>
			<td>Nama</td>
			<td>No. Telepon</td>
			<td>Januari</td>
			<td>Februari</td>
			<td>Maret</td>
			<td>April</td>
			<td>Mei</td>
			<td>Juni</td>
			<td>Juli</td>
			<td>Agustus</td>
			<td>September</td>
			<td>Oktober</td>
			<td>November</td>
			<td>Desember</td>
		</tr>
		<?php 
			$i = 1;
			foreach($personels as $personel) { ?>
		<tr>
			<td><?php echo $i?></td>
			<td><?php echo $personel->position?></td>
			<td><?php echo $personel->name?></td>
			<td><?php echo $personel->telepon?></td>
			<?php for ($j=0; $j < 12; $j++) { 
				echo "<td></td>";
			}?>
		</tr>
		<?php 
			$i++;
			} ?>
	</table>
</div>

<!-- pengadaan -->
<br/>
<div class="temp">
	<table class="table table-striped table-bordered">
		<tr>
			<td colspan="10">Pengadaan</td>
			<td colspan="12"></td>
		</tr>
		<tr>
			<td>No</td>
			<td>Vendor</td>
			<td>No. Kontrak</td>
			<td colspan="2">Durasi</td>
			<td>Harga Per Unit</td>
			<td>Barang</td>
			<td>Jumlah</td>
			<td>Lokasi</td>
			<td>Total Expense</td>
			<td>Januari</td>
			<td>Februari</td>
			<td>Maret</td>
			<td>April</td>
			<td>Mei</td>
			<td>Juni</td>
			<td>Juli</td>
			<td>Agustus</td>
			<td>September</td>
			<td>Oktober</td>
			<td>November</td>
			<td>Desember</td>
		</tr>
		<?php 
			$i = 1;
			foreach($procurements as $procurement) { ?>
		<tr>
			<td><?php echo $i?></td>
			<td><?php echo $procurement->vendor?></td>
			<td><?php echo $procurement->contract?></td>
			<td><?php echo $procurement->contract_start_date?></td>
			<td><?php echo $procurement->contract_end_date?></td>
			<td><?php echo $procurement->unit_price?></td>
			<td><?php echo $procurement->item?></td>
			<td><?php echo $procurement->amount?></td>
			<td><?php echo $procurement->location?></td>
			<td><?php echo $procurement->total_price?></td>
			<?php for ($j=1; $j <= 12; $j++) { 
				echo '<td>'.(($procurement->period_month == $j)?$procurement->total_price:'').'</td>';
			}?>
		</tr>
		<?php 
			$i++;
			} ?>
	</table>

</div>
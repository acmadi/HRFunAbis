<?php
/* @var $this LetterCostController */
/* @var $model LetterCost */

$sppd = Form::model()->findByPk($model->sppd_id);
$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	$sppd->purpose => array('form/view','id'=>$sppd->id),
	'Surat Biaya Perjalanan Dinas',
	Employee::model()->getName($model->employee_id)
);

$this->menu=array(
	array('label'=>'List LetterCost', 'url'=>array('index')),
	array('label'=>'Create LetterCost', 'url'=>array('create')),
	array('label'=>'Update LetterCost', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LetterCost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LetterCost', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Surat Biaya Perjalanan Dinas',
	));		
?>

<table class="table">
	<thead>
		<tr>
			<th colspan="6" style="text-align:center">Uraian Penggunaan Biaya</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th colspan="6">Biaya Transportasi</th>
		</tr>
		<tr>
			<td width="300px">Dari dan Ke Bandar Udara / Stasiun</td>
			<td>=</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'from_to_quantity',
					'pk' => $model->id,
					'text' => $model->from_to_quantity,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Dari dan Ke',
					'placement' => 'right'
					));
				?>
			</td>
			<td>X</td>
			<td style="text-align:right">
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'from_to_cost',
					'pk' => $model->id,
					'text' => $model->from_to_cost,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Dari dan Ke',
					'placement' => 'right'
					));
				?>
			</td>
			<td style="text-align:right"><?php echo $model->getTotalFromTo()?></td>
		</tr>
		<tr>
			<td>Sarana Transportasi (Angkutan Lokal)</td>
			<td>=</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'transportation_quantity',
					'pk' => $model->id,
					'text' => $model->transportation_quantity,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Transportasi Lokal',
					'placement' => 'right'
					));
				?>
			</td>
			<td>X</td>
			<td style="text-align:right">
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'transportation_cost',
					'pk' => $model->id,
					'text' => $model->transportation_cost,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Transportasi Lokal',
					'placement' => 'right'
					));
				?>
			</td>
			<td style="text-align:right"><?php echo $model->getTotalTransportation()?></td>
		</tr>
		<tr>
			<td>Penginapan (Hotel)</td>
			<td>=</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'hotel_quantity',
					'pk' => $model->id,
					'text' => $model->hotel_quantity,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Penginapan',
					'placement' => 'right'
					));
				?>
			</td>
			<td>X</td>
			<td style="text-align:right">
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'hotel_cost',
					'pk' => $model->id,
					'text' => $model->hotel_cost,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Penginapan',
					'placement' => 'right'
					));
				?>
			</td>
			<td style="text-align:right"><?php echo $model->getTotalHotel()?></td>
		</tr>
		<tr>
			<td>Tiket Pesawat</td>
			<td>=</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'airline_quantity',
					'pk' => $model->id,
					'text' => $model->airline_quantity,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Tiket Pesawat',
					'placement' => 'right'
					));
				?>
			</td>
			<td>X</td>
			<td style="text-align:right">
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'airline_cost',
					'pk' => $model->id,
					'text' => $model->airline_cost,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Tiket Pesawat',
					'placement' => 'right'
					));
				?>
			</td>
			<td style="text-align:right"><?php echo $model->getTotalAirline()?></td>
		</tr>
		<tr>
			<th colspan="6">Biaya Harian</th>
		</tr>
		<tr>
			<td>Lumpsum</td>
			<td>=</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'lumpsum_quantity',
					'pk' => $model->id,
					'text' => $model->lumpsum_quantity,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Lumpsum',
					'placement' => 'right'
					));
				?>
			</td>
			<td>X</td>
			<td style="text-align:right">
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'lumpsum_cost',
					'pk' => $model->id,
					'text' => $model->lumpsum_cost,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Lumpsum',
					'placement' => 'right'
					));
				?>
			</td>
			<td style="text-align:right"><?php echo $model->getTotalLumpsum()?></td>
		</tr>
		<tr>
			<td>Laundry</td>
			<td>=</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'laundry_quantity',
					'pk' => $model->id,
					'text' => $model->laundry_quantity,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Laundry',
					'placement' => 'right'
					));
				?>
			</td>
			<td>X</td>
			<td style="text-align:right">
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'laundry_cost',
					'pk' => $model->id,
					'text' => $model->laundry_cost,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Laundry',
					'placement' => 'right'
					));
				?>
			</td>
			<td style="text-align:right"><?php echo $model->getTotalLaundry()?></td>
		</tr>
		<tr>
			<td>Airport Tax</td>
			<td>=</td>
			<td>
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'airport_tax_quantity',
					'pk' => $model->id,
					'text' => $model->airport_tax_quantity,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Airport Tax',
					'placement' => 'right'
					));
				?>
			</td>
			<td>X</td>
			<td style="text-align:right">
				<?php
					$this->widget('editable.Editable', array(
					'type' => 'text',
					'name' => 'airport_tax_cost',
					'pk' => $model->id,
					'text' => $model->airport_tax_cost,
					'url' => $this->createUrl('letterCost/ajaxupdate'),
					'title' => 'Airport Tax',
					'placement' => 'right'
					));
				?>
			</td>
			<td style="text-align:right"><?php echo $model->getTotalAirportTax()?></td>
		</tr>
		<tr>
			<th>Jumlah Biaya Disetujui</th>
			<td>=</td>
			<td colspan="4" style="text-align:right"><?php echo $model->getTotal()?></td>
		</tr>
	</tbody>
</table>

<?php
	$this->endWidget();
?>
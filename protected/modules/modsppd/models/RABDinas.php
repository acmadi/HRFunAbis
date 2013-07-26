<?php

/**
 * This is the model class for table "sppd_rab_dinas".
 *
 * The followings are the available columns in table 'sppd_rab_dinas':
 * @property integer $id
 * @property integer $employee_id
 * @property string $name
 * @property integer $sppd_id
 * @property string $cost_description
 * @property integer $base_amount
 * @property integer $days
 * @property integer $amount
 * @property string $created_date
 * @property string $created_by
 */
class RABDinas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RABDinas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sppd_rab_dinas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, name, sppd_id, cost_description, base_amount, days, amount, created_date, created_by', 'required'),
			array('sppd_id, base_amount, days, amount', 'numerical', 'integerOnly'=>true),
			array('employee_id, name, created_by', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, name, sppd_id, cost_description, amount, created_date, created_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'employee_id' => 'ID Pekerja',
			'name' => 'Nama Pekerja',
			'sppd_id' => 'SPPD',
			'cost_description' => 'Keterangan Biaya',
			'base_amount'=>'Biaya Dasar',
			'days'=>'Jumlah Hari',
			'amount' => 'Jumlah',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sppd_id',$this->sppd_id);
		$criteria->compare('cost_description',$this->cost_description,true);
		$criteria->compare('base_amount',$this->base_amount,true);
		$criteria->compare('days',$this->days,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getTotal($sppd_id)
	{
		$total = 0;
		$rab = $this->findAllByAttributes(array('sppd_id' => $sppd_id));
		foreach ($rab as $data) {
			$total += $data->amount;
		}
		return $total;
	}

	public function generateRABDinas($sppd_id)
	{
		$model = Form::model()->findByPk($sppd_id);
		$duration = $model->getNumberOfDays();
		$rab = MasterCost::model()->findAllByAttributes(array('class'=>$model->class));
		$personnelslist = Personnel::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$sppd_id)));
		foreach ($personnelslist as $person) {
			foreach ($rab as $data) {
				$rabdinas = new RABDinas;
				$rabdinas->employee_id = $person->employee_id;
				$rabdinas->name = $person->name;
				$rabdinas->sppd_id = $model->id;
				$rabdinas->cost_description = $data->description;
				$rabdinas->days = $model->getNumberOfDays();
				if ($model->transport_type == 'Kendaraan Dinas') {
					switch ($data->code) {
						case 'btdk': // Transport Dari & Ke
						case 'btdt': // Transport di tempat tujuan
						case 'uash': // Uang angkutan setempat harian
							$rabdinas->base_amount = 0;
							$rabdinas->amount = 0;
							break;
						case 'atd': // airport tax domestik
						case 'ati': // airport tax internasional
							$rabdinas->base_amount = ($model->transport_vehicle == 'Pesawat Udara')?$data->amount:0;;
							$rabdinas->amount = ($model->transport_vehicle == 'Pesawat Udara')?$data->amount * 2:0;
							break;
						case 'btst': // Biaya transport sarana transportasi
						case 'bph': // Biaya Penginapan Hotel
						case 'bum': // Biaya uang makan
						case 'bm': // Biaya Makan
						case 'ush': // Uang saku harian
						case 'da': // Daily allowance
						case 'pbp': // Penggantian biaya penginapan
						case 'bcp': // biaya cuci pakaian
						case 'btp': // biaya tunjangan perlengkapan
						case 'us': // uang saku
							$rabdinas->base_amount = $data->amount;
							$rabdinas->amount = $data->amount * $duration;
							break;		
					}	
				} else {
					switch ($data->code) {
						case 'btdk': // Transport Dari & Ke
							$rabdinas->base_amount = $data->amount;
							$rabdinas->amount = $data->amount * 2;
							break;
						case 'atd': // airport tax domestik
							$rabdinas->base_amount = ($model->transport_vehicle == 'Pesawat Udara' && $model->sppd_type != 'Luar Negri')?$data->amount:0;
							$rabdinas->amount = ($model->transport_vehicle == 'Pesawat Udara' && $model->sppd_type != 'Luar Negri')?$data->amount * 2:0;
							break;
						case 'ati': // airport tax internasional
							$rabdinas->base_amount = ($model->transport_vehicle == 'Pesawat Udara' && $model->sppd_type == 'Luar Negri')?$data->amount:0;
							$rabdinas->amount = ($model->transport_vehicle == 'Pesawat Udara' && $model->sppd_type == 'Luar Negri')?$data->amount * 2:0;
							break;
						case 'btdt': // Transport di tempat tujuan
						case 'uash': // Uang angkutan setempat harian
						case 'btst': // Biaya transport sarana transportasi
						case 'bph': // Biaya Penginapan Hotel
						case 'bum': // Biaya uang makan
						case 'bm': // Biaya Makan
						case 'ush': // Uang saku harian
						case 'da': // Daily allowance
						case 'pbp': // Penggantian biaya penginapan
						case 'bcp': // biaya cuci pakaian
						case 'btp': // biaya tunjangan perlengkapan
						case 'us': // uang saku
							$rabdinas->base_amount = $data->amount;
							$rabdinas->amount = $data->amount * $duration;
							break;		
					}
				}
				
				$rabdinas->created_date = date('Y-m-d',time());
				$rabdinas->created_by = 'Dummy';
				$rabdinas->save();
			}
		}
	}
}
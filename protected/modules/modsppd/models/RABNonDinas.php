<?php

/**
 * This is the model class for table "sppd_rab_nondinas".
 *
 * The followings are the available columns in table 'sppd_rab_nondinas':
 * @property integer $id
 * @property integer $sppd_id
 * @property integer $employee_id
 * @property string $name
 * @property string $explanation
 * @property integer $days
 * @property integer $amount
 * @property string $additional_description
 * @property string $created_date
 * @property string $created_by
 */
class RABNonDinas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RABNonDinas the static model class
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
		return 'sppd_rab_nondinas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sppd_id, employee_id, name, explanation, days, amount, additional_description, created_date, created_by', 'required'),
			array('sppd_id, days, amount', 'numerical', 'integerOnly'=>true),
			array('employee_id, name, created_by', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, explanation, amount, additional_description, created_date, created_by', 'safe', 'on'=>'search'),
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
			'employee_id' => 'ID Pegawai',
			'name' => 'Nama',
			'explanation' => 'Uraian Rencana Kegiatan',
			'amount' => 'Rencana Biaya',
			'additional_description' => 'Keterangan',
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
		$criteria->compare('sppd_id',$this->sppd_id);
		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('explanation',$this->explanation,true);
		$criteria->compare('days',$this->days);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('additional_description',$this->additional_description,true);
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
}
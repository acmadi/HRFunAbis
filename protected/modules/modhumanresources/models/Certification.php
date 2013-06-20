<?php

/**
 * This is the model class for table "certification".
 *
 * The followings are the available columns in table 'certification':
 * @property integer $id
 * @property string $employee_id
 * @property string $type
 * @property string $certification_name
 * @property string $year_certification
 * @property string $year_expired
 */
class Certification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Certification the static model class
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
		return 'hr_certification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, type, certification_name, year_certification', 'required'),
			array('employee_id', 'length', 'max'=>20),
			array('type', 'length', 'max'=>40),
			array('certification_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, type, certification_name, year_certification, year_expired', 'safe', 'on'=>'search'),
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
			'employee_id' => 'Employee',
			'type' => 'Jenis Sertifikat',
			'certification_name' => 'Nama Sertifikat',
			'year_certification' => 'Tanggal Sertifikat',
			'year_expired' => 'Exprired',
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
		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('certification_name',$this->certification_name,true);
		$criteria->compare('year_certification',$this->year_certification,true);
		$criteria->compare('year_expired',$this->year_expired,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
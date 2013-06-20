<?php

/**
 * This is the model class for table "emergency_record".
 *
 * The followings are the available columns in table 'emergency_record':
 * @property integer $id
 * @property string $employee_id
 * @property string $name
 * @property string $relationship
 * @property string $contact
 * @property string $address
 * @property string $phone
 */
class EmergencyRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EmergencyRecord the static model class
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
		return 'hr_emergency_record';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, name, relationship, address, phone', 'required'),
			array('employee_id, relationship, contact, phone', 'length', 'max'=>20),
			array('name', 'length', 'max'=>50),
			array('address', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, name, relationship, contact, address, phone', 'safe', 'on'=>'search'),
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
			'name' => 'Nama',
			'relationship' => 'Hubungan',
			'contact' => 'Contact',
			'address' => 'Alamat',
			'phone' => 'Telepon',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('relationship',$this->relationship,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//dropdown list
	//1. relationship
	const TYPE_I = 'istri';
	const TYPE_S = 'suami';
	const TYPE_A = 'anak';
	const TYPE_K = 'keponakan';
	const TYPE_SP = 'sepupu';
	const TYPE_SD = 'saudara';
	
	public function getRelationshipOptions()
	{
		return array
		(
			self::TYPE_I=>'istri',
			self::TYPE_S=>'suami',
			self::TYPE_A=>'anak',
			self::TYPE_K => 'keponakan',
			self::TYPE_SP => 'sepupu',
			self::TYPE_SD => 'saudara',
		);
	}	
	//2. gender
	const TYPE_M = 'male';
	const TYPE_F = 'female';

	public function getGenderOptions()
	{
		return array
		(
			self::TYPE_M=>'male',
			self::TYPE_F=>'female',
		);
	}
}
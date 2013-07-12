<?php

/**
 * This is the model class for table "sppd_form".
 *
 * The followings are the available columns in table 'sppd_form':
 * @property integer $id
 * @property string $employee_id
 * @property string $name
 * @property string $service_provider
 * @property string $unit
 * @property string $class
 * @property string $destination
 * @property string $purpose
 * @property string $departure
 * @property string $arrival
 * @property string $transport_type
 * @property string $transport_vehicle
 * @property string $sppd_type
 * @property string $statement_letter
 * @property string $support_letter
 * @property string $created_by
 * @property string $created_date
 */
class Form extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Form the static model class
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
		return 'sppd_form';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, name, service_provider, unit, class, destination, purpose, departure, arrival, transport_type, transport_vehicle, sppd_type, created_by, created_date', 'required'),
			array('employee_id, name, created_by', 'length', 'max'=>50),
			array('service_provider, unit', 'length', 'max'=>20),
			array('class', 'length', 'max'=>1),
			array('destination', 'length', 'max'=>100),
			array('transport_type, sppd_type', 'length', 'max'=>10),
			array('transport_vehicle', 'length', 'max'=>15),
			array('statement_letter, support_letter', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, name, service_provider, unit, class, destination, purpose, departure, arrival, transport_type, transport_vehicle, sppd_type, statement_letter, support_letter, created_by, created_date', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'service_provider' => 'Service Provider',
			'unit' => 'Unit',
			'class' => 'Class',
			'destination' => 'Destination',
			'purpose' => 'Purpose',
			'departure' => 'Departure',
			'arrival' => 'Arrival',
			'transport_type' => 'Transport Type',
			'transport_vehicle' => 'Transport Vehicle',
			'sppd_type' => 'Sppd Type',
			'statement_letter' => 'Statement Letter',
			'support_letter' => 'Support Letter',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
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
		$criteria->compare('service_provider',$this->service_provider,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('destination',$this->destination,true);
		$criteria->compare('purpose',$this->purpose,true);
		$criteria->compare('departure',$this->departure,true);
		$criteria->compare('arrival',$this->arrival,true);
		$criteria->compare('transport_type',$this->transport_type,true);
		$criteria->compare('transport_vehicle',$this->transport_vehicle,true);
		$criteria->compare('sppd_type',$this->sppd_type,true);
		$criteria->compare('statement_letter',$this->statement_letter,true);
		$criteria->compare('support_letter',$this->support_letter,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
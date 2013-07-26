<?php

/**
 * This is the model class for table "sppd_hierarchy".
 *
 * The followings are the available columns in table 'sppd_hierarchy':
 * @property integer $id
 * @property string $employee_id
 * @property string $manager_id
 * @property string $manager_name
 */
class Hierarchy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Hierarchy the static model class
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
		return 'sppd_hierarchy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, manager_id, manager_name', 'required'),
			array('employee_id, manager_id', 'length', 'max'=>20),
			array('manager_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, manager_id, manager_name', 'safe', 'on'=>'search'),
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
			'manager_id' => 'Manager',
			'manager_name' => 'Manager Name',
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
		$criteria->compare('manager_id',$this->manager_id,true);
		$criteria->compare('manager_name',$this->manager_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
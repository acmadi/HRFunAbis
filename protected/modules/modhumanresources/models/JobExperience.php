<?php

/**
 * This is the model class for table "job_experience".
 *
 * The followings are the available columns in table 'job_experience':
 * @property integer $id
 * @property string $employee_id
 * @property string $period_start
 * @property string $period_finish
 * @property string $company
 * @property string $position
 * @property string $job_description
 */
class JobExperience extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JobExperience the static model class
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
		return 'hr_job_experience';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, period_start, period_finish, company, position, job_description', 'required'),
			array('employee_id, position', 'length', 'max'=>20),
			array('company', 'length', 'max'=>100),
			array('job_description', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, period_start, period_finish, company, position, job_description', 'safe', 'on'=>'search'),
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
			'period_start' => 'Mulai',
			'period_finish' => 'Selesai',
			'company' => 'Satuan Kerja',
			'position' => 'Posisi',
			'job_description' => 'Nama Proyek',
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
		$criteria->compare('period_start',$this->period_start,true);
		$criteria->compare('period_finish',$this->period_finish,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('job_description',$this->job_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}